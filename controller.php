<?

ini_set('max_execution_time', 3600);
set_time_limit(0);


require_once "functions.php";
//LOG LEVEL
$DEFAULT = 'DEFAULT';
$ERROR = 'ERROR';
$LOG = 'LOG';
$ALL = 'ALL';

//Cron Datas
$cronVins = array(
    "manual_15_4h00127@@ce_74",
	"manual_15_8w00129@@ad_00",
    "manual_3_81a0127@@aa_00",
    "manual_3_81a0127@@aa_20",
    "manual_3_81a0127@@aa_40",
    "manual_3_81a0127@@aa_50",
    "manual_4_81a0127@@aa_60",
    "manual_3_81a0127@@aa_65",
    "manual_3_81a0127@@aa_78",
    "manual_3_81a0127@@aa_79",
    "manual_19_8w00129@@ac_00",
    "manual_31_4m00127@@ae_00",
    "manual_31_4m00127@@ae_20",
    "manual_31_4m00127@@ae_40",
    "manual_31_4m00127@@ae_50",
    "manual_31_4m00127@@ae_60",
    "manual_31_4m00127@@ae_65",
    "manual_14_8w00129@@ae_00",
    "manual_34_4s00129@@ad_00",
    "manual_0_8v20127@@ac_00",
    "manual_0_8v20127@@ac_20",
    "manual_11_4n00127@@aa_00",
    "manual_12_4n00127@@aa_11",
    "manual_11_4n00127@@aa_12",
    "manual_11_4n00127@@aa_13",
    "manual_11_4n00127@@aa_14",
    "manual_11_4n00127@@aa_15",
    "manual_11_4n00127@@aa_16",
    "manual_11_4n00127@@aa_17",
    "manual_11_4n00127@@aa_20",
    "manual_11_4n00127@@aa_35",
    "manual_11_4n00127@@aa_36",
    "manual_12_4n00127@@aa_37",
    "manual_11_4n00127@@aa_38",
    "manual_11_4n00127@@aa_39",
    "manual_11_4n00127@@aa_40",
    "manual_11_4n00127@@aa_50",
    "manual_11_4n00127@@aa_60",
    "manual_11_4n00127@@aa_65",
    "manual_11_4n00127@@aa_67",
    "manual_11_4n00127@@aa_68",
    "manual_11_4n00127@@aa_69",
    "manual_11_4n00127@@aa_71",
    "manual_11_4n00127@@aa_72",
    "manual_11_4n00127@@aa_75",
    "manual_11_4n00127@@aa_76",
    "manual_11_4n00127@@aa_77",
    "manual_11_4n00127@@aa_78",
    "manual_11_4n00127@@aa_79",
    "manual_12_4n00127@@aa_95",
    "manual_0_4g00127@@ad_00",
    "manual_1_4g00127@@ad_11",
    "manual_0_4g00127@@ad_12",
    "manual_0_4g00127@@ad_13",
    "manual_0_4g00127@@ad_14",
    "manual_0_4g00127@@ad_15",
    "manual_0_4g00127@@ad_16",
    "manual_0_4g00127@@ad_17",
    "manual_0_4g00127@@ad_20",
    "manual_0_4g00127@@ad_35",
    "manual_0_4g00127@@ad_36",
    "manual_0_4g00127@@ad_37",
    "manual_0_4g00127@@ad_38",
    "manual_0_4g00127@@ad_39",
    "manual_0_4g00127@@ad_40",
    "manual_0_4g00127@@ad_50",
    "manual_0_4g00127@@ad_60",
    "manual_0_4g00127@@ad_65",
    "manual_0_4g00127@@ad_67",
    "manual_1_4g00127@@ad_68",
    "manual_1_4g00127@@ad_69",
    "manual_1_4g00127@@ad_71",
    "manual_1_4g00127@@ad_72",
    "manual_1_4g00127@@ad_75",
    "manual_1_4g00127@@ad_76",
    "manual_1_4g00127@@ad_77",
    "manual_1_4g00127@@ad_78",
    "manual_1_4g00127@@ad_79",
    "manual_1_4g00127@@ad_95"
);

$cronMainUrl = "https://ipf213.dosco.de/iba3-app/manual/structure/";
$cronLogLevel = "LOG";
$cronSendMail = 1;

//Email
$subjectEmail = "Issued Urls";
$fromEmail = "log@komma-d.de";
$toEmail = "othmane@komma-d.de";
$ccEmail = "oliver@komma-d.de";
$headersEmail = "MIME-Version: 1.10.1" . "\r\n";
$headersEmail .= "Content-type:text/html; charset=UTF-8  \r\n";
$headersEmail .= 'From: '.$fromEmail . "\r\n";
$headersEmail .= 'Cc: '.$ccEmail . "\r\n";

//Test just one url by selecting all options 
if ($_POST['action'] == "manuell"){
    if(isset($_POST['sendMail'])){
        $sendMail = $_POST['sendMail'];
    }
    else {
        $sendMail = 0;        
    }
    testing(0, $_POST['vin'], $_POST['mainUrl'], $sendMail, $_POST['log_level']);    
}

//Automatically test all urls without sending email
if ($_POST['action'] == "testAll"){
    foreach($cronVins as $vin){
        testing(1, $vin, $cronMainUrl, 0, $cronLogLevel);
    }
}

//Automatically test all urls and only send an email if there are some issued urls
if ($_GET['action'] == "cron"){
    foreach($cronVins as $vin){
        testing(1, $vin, $cronMainUrl, $cronSendMail, $cronLogLevel);
    }
}



