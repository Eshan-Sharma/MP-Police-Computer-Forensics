<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="Sign.css">
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
          
        <br>
		
        <form method="post" action="" >
        	<h3>Log In</h3>
        	<div class="input-group" >
				<label align="center">Username:</label>
			<input type="text" name="username" placeholder="" >
			</div>
			<div class="input-group">
				<label>Password:</label>
				<input type="password" name="password" placeholder="" >
			</div>
			<button class="btn btn-primary btn-lg active" type="submit" name="login" formaction="Login_check.php" method ="post">Login</button>

        </form>
      </div> 
      
    </div>

  </body>
</html>