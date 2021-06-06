<?php
require_once('dbhelp.php');
if(!empty($_POST)){
    //POST Handle
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM products WHERE id='$id'";
        execute($sql);

        echo 'Product has been deleted!';
    }
} 
?>