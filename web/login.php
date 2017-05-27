<?php
 
   $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  
  try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  }
  catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
  }
 
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
 
      $stmt = prepare('SELECT id FROM userList WHERE username = '$myusername' and pword = '$mypassword'');
      $stmt->execute();
	  
	  $row = $stmt->fetch(PDO::FETCH_ASSOC)

	  $count = pg_num_rows($row);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         echo "hey";
      }else {
         echo "Your Login Name or Password is invalid";
      }
	  */
?>

<!doctype html>
<html>
  <head>
  <link rel="stylesheet" href="mystyle.css">
   <meta charset = "utf-8" />
    <title>Login</title>
  </head> 
  <body>
    <h2>Login</h2>
	<hr></hr>
	 <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
	

  </body>
</html>