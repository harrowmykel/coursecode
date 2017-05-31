<?php
define('usr', 'harrowmykel');
define('pss', 'harrowmykel');

echo substr("ede", 1, 2);

echo substr("http://", 0, 4);
echo urlencode("http://adpay.tk/")."<br>";
include 'beginn.php';
$Rrrgvg=new apiQuery();
    // $name = trim(stripslashes($_GET['name'])); 
    // $email = trim(stripslashes($_GET['email'])); 
    // $subject = trim(stripslashes($_GET['title'])); 
    // $message = trim(stripslashes($_GET['topic']));

    $apiquery=new apiQuery();
    // $apiquery->contact_not_Logged($name, $email, $subject, $message);
    // $rt=$apiquery->create(usr, pss, "dkmdkmm");
    $rt=$apiquery->fetchprof(usr, pss);
// var_dump($rt);
$body=$rt->body;
echo count($body);

if (isset($body[0]->username)){
        $status = array(
            'type'=>'success',
            'message'=>'Message sent'
        );
    }else {
        $status = array(
            'type'=>'error',
            'message'=>'Message not sent'
        );
    }
print_r(json_encode($status));
print_r(json_encode($body[0]->id));
 // var_dump($body->{'error'});
$rtt=json_encode($body);
print_r($rtt);

$d=127;
    for ($i=33; $i<$d; $i++){
        echo $i." ".chr($i)."<br>";
    }

$adGen=new adGEn();
echo $adGen->genBannerAd();

        $adGen=new adGen2();
        // $ad_type=$adGen->BannerAd();
        $ad_type=$adGen->GridAd();
        echo "<br>".$ad_type."<br>";
        $img_link =$adGen->genImglink($ad_type);
        $url_link=$adGen->genAdLink($ad_type);
        $ad_desc=$adGen->genAdDesc($ad_type); 


// save_to_db($_GET['johnp'], "hggfg");
echo getUser();
// session_register('rtk');


        {
            $user="fjjk";
            $pass="dmkdmkkklklmf";  
            $name="ndmddmkdknnn";
            $dob="3-4-4";
            $email="kj@kdlkfkm.k";
            $country="kjk";

            if (isset($_POST['rmb'])){
                echo "nnggn";
            }

             echo "<br>";
            // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>hbjknhju";
            $ert=new apiQuery();
            $result=$ert->frgtpass($user);
            $body=$result->body;
            var_dump($body);

            if (isset($body[0]->success)){
                echo "dmkmfkfmkfn";
            }
                elseif (isset($body[0]->error)){
                    echo "error";
                    echo $body[0]->error_more;
                }
            var_dump($body[0]);
             echo "<br>";
            // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


            echo "fkmfkmk ".strpos("harro@wmdd", "@");

            if (strpos("harrow@mdd", "@")>0){
                echo "bitch";
            }else{
                echo "dog";
            }

            $result=$ert->createprof($user, $pass, $name, $dob, $email, $country);
            $body=$result->body;
             echo "<br>";
            // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            var_dump($body);

            if (isset($body[0]->username)){
                save_to_db($body[0]->username, $pass);
                // header("Location: dashboard.php");
            } else{
                $errorType=$body[0]->error;
                echo $errorType;
                $error="Invalid Username or Password";
            }
        }


        {
             echo "<br>";
            // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            echo deserialise($_GET['johnp']);

    function deserialise($dob){
        $dobo=explode("-", "$dob");
        echo $dob."-";
        if (count($dobo)==3){
            for ($ri=0; $ri<3; $ri++){
                //check numericity
                if(!is_numeric($dobo[$ri])){
                    return 0;
                } 
            }
            $day=$dobo[0];
            $month=$dobo[1];
            $year=$dobo[2];

            $dob=$day;
            $mob=$month;
            $yob=$year;

            $job = checkdate($mob,$dob,$yob) ? 'trueo' :'falseo'; // checks if date is corrr
            // $job="trueo";
            if ($job == 'trueo'){
                $importantDate = mktime(9,40,0,$month,$day,$year);
                return $importantDate;
            } 
        }
         return 0;
        // print_r($dobo);
    }
        }

?>