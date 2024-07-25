<?php
include_once('connection.php');
$output = array('error' => false);

$database = new connection();
$db = $database->open();
try{
    //use of prepared statement to prevent sql injection
    $stmt = $db->prepare("INSERT INTO tb_deposit (firstname, lastname, amount) VALUES (:firstname, :lastname, :amount)");
    //if-else statement executing prepared statement
    if ($stmt->execute(array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':amount' => $_POST['amount'])) ){
        $output['message'] = 'Deposit successfully';
    }
    else{
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot add member';
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
