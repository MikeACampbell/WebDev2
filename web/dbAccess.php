<?php

    $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);
  //print "<p>$dbUrl</p>\n\n";
  $dbHost = $dbopts["host"];
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
 
?>

<!doctype html>
<html>
  <head>
    <title>Database Access</title>
  </head> 
  <body>
    <h3>Database Accesser</h3>
	
       <?php 
	   
	   
        $stmt = $db->prepare('SELECT * FROM teacher');
		$stmt->execute();
		echo '<table>'
		echo '<tr>'
		echo '<th>Teacher ID<th>'
		echo '<th>Teacher Name<th>'
		echo '<th>School ID<th>'
		echo '<th>Department ID<th>'
		echo '</tr>'
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	
	echo '<tr>';
	echo '<td>' . $row['id'] . '</td>' . '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['college_id'] . '</td>' . '<td>' . $row['department_id'] . '</td>';
	echo '</tr>';
}

echo '</table>'
	   
	   ?>

  </body>
</html>