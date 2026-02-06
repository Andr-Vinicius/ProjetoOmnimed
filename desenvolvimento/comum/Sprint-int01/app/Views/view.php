<?php 
$db = \Config\Database::connect();

$query = $db->query('SELECT * FROM teste');


foreach ($query->getResult() as $row) {
    echo $row->descricao;
    echo "<br>";
    echo $row->numero;
    
    echo "<br>";
    
}
// $a = mysqli_fetch_array(mysqli_result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>OLA AAAAAAAAAAAAAAAAAAA</h1>
</body>
</html>