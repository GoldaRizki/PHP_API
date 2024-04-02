<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses API</title>
</head>
<body>
    
<?php

$semua = file_get_contents('http://localhost/RestAPI/server/index.php/manusia');


$print_semua = json_decode($semua);


foreach ($print_semua as $inner) {
    foreach ($inner as $key => $value) {
        echo $key . '---' . $value . '<br>'; 
    }
    echo '-------------------' . '<br>';
}
?>

</body>
</html>