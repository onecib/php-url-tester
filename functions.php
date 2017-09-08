<?
ini_set('display_errors', '1');
$arr=array();

// authenticate by sending a curl GET request to $loginUrl 
// and returns the cookies with JSESSIONID parameter
function login($loginUrl){

    $ch = curl_init($loginUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    return $cookies['JSESSIONID'];
}

// fetches all urls of a given $url with a $sessionId 
// the result of this one curl GET request should be an object
//***** if the object "$resultJson" has a "content" property in its 
//********************* structure then map it and put all values of the "src" key
//********************* in an global variable called $search and (re)initialize
//********************* the content of $issuedUrls which is an bidimensional array
//********************* containing the url as a first element and the HTTP status code
//********************* as second. then calls the first 400 urls asynchrounously and then 
//********************* do the same with the rest. (async calls become uneffecient after ~500 calls)
//***** otherwise just (re)initialize $issuedUrls
// and returns $issuedUrls
function getUrls($sessionId,$url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: JSESSIONID=".$sessionId));
    curl_setopt($ch, CURLOPT_HEADER, false);
    $result = curl_exec($ch);
    $resultJson = json_decode($result);
    if($resultJson->content){
    	$GLOBALS['search'] = searchSrcInObject($resultJson->content);    	
    	$issuedUrls = array(array(null,null));
		asyncCalls($GLOBALS['search'], 0,-400, $sessionId);
		asyncCalls($GLOBALS['search'], false, 401, $sessionId);
    }
    else{
	    $issuedUrls = array(array(null,null));
    }
    return $issuedUrls;
    
};

// asynchronous process for multi curl requests
// checks if $param is false or not
// $param is just to manipulate the slice in the getUrls function
function asyncCalls($arraySearch, $param, $limit, $SID){
    $mh = curl_multi_init();
    if($param == false){
        foreach(array_slice($arraySearch, $limit) as $key => $value){
            $ch[$key] = curl_init('https://ipf213.dosco.de/iba3-app'.$value);
            curl_setopt($ch[$key], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch[$key], CURLOPT_HTTPHEADER, array("Cookie: JSESSIONID=".$SID));
            curl_setopt($ch[$key], CURLOPT_HEADER, true);
            curl_multi_add_handle($mh,$ch[$key]);
        }
    }
    else{
        foreach(array_slice($arraySearch, $param, -$limit) as $key => $value){
            $ch[$key] = curl_init('https://ipf213.dosco.de/iba3-app'.$value);
            curl_setopt($ch[$key], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch[$key], CURLOPT_HTTPHEADER, array("Cookie: JSESSIONID=".$SID));
            curl_setopt($ch[$key], CURLOPT_HEADER, true);
            curl_multi_add_handle($mh,$ch[$key]);
        }
    }
    
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    $issuedUrls = array(array(null, null));
    foreach(array_keys($ch) as $key){
        //if curl request status is not 200 then we push the url and its status in $issuedUrls
        if(curl_getinfo($ch[$key], CURLINFO_HTTP_CODE) != 200){
            array_push($issuedUrls, array(curl_getinfo($ch[$key], CURLINFO_EFFECTIVE_URL),curl_getinfo($ch[$key], CURLINFO_HTTP_CODE)));
        }
        curl_multi_remove_handle($mh, $ch[$key]);
    }
    curl_multi_close($mh);
}

//checks the $logLevel parameter to set the level to log/email
//if $sendEmail is set to one then send an email otherwise dont.
function sendStatus($sendEmail ,$urls , $subjectEmail, $toEmail, $headersEmail, $logLevel){
    $to = $toEmail;
    $subject = $subjectEmail;
    $headers = $headersEmail;
    $message = '
    <html>
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <h2>This is a Report of the issued urls</h2>
            <h2>LOGLEVEL: "'.$logLevel.'"</h2>
            <br><br>';
    switch ($logLevel) {
        case 'ERROR':
            if(count($urls) == 1){return;}
            else { $message .= '
                        <table class="table">
                            <tr>
                                <th>Url</th>
                                <th>Status</th>
                            </tr>';
                foreach ($urls as $url) {
                    $message .= '<tr>';
                    $message .= '   <td>'.$url[0].'</td>';
                    $message .= '   <td>'.$url[1].'</td>';
                    $message .= '</tr>';
                }
                $message .= "
                        </table>
                ";
                $message .= '
                    </body>
                </html>
                ';
            }
            break;
        case 'LOG':
            if(count($urls) == 1){
                    $message .= "
                        <p>There is no issues with the ".count($GLOBALS['arr'])." tested urls</p>
                    "; 
                    $message .= '
                        </body>
                    </html>
                    ';
   
            }
            else { $message .= '
                        <table class="table">
                            <tr>
                                <th>Url</th>
                                <th>Status</th>
                            </tr>';
                foreach ($urls as $url) {
                    $message .= '<tr>';
                    $message .= '   <td>'.$url[0].'</td>';
                    $message .= '   <td>'.$url[1].'</td>';
                    $message .= '</tr>';
                }
                $message .= "
                        </table>
                ";               
                $message .= '
                    </body>
                </html>
                ';
            }
            break;
        case 'ALL':
            if(count($GLOBALS['search'])>0){
                $message .= '
                            <h2>List of all urls:</h2>
                            <table class="table">
                                <tr>
                                    <th>Url</th>
                                </tr>';
                    foreach ($GLOBALS['search'] as $key=>$value) {
                        $message .= '<tr>';
                        $message .= '   <td>'.'https://ipf213.dosco.de/iba3-app'.$value.'</td>';
                        $message .= '</tr>';
                    }
                    $message .= "
                            </table>
                    ";
                    $message .= '
                        </body>
                    </html>
                    ';
                }
                else {
                    $message .= '
                            <br><br>
                            <p>No urls found</p>
                        </body>
                    </html>
                    ';
                }
            break;
        default:
    }
     echo $message;
     if($sendEmail == 1){
        mail($to,$subject,$message,$headers);
     }
}

// set the $loginUrl with a given $vin
// call the login function and put its return into $sessionId
// call the getUrls function and put its return into $urls
// call the sendStatus function and put its return into $mail
// unset the global variables to empty Memory
function testing($isCron, $vin, $mainUrl, $isMail, $logLevel){
    $loginUrl = "https://ipf213.dosco.de/iba3-app/user/profile/_login?vin=".$vin."&device=car&imageFormat=default";    
    $sessionId = login($loginUrl);  
    $urls = getUrls($sessionId,$mainUrl);
	$mail = sendStatus($isMail, $urls, $GLOBALS['subjectEmail'].' vin = '.$vin, $GLOBALS['toEmail'], $GLOBALS['headersEmail'], $logLevel);
	$GLOBALS['arr'] = array();
	unset($sessionId);
    unset($urls);
}

// Recursively search in $obj if there is any "src" property and if it is 
// existant then push it in a global array called $arr and 
// then return $array after recursion has been finished
function searchSrcInObject($obj) { 
    foreach ($obj as $i){
        if (isset($i->src)) {
            array_push($GLOBALS['arr'], $i->src);
            
            if (isset($i->content)) {
                searchSrcInObject($i->content);
            }
        } else if (isset($i->content)) {
            searchSrcInObject($i->content);
        }
    }
    return $GLOBALS['arr'];
}