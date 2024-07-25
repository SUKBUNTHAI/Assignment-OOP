<?php
include_once('connection.php');
$database = new connection();
$db = $database->open();

try{
    $sql = 'SELECT * FROM tb_deposit';
    foreach ($db->query($sql) as $row) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['amount']; ?></td>

            <td>
                <button class="btn btn-success btn-sm edit" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                <button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </td>
        </tr>
        <?php
    }
}
catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
}

//close connection
$database->close();
?>
<?php
