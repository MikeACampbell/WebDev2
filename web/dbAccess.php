<?php

    $dbUrl = getenv('DATABASE_URL');
  if (empty($dbUrl)) {
    $dbUrl = "postgres://postgres:admin@localhost:5432/";
  }
  $dbopts = parse_url($dbUrl);
  print "<p>$dbUrl</p>\n\n";
  /*$dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');
  //print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";
  try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  }
  catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
  }

  foreach ($db->query('SELECT now()') as $row)
  {
    print "<p>$row[0]</p>\n\n";
  }
 */
?>

<!doctype html>
<html>
  <head>
    <title>Database Access</title>
  </head> 
  <body>
    <h3>Database Access</h3>
	
       <?php 
	   ?>

  </body>
</html>