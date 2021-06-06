<?php
    require_once('dbhelp.php');
    $id = '';
    $name = '';
    $price = '';

    if(!empty($_GET)){
        //GET Handle
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id='$id'";
        $product = select($sql)[0];
        $name = $product['name'];
        $price = $product['price'];
    }else if(!empty($_POST)){
        //POST Handle
        $s_id = '';
        $s_name = '';
        $s_price = '';
        if(isset($_POST['id_value']))
            $s_id = $_POST['id_value'];
        if(isset($_POST['name']))
            $s_name = $_POST['name'];
        
        if(isset($_POST['price']))
            $s_price = $_POST['price'];

        $sql = "UPDATE products SET name='$s_name', price='$s_price' WHERE id='$s_id'";
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
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit product</h1>
    <a href="index.php">Go to the homepage</a>
    <form action="edit.php" method='POST'>
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" value="<?php echo $id ?>" name='id_value'/>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" value="<?php echo $name ?>" name="name"/>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td>
                    <input type="text" value="<?php echo $price ?>" name="price"/>
                </td>
            </tr>
        </table>
        <input type='submit' value='Edit'/>
    </form>
</body>
</html>