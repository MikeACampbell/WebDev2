<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
    $dbUrl = getenv('DATABASE_URL');
  if (empty($dbUrl)) {
    $dbUrl = "postgres://mikecampbella@gmail.com:victus_6373@localhost:5432/Scriptures";
  }
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
/*
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
    
      if(isset($_GET['id']))
      {
        $stmt = $db->prepare('SELECT * FROM teacher WHERE ID=:id');
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $scrip)
        {
          print '"' . $scrip['name'] . '"';
        }
      }
      else{
        $stmt = $db->prepare('SELECT * FROM teacher');
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $scrip)
        {
          echo '<b>' . $scrip['name'] . ' ' . $scrip['college_id'] . ' ' . $scrip['department_id'] '</b>';
        }
      }
    
    ?>

  </body>
</html>