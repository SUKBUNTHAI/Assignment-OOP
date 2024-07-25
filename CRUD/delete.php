<?php
include_once('connection.php');

$output = array('error' => false);

$database = new connection();
$db = $database->open();
try{

    $sql = "DELETE FROM tb_deposit WHERE id = '".$_POST['id']."'";
    //if-else statement executing query
    if($db->exec($sql)){
        $output['message'] = 'Data deleted successfully';
    }
    else{
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot delete member ';
    }
}
catch(PDOException $e){
    $output['error'] = true;
    $output['message'] = $e->getMessage();;
}

//close connection
$database->close();

echo json_encode($output);
?>
