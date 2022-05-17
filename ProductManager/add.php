<?php
    require_once "DBConnector.php";

    if (isset($_POST['add'])){
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $categoryId = $_POST['categoryId'];

            $condition = $connection->query("SELECT id FROM Product WHERE id = $id")->num_rows;
            if ($condition > 0){
                echo "Product id $id is already exist!";
            }else{
                if (!is_numeric($price)){
                    echo "Enter valid price";
                }else{
                    $sql = "INSERT INTO product (id , name ,price , quantity , categoryId)
                VALUES ($id , '$name' , $price , $quantity , $categoryId)";
                    $connection->query($sql);
                }
            }
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Add Product</title>
    </head>
    <body>
        <header>
            <ul>
                <li> <a href="home.php">Add Category</a> </li>
                <li> <a href="add.php">Add Product</a> </li>
                <li> <a href="get.php">Products</a> </li>
            </ul>
        </header>

        <h1>Add Product</h1>
        <form method="post" action="">
            Product id: <input type="number" name="id" required> <br>
            Product Name: <input type="text" name="name" required> <br>
            Product price: <input type="text" name="price" required> <br>
            Product quantity: <input type="number" name="quantity" required> <br>
            Product image: <input type="file" name="img"> <br>
            Product category id:
            <select style="width: 70px" name="categoryId">
                    <?php
                        $select = $connection ->query("SELECT id FROM Category");
                        if ($select->num_rows > 0){
                            while ($row = $select->fetch_assoc()){
                                $r = $row['id'];
                                echo "<option value='$r'>" . $r . "</option>";
                            }
                        }
                        $vb = 1;
                        $Vb = 2;

                    ?>
             </select>
            <br>
            <input type="submit" name="add" value="Add product" id="submitBtn"> <br>
        </form>

    <Style>
        #submitBtn{
            background-color: green;
            color: white;
            padding: 5px;
            width: 100px;
            font-weight: bold;
        }
    </Style>
    </body>
</html>
