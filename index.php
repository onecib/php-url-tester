<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <h1>URL Test Reporter</h1>

        <form action="controller.php" method="post">
            <input type="hidden" name="action" value="manuell">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="sendMail" value="1"> Send Email
                </label>
            </div>
            <div class="form-group">
                <label for="vin">VIN</label>
                <select class="form-control form-control-sm" id="vin" name="vin">
                    <optgroup>
                        <option value="manual_15_4h00127@@ce_74">manual_15_4h00127@@ce_74</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_15_8w00129@@ad_00">manual_15_8w00129@@ad_00</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_3_81a0127@@aa_00">manual_3_81a0127@@aa_00</option>
                        <option value="manual_3_81a0127@@aa_20">manual_3_81a0127@@aa_20</option>
                        <option value="manual_3_81a0127@@aa_40">manual_3_81a0127@@aa_40</option>
                        <option value="manual_3_81a0127@@aa_50">manual_3_81a0127@@aa_50</option>
                        <option value="manual_4_81a0127@@aa_60">manual_4_81a0127@@aa_60</option>
                        <option value="manual_3_81a0127@@aa_65">manual_3_81a0127@@aa_65</option>
                        <option value="manual_3_81a0127@@aa_78">manual_3_81a0127@@aa_78</option>
                        <option value="manual_3_81a0127@@aa_79">manual_3_81a0127@@aa_79</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_19_8w00129@@ac_00">-manual_19_8w00129@@ac_00</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_31_4m00127@@ae_00">manual_31_4m00127@@ae_00</option>
                        <option value="manual_31_4m00127@@ae_20">manual_31_4m00127@@ae_20</option>
                        <option value="manual_31_4m00127@@ae_40">manual_31_4m00127@@ae_40</option>
                        <option value="manual_31_4m00127@@ae_50">manual_31_4m00127@@ae_50</option>
                        <option value="manual_31_4m00127@@ae_60">manual_31_4m00127@@ae_60</option>
                        <option value="manual_31_4m00127@@ae_65">manual_31_4m00127@@ae_65</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_14_8w00129@@ae_00">manual_14_8w00129@@ae_00</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_34_4s00129@@ad_00">manual_34_4s00129@@ad_00</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_0_8v20127@@ac_00">manual_0_8v20127@@ac_00</option>
                        <option value="manual_0_8v20127@@ac_20">manual_0_8v20127@@ac_20</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_11_4n00127@@aa_00">manual_11_4n00127@@aa_00</option>
                        <option value="manual_12_4n00127@@aa_11">manual_12_4n00127@@aa_11</option>
                        <option value="manual_11_4n00127@@aa_12">manual_11_4n00127@@aa_12</option>
                        <option value="manual_11_4n00127@@aa_13">manual_11_4n00127@@aa_13</option>
                        <option value="manual_11_4n00127@@aa_14">manual_11_4n00127@@aa_14</option>
                        <option value="manual_11_4n00127@@aa_15">manual_11_4n00127@@aa_15</option>
                        <option value="manual_11_4n00127@@aa_16">manual_11_4n00127@@aa_16</option>
                        <option value="manual_11_4n00127@@aa_17">manual_11_4n00127@@aa_17</option>
                        <option value="manual_11_4n00127@@aa_20">manual_11_4n00127@@aa_20</option>
                        <option value="manual_11_4n00127@@aa_35">manual_11_4n00127@@aa_35</option>
                        <option value="manual_11_4n00127@@aa_36">manual_11_4n00127@@aa_36</option>
                        <option value="manual_12_4n00127@@aa_37">manual_12_4n00127@@aa_37</option>
                        <option value="manual_11_4n00127@@aa_38">manual_11_4n00127@@aa_38</option>
                        <option value="manual_11_4n00127@@aa_39">manual_11_4n00127@@aa_39</option>
                        <option value="manual_11_4n00127@@aa_40">manual_11_4n00127@@aa_40</option>
                        <option value="manual_11_4n00127@@aa_50">manual_11_4n00127@@aa_50</option>
                        <option value="manual_11_4n00127@@aa_60">manual_11_4n00127@@aa_60</option>
                        <option value="manual_11_4n00127@@aa_65">manual_11_4n00127@@aa_65</option>
                        <option value="manual_11_4n00127@@aa_67">manual_11_4n00127@@aa_67</option>
                        <option value="manual_11_4n00127@@aa_68">manual_11_4n00127@@aa_68</option>
                        <option value="manual_11_4n00127@@aa_69">manual_11_4n00127@@aa_69</option>
                        <option value="manual_11_4n00127@@aa_71">manual_11_4n00127@@aa_71</option>
                        <option value="manual_11_4n00127@@aa_72">manual_11_4n00127@@aa_72</option>
                        <option value="manual_11_4n00127@@aa_75">manual_11_4n00127@@aa_75</option>
                        <option value="manual_11_4n00127@@aa_76">manual_11_4n00127@@aa_76</option>
                        <option value="manual_11_4n00127@@aa_77">manual_11_4n00127@@aa_77</option>
                        <option value="manual_11_4n00127@@aa_78">manual_11_4n00127@@aa_78</option>
                        <option value="manual_11_4n00127@@aa_79">manual_11_4n00127@@aa_79</option>
                        <option value="manual_12_4n00127@@aa_95">manual_12_4n00127@@aa_95</option>
                    </optgroup>

                    <optgroup label="____________________________________">
                        <option value="manual_0_4g00127@@ad_00">manual_0_4g00127@@ad_00</option>
                        <option value="manual_1_4g00127@@ad_11">manual_1_4g00127@@ad_11</option>
                        <option value="manual_0_4g00127@@ad_12">manual_0_4g00127@@ad_12</option>
                        <option value="manual_0_4g00127@@ad_13">manual_0_4g00127@@ad_13</option>
                        <option value="manual_0_4g00127@@ad_14">manual_0_4g00127@@ad_14</option>
                        <option value="manual_0_4g00127@@ad_15">manual_0_4g00127@@ad_15</option>
                        <option value="manual_0_4g00127@@ad_16">manual_0_4g00127@@ad_16</option>
                        <option value="manual_0_4g00127@@ad_17">manual_0_4g00127@@ad_17</option>
                        <option value="manual_0_4g00127@@ad_20">manual_0_4g00127@@ad_20</option>
                        <option value="manual_0_4g00127@@ad_35">manual_0_4g00127@@ad_35</option>
                        <option value="manual_0_4g00127@@ad_36">manual_0_4g00127@@ad_36</option>
                        <option value="manual_0_4g00127@@ad_37">manual_0_4g00127@@ad_37</option>
                        <option value="manual_0_4g00127@@ad_38">manual_0_4g00127@@ad_38</option>
                        <option value="manual_0_4g00127@@ad_39">manual_0_4g00127@@ad_39</option>
                        <option value="manual_0_4g00127@@ad_40">manual_0_4g00127@@ad_40</option>
                        <option value="manual_0_4g00127@@ad_50">manual_0_4g00127@@ad_50</option>
                        <option value="manual_0_4g00127@@ad_60">manual_0_4g00127@@ad_60</option>
                        <option value="manual_0_4g00127@@ad_65">manual_0_4g00127@@ad_65</option>
                        <option value="manual_0_4g00127@@ad_67">manual_0_4g00127@@ad_67</option>
                        <option value="manual_1_4g00127@@ad_68">manual_1_4g00127@@ad_68</option>
                        <option value="manual_1_4g00127@@ad_69">manual_1_4g00127@@ad_69</option>
                        <option value="manual_1_4g00127@@ad_71">manual_1_4g00127@@ad_71</option>
                        <option value="manual_1_4g00127@@ad_72">manual_1_4g00127@@ad_72</option>
                        <option value="manual_1_4g00127@@ad_75">manual_1_4g00127@@ad_75</option>
                        <option value="manual_1_4g00127@@ad_76">manual_1_4g00127@@ad_76</option>
                        <option value="manual_1_4g00127@@ad_77">manual_1_4g00127@@ad_77</option>
                        <option value="manual_1_4g00127@@ad_78">manual_1_4g00127@@ad_78</option>
                        <option value="manual_1_4g00127@@ad_79">manual_1_4g00127@@ad_79</option>
                        <option value="manual_1_4g00127@@ad_95">manual_1_4g00127@@ad_95</option>
                    </optgroup>

                </select>
            </div>
            <div class="form-group">
                <label for="mainUrl">Main Url</label>
                <input type="text" class="form-control" id="mainUrl" name="mainUrl" value="https://ipf213.dosco.de/iba3-app/manual/structure/">
            </div>
            <label for="logLevel">Log Level(*)</label>
            <select class="form-control form-control-sm" id="logLevel" name="log_level">
                <option value="LOG">LOG</option>
                <option value="ERROR">ERROR</option>
                <option value="ALL">ALL</option>
            </select>
            <br>
            <br>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Start" />
        </form>
        <br>
        <br>
        <form action="controller.php" method="post">
            <input type="hidden" name="action" value="testAll">
            <input type="submit" class="btn btn-danger btn-lg btn-block" name="submit" value="Start All" />
        </form>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <small class="text-secondary">
        (*) : Log Levels are listed under the following order:
        <br>---------/ ERROR: make a report and notify only the issued urls.
        <br>---------/ LOG: make a report and notify only the issued urls if there are issued urls, otherwise notify the number of tested urls
        <br>---------/ ALL: make a report and notify all the tested urls.
      </small>
        <br>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>