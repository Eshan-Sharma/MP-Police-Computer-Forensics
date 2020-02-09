<?php 
$host = 'localhost';
$user ='root';
$pass ='';
session_start();
$db=mysqli_connect($host,$user,$pass);
$database = $_POST["Project"];
$query = "CREATE DATABASE `".$database."`";
mysqli_query($db,$query);
// echo $database;			
mysqli_select_db($db,$database);
// echo "Success".'<br>';
// print_r($_FILES["csv_info"]["tmp_name"]);

// $query = "SELECT * FROM `hello`"; 			Connection established :)
// $ans = mysqli_query($db,$query);
//     while($exec = mysqli_fetch_array($ans))
//     {
//       echo $exec['name'].'<br>';
//     }

$query = "CREATE TABLE wireshark_logs (
Id INT(100) NOT NULL, 
Time VARCHAR(30)  NOT NULL ,
Source VARCHAR(30) NOT NULL,
Destination VARCHAR(50) NOT NULL,
Protocol VARCHAR(10) NOT NULL,
Length INT(10) ,
Info VARCHAR(1000) ) ";
// $query = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP
// )";
mysqli_query($db,$query);


$query = "CREATE TABLE firewall_logs (
Date varchar(100) NOT NULL , 
Time VARCHAR(30)  NOT NULL ,
Action VARCHAR(30) NOT NULL,
Protocol VARCHAR(10) NOT NULL,
Source VARCHAR(50) NOT NULL,
Destination VARCHAR(50) NOT NULL,
SourcePort int(10) NOT NULL ,
DestinationPort int(10) NOT NULL ,
Size int(10) NOT NULL ,
tcpflags varchar(10) NOT NULL ,
tcpsyn varchar(10) NOT NULL ,
tcpack varchar(10) NOT NULL ,
tcpwin varchar(10) NOT NULL ,
icmptype varchar(10) NOT NULL ,
icmpcode varchar(10) NOT NULL ,
info varchar(10) NOT NULL ,
path varchar(10) NOT NULL ) ";

mysqli_query($db,$query);



$query = "CREATE TABLE access_logs (
Source varchar(100) NOT NULL , 
Ident VARCHAR(30)  NOT NULL ,
Userid VARCHAR(30) NOT NULL,
Time VARCHAR(100) NOT NULL,
Zone VARCHAR(50) NOT NULL,
Method varchar(100) NOT NULL ,
Request varchar(1000) NOT NULL ,
Protocol varchar(100) NOT NULL ,
StatusCode int(10) NOT NULL ,
Size int(100) NOT NULL  ) ";

mysqli_query($db,$query);
$flag=0;
$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/octet-stream');
if(in_array($_FILES['csv_info']['type'],$mimes))
{
	$file=$_FILES["csv_info"]["tmp_name"];
	// echo $_FILES['csv_info']['type'];
	$handle =fopen($file,"r");
	fgetcsv($handle,1000,",");
	while(($cont=fgetcsv($handle,1000,","))!=false)
	{
	$query="INSERT INTO `firewall_logs` VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]','$cont[8]','$cont[9]','$cont[10]','$cont[11]','$cont[12]','$cont[13]','$cont[14]','$cont[15]','$cont[16]')";

	mysqli_query($db,$query);
	// echo $query."<br>";
	}
}
else
{
	$flag+=1;
}
if(in_array($_FILES['wire']['type'],$mimes))
{
	$file=$_FILES["wire"]["tmp_name"];
	// print_r($_FILES["wire"]["tmp_name"]) ;
	$handle =fopen($file,"r");

	fgetcsv($handle,1000,",");
	while(($cont=fgetcsv($handle,1000,","))!=false)
	{
		// echo $cont[0]." ".$cont[1]." ".$cont[2]." ".$cont[3]." ".$cont[4]." ".$cont[5]." ".$cont[6]."<br>";
		$query = "INSERT INTO `wireshark_logs` VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]')";
		mysqli_query($db,$query);
	}
}
else
{
	$flag+=1;
}
// echo $_FILES['access']['type'];
if(in_array($_FILES['access']['type'],$mimes))
{
	// echo "Yes";
	$file=$_FILES["access"]["tmp_name"];
	// print_r($_FILES["wire"]["tmp_name"]) ;
	$handle =fopen($file,"r");

	fgetcsv($handle,1000,",");
	while(($cont=fgetcsv($handle,1000,","))!=false)
	{
		// echo $cont[0]." ".$cont[1]." ".$cont[2]." ".$cont[3]." ".$cont[4]." ".$cont[5]." ".$cont[6]."<br>";
		$query = "INSERT INTO `access_logs` VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]','$cont[8]','$cont[9]')";
		mysqli_query($db,$query);
		// echo $query."<br>";
	}
}
else
{
	$flag+=1;
}

if($flag!=0)
{

	$query = "DROP DATABASE `".$database."` ";
	mysqli_query($db,$query);

 	echo "<script type='text/javascript'>alert('Please upload files in correct  format');</script>";

	 echo ("<SCRIPT LANGUAGE='JavaScript'>
	  window.location.href='Start.html';
	 </SCRIPT>");
}
else
{
	$_SESSION['database'] = $database;
	echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.location.href='Analyze.php';
 </SCRIPT>");
}
// $query = "SELECT `Source`,COUNT(*) as `count` FROM `wireshark_logs` GROUP BY `Source` ORDER BY `count` DESC";

// $is_run = mysqli_query($db,$query);
// // echo "time Src- ip".'<br>';
// while($exec = mysqli_fetch_array($is_run))
// {
// 	echo $exec['Source']."----------".$exec['count'].'<br>';
// }

// header('location:Analyze.php');﻿

// $query = "SELECT Time ,Source, Protocol FROM `wireshark_logs` WHERE Source='$pro' ";
// $is_run = mysqli_query($db,$query);
// // echo "time Src- ip".'<br>';
// while($exec = mysqli_fetch_array($is_run))
// {
// 	echo $exec['Time']." ___________".$exec['Source'].'__________'.$exec['Protocol'].'<br>';
// }
 ?>