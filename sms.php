<html>
<body>

<?php
$username = "dpativinod@gmail.com";
$password = "VINOD@sms2";

echo $number = $_POST['numbertext'].$_POST['number'];
echo $from =$_POST['from'];
echo $message =$_POST['message'];

$vars ="uname=".$username."&pword=".$password."&message=".$message."&from=".$from."&selectdnums=".$number."&info=1&test=0";



echo "hai";
        $curl = curl_init('http://www.txtlocal.com/sendsmspost.php');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        //die("SMS has been sent.");





?>
<form action="sms.php" method="POST">
                Number:<br />
                <input type="text" size="2" name="numbertext" /> - <input type="text" name="number" />

                <br /><br />

                Sender:<br />
                <input type="text" name="from" />

                <br /><br />

                Message:<br />
                <textarea name="message"></textarea>

               <button type="submit"  name="submit" >send</button>

</form>
</body></html>