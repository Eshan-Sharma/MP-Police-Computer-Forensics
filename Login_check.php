<?php
  session_start();
   $host = 'localhost';
  $user ='root';
  $pass ='';

  $db=mysqli_connect($host,$user,$pass);
  mysqli_select_db($db,'admin');
  if(isset($_POST['username']))
  {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT  * FROM  `users` WHERE `UserName`= '".$user_name."' AND `Password` = '".$password."'  ";
    // echo $user_name."<br>";
    // echo $password;
    $ans = mysqli_query($db,$sql);
    // while($exec = mysqli_fetch_array($ans))
    // {
    //   echo $exec['Id']." ___________".$exec['UserName'].'__________'.$exec['Password'].'<br>';
    // }
  
    $count = mysqli_num_rows($ans);
    // echo $count;
    $flag=0;
    if($count==1)
    {
      // $_SESSION['username'] = $user_name;
      // echo "Done";
      $flag=1;
    }
    
    // if (isset($_SESSION['username'])){
    //   $username = $_SESSION['username'];
    //     echo "Hai " . $username . "";
  
    // }

    if($flag==1)
    {
      header('location:Start.html');
    }
    else
    {
        echo "<script type='text/javascript'>alert('Incorrect Username or Password');</script>";
         echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='Sign.php';
        </SCRIPT>");
    }
  }
  

  
?> 