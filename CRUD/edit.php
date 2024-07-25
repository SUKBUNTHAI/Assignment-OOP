<?php
include_once('connection.php');

$output = array('error' => false);

$database = new connection();
$db = $database->open();
try{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $amount = $_POST['amount'];

    $sql = "UPDATE tb_deposit SET firstname = '$firstname', lastname = '$lastname', amount = '$amount' WHERE id = '$id'";
    //if-else statement executing query
    if($db->exec($sql)){
        $output['message'] = 'Data updated successfully';
    }
    else{
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot update member';
    }

}
catch(PDOException $e){
    $output['error'] = true;
    $output['message'] = $e->getMessage();
}

//close connection
$database->close();

echo json_encode($output);
?>
