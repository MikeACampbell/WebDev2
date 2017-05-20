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
	
	<table>
    <thead>
        <tr>
            <th>Teacher ID</th>
            <th>Teacher Name</th>
            <th>College ID</th>
			<th>Department ID</th>
        </tr>
    </thead>
       <?php 
	   
	   
		$stmt = $db->prepare('SELECT * FROM teacher');
		$stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr>';
	echo '<td>' . $row['id'] . '</td>' . '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['college_id'] . '</td>' . '<td>' . $row['department_id'] . '</td>';
	echo '</tr>';
}
  ?>
</table>
  </body>
</html>