
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Get products</title>
</head>
<body>
<header>
    <ul>
        <li> <a href="home.php">Add Category</a> </li>
        <li> <a href="add.php">Add Product</a> </li>
        <li> <a href="get.php">Products</a> </li>
    </ul>
</header>

<form action="" method="post">
    Search: <input type="search" name="value" placeholder="search by name or category id">
            <input type="submit" name="search" value="search">
</form>

<table border="2px" cellpadding="5px" cellspacing="0">
    <tr>
        <td>Product id</td>
        <td>Product name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Image</td>
        <td>Category Id</td>
    </tr>

    <?php
        require_once "DBConnector.php";

        $sql = "Select id,name,price,quantity,categoryId FROM Product";

        if (isset($_POST['search'])){
            $value = $_POST['value'];
            if (!empty($value)){
                $parameter = "name";
                if (is_numeric($value)){
                    $parameter = "categoryId";
                }
                 $sql = "Select id,name,price,quantity,categoryId FROM Product where $parameter = '$value' ";
            }
        }

        $result = $connection->query($sql);
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>    <img src='imgs/product-icon.jpg' width='100' height='100'>   </td>";
                    echo "<td>" . $row['categoryId'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "' style='color: blue'>edit</a></td>";
                echo "<td><a href='delete.php?id=".$row["id"]."' style='color: red'>Delete</a></td>";
                echo "</tr>";
            }

        }



    ?>

</table>





</body>
</html>











