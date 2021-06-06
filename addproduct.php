<?php
//POST Handle
if(!empty($_POST)){
    $new_name = '';
    $new_price = '';
    
    //get name
    if(isset($_POST['name'])){
        $new_name = $_POST['name']; 
    }

    //get price
    if(isset($_POST['price'])){
        $new_price = $_POST['price']; 
    }

    require_once('dbhelp.php');

    $sql = "INSERT INTO products(name, price) VALUE ('$new_name', '$new_price')";
    execute($sql);
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <a href="index.php">Go to homepage</a>
    <form action="addproduct.php" method='POST'>
        <table>
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type='text' name='price' /></td>
            </tr>
        </table>
        <input type='submit' value='Add product'/>
    </form>
</body>
</html>