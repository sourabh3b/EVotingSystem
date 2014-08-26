 <?php
$ch = curl_init();
$user="sourabh.bhagat@yahoo.in:iitp@123";
$receipientno="919472458959";
$senderID="TEST SMS";
$msgtxt="OTP for IITP Gymkhana Elections ::$nextpass::";
curl_setopt($ch,CURLOPT_URL, 
"http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
"user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch);

//header("Location: coder.php");
?>