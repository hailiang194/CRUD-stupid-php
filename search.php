<?php 
require_once('dbhelp.php');
if(isset($_POST['query']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairShop - Search</title>
    <style>
        table{
            width: 100%;
        }
        th, td{
            border: 1px solid #000;
            text-align: center;
            margin: 0px;
        }
        .btn{
            display: inline-block;
            background: blue;
            border-radius:20px;
            padding:20px;
            text-decoration: none;
            color: white;
            margin: 5px;
        }

        .edit{
            background-color: orange;
        }

        .delete{
            background-color: red;
            border: none;
        }
        form{
            margin : 10px auto;
        }
    </style>
</head>
<body>
    <h1 onclick="window.location.href = 'index.php'">Quản lý cửa hàng bán mỹ phẩn tóc của cô Hà</h1>
    <h3>Search</h3>
    <form action="search.php" method="POST">
        <input type="text" value="<?php echo isset($_POST['query']) ? $_POST['query'] : '' ?>" placeholder="Search" name="query"/>
        <input type="submit" value="Search" />
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th style="width: 60px"></th>
                <th style="width: 60px"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $product = [];

            if(isset($_POST['query'])){
                $query = strtolower($_POST['query']);
                $sql = "SELECT * FROM products WHERE LOWER(name) LIKE '%$query%'";
                $products = select($sql);
            }

            foreach($products as $product){
                echo '
                <tr>
                    <td>'.$product['name'].'</td>
                    <td>'.$product['price'].'</td>
                    <td><a class="btn edit" href="edit.php?id='.$product['id'].'">Edit</a></td>
                    <td><button class="btn delete" onclick="deleteProduct('.$product['id'].')">Delete</button></td>
                </tr>';

            }
        ?>
        </tbody>
    </table>
    <a class="btn" href="addproduct.php">Add products</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    const deleteProduct = (id) => {
        console.log(id);
        $.post('delete.php', {'id': id}, (data) => {
            location.reload();
        });
    }
    </script>
</body>
</html>