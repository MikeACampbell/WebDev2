<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $stmt = prepare('SELECT id FROM userList WHERE username = '$myusername' and pword = '$mypassword'');
      $result = $stmt->execute();
	  
	  $row = pg_fetch_array($result, 0, PGSQL_NUM);
	  $count = pg_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         echo "hey";
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
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