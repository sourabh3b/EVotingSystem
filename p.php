<?php 
$j=0;
$s1 = "AMITABH BACHCHAN";
$s2 = "RAJNIKANTH";
$n1 = strlen($s1);
$n2 = strlen($s2);

for($i=0;$i<$n1;$i++){
  $flag = 0;
  for($j=0;$j<$n2;$j++){
    if(substr($s1,$i,1) == substr($s2,$j,1)){
    $flag = $flag+1;
    }
  }
   if($flag>0){
		
    	$arr[$j] = substr($s1,$i,1);
		echo $j;
		$j++;
		
	}
}
var_dump($arr);
/*

//echo count($arr);
for($i=0;$i<$n1;$i++){
$check =0;
$j = $i; 
while($j>=0){
if($arr[$i] == $arr[$j]){
$check = $check+1;
}
$j=$j-1;
}
if($check == 0){
echo $arr[$i];
}
}*/
?>