<?php 
$host = 'localhost';
$user ='root';
$pass ='';

$db=mysqli_connect($host,$user,$pass);
mysqli_select_db($db,'sample');
// echo "Success".'<br>';

$pro =$_POST["Ip"];
$query = "SELECT time,`src-ip`,`dst-ip`,protocol FROM `firewall_logs` WHERE `src-ip`='$pro' ";
$is_run = mysqli_query($db,$query);
// echo $pro.'<br>';
while($exec = mysqli_fetch_array($is_run))
{
	echo $exec['time']." ___________".$exec['src-ip'].'__________'.$exec['dst-ip'].'__________'.$exec['protocol'].'<br>';
}
// " ___________".$exec['src-ip'].'__________'.$exec['dst-ip'].'__________'.$exec['protocol'].



 ?>