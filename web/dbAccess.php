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
  <link rel="stylesheet" href="mystyle.css">
   <meta charset = "utf-8" />
    <title>Database Access</title>
  </head> 
  <body>
    <h2>Database Access</h2>
	<hr></hr>
	
	<h3>Teacher</h3>
	
	<table class="table">
    <thead>
        <tr>
            <th class="table">Teacher ID</th>
            <th class="table">Teacher Name</th>
            <th class="table">College ID</th>
			<th class="table">Department ID</th>
        </tr>
    </thead>
	
       <?php 
	   
		$stmt = $db->prepare('SELECT * FROM teacher');
		$stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr>';
	echo '<td class="tableNum">' . $row['id'] . '</td>' . '<td class="table">' . $row['name'] . '</td>';
	echo '<td class="tableNum">' . $row['college_id'] . '</td>' . '<td class="tableNum">' . $row['department_id'] . '</td>';
	echo '</tr>';
}
  ?>
</table>

<hr></hr>

<h3>College</h3>
	<table class="table">
    <thead>
        <tr>
            <th class="table">College ID</th>
            <th class="table">College Name</th>
            <th class="table">College Address</th>
			<th class="table">College State</th>
			<th class="table">College Zipcode</th>
        </tr>
    </thead>
	
       <?php 
	   
		$stmt = $db->prepare('SELECT * FROM college');
		$stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr>';
	echo '<td class="tableNum">' . $row['id'] . '</td>' . '<td class="table">' . $row['name'] . '</td>';
	echo '<td class="tableNum">' . $row['address_street'] . '</td>' . '<td class="tableNum">' . $row['address_state'] . '</td>' . '<td class="tableNum">' . $row['address_zipcode'] . '</td>';
	echo '</tr>';
}
  ?>
</table>

<hr></hr>
<h3>Department</h3>
	<table class="table">
    <thead>
        <tr>
            <th class="table">Department ID</th>
            <th class="table">Department Name</th>
        </tr>
    </thead>
	
       <?php 
	   
		$stmt = $db->prepare('SELECT * FROM department');
		$stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr>';
	echo '<td class="tableNum">' . $row['id'] . '</td>' . '<td class="table">' . $row['name'] . '</td>';
	echo '</tr>';
}
  ?>
</table>
  </body>
</html>