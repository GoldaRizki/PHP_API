<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_rest_api";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


header('Content-type: application/json');



$endpoint = $_SERVER['PATH_INFO'];

if($endpoint == '/manusia'){
    $sql = "SELECT * from Manusia";
    $result = $conn->query($sql);
    $manusia = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $manusia[] = $row;
    }
    echo json_encode($manusia);

}elseif(preg_match('/^\/manusia\/(\d+)$/', $endpoint, $matches)){
  $id_manusia = $matches[1];
  $sql = "SELECT * from Manusia WHERE Id = $id_manusia";
  $result = $conn->query($sql);

  $manusia = [];
  if($result->num_rows > 0){
  while ($row = $result->fetch_assoc()) {
      $manusia[] = $row;
  }
  echo json_encode($manusia);
  }else{
    echo json_encode('Error: 404');
  }
}

$conn->close();


?>