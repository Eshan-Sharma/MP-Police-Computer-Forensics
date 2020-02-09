<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Attack Pattern</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body style="background-color:#3D997;">

    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <h1 style="color:white; ">ATTACK PATTERN DISCOVERY IN NETWORK LOGS</h1>
        </div>


      </div>
    </nav>
    <br><br>

    <div class="container">
      
      <div class="jumbotron" >
        
        <div  style="margin-top:2em;margin-bottom:33em;">
          <table border="1" class="table table-striped" style="margin-top: 2em;">
            <thead>
              <h2>Wireshark Analysis</h2>
              <tr>
                <th>Source</th>
                <th>Packet Count</th>
                
              </tr>
            </thead>
            <tbody>
        <?php
          session_start();
        $host = 'localhost';
        $user ='root';
        $pass ='';
        $db=mysqli_connect($host,$user,$pass);
        $database = $_SESSION['database'];
        mysqli_select_db($db,$database);

        $query = "SELECT `Source`,COUNT(*) as `count` FROM `wireshark_logs` GROUP BY `Source` ORDER BY `count` DESC";
        
        $is_run = mysqli_query($db,$query);
        // echo "time Src- ip".'<br>';
        // echo "Ip Address        Count".'<br>';
        while($exec = mysqli_fetch_array($is_run))
        {
           
            echo "<tr>";
              echo "<td><label> ".$exec['Source']." </label></td>";
              echo "<td><label> ".$exec['count']." </label></td>";
            
            echo "</tr>";
           
            // <!-- echo $exec['Source']." ".$exec['count'].'<br>';  -->
        }
         ?>
       </tbody>
     </table>
     <table border="1" class="table table-striped" style="margin-top: 2em;">
            <thead>
              <h2>Firewall Analysis</h2>
              <tr>
                <th>Source</th>
                <th>Packet Count</th>
                
              </tr>
            </thead>
            <tbody>
        <?php
          // session_start();
        $host = 'localhost';
        $user ='root';
        $pass ='';
        $db=mysqli_connect($host,$user,$pass);
        $database = $_SESSION['database'];
        mysqli_select_db($db,$database);

        $query = "SELECT `Source`,COUNT(*) as `count` FROM `Firewall_logs` GROUP BY `Source` ORDER BY `count` DESC";
        
        $is_run = mysqli_query($db,$query);
        // echo "time Src- ip".'<br>';
        // echo "Ip Address        Count".'<br>';
        while($exec = mysqli_fetch_array($is_run))
        {
           
            echo "<tr>";
              echo "<td><label> ".$exec['Source']." </label></td>";
              echo "<td><label> ".$exec['count']." </label></td>";
            
            echo "</tr>";
           
            // <!-- echo $exec['Source']." ".$exec['count'].'<br>';  -->
        }
         ?>
       </tbody>
     </table>
      </div>  
      
    </div>
  </div>
  </body>
</html>
