<?php 
$host = 'localhost';
$user ='root';
$pass ='';

$db=mysqli_connect($host,$user,$pass);
mysqli_select_db($db,'sample');
// echo "Success".'<br>';

$pro =$_POST["Ip"];
$query = "SELECT Time ,Source, Protocol FROM `wireshark_logs` WHERE Source='$pro' ";
$is_run = mysqli_query($db,$query);
// echo "time Src- ip".'<br>';
while($exec = mysqli_fetch_array($is_run))
{
	echo $exec['Time']." ___________".$exec['Source'].'__________'.$exec['Protocol'].'<br>';
}




 ?>