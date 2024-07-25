<?php
include_once('connection.php');

$output = array('error' => false);

$database = new connection();
$db = $database->open();

try{
    $id = $_POST['id'];
    $stmt = $db->prepare("SELECT * FROM tb_deposit WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $output['data'] = $stmt->fetch();
}
catch(PDOException $e){
    $output['error'] = true;
    $output['message'] = $e->getMessage();
}

//close connection
$database->close();

echo json_encode($output);
?>

