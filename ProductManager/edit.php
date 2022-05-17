<?php
require_once "DBConnector.php";
$id = $_GET['id'];
$result = $connection->query("SELECT * FROM Product WHERE id = $id");

    $row = $result->fetch_assoc();
    $oldName = $row['name'];
    $oldPrice = $row['price'];
    $oldQuantity = $row['quantity'];
    $oldCategoryId = $row['categoryId'];

?>


 <html>
 <head>
     <link rel="stylesheet" type="text/css" href="style.css">
     <title>Edit product details</title>
 </head>
 <body>

     <header>
         <ul>
             <li> <a href="home.php">Add Category</a> </li>
             <li> <a href="add.php">Add Product</a> </li>
             <li> <a href="get.php">Products</a> </li>
         </ul>
     </header>
    <form method="post" action="">
        <input type="text" name="id" value=" <?php echo $id ?> " disabled title="Product id" >
        <input type="text" name="name" value=" <?php echo $oldName ?>" title="product name" placeholder="Product name" >
        <input type="text" name="price" value=" <?php echo $oldPrice ?> " title="price" placeholder="Price">
        <input type="text" name="quantity" value=" <?php echo $oldQuantity ?> " title="Quantity" placeholder="Quantity" >
        <select style="width: 70px" name="categoryId" title="Category id">
            <?php
            $select = $connection ->query("SELECT id FROM Category");
            if ($select->num_rows > 0){
                while ($row = $select->fetch_assoc()){
                    $r = $row['id'];
                    if ($r == $oldCategoryId){
                        echo "<option value='$r' selected>" . $r . "</option>";
                    }else{
                        echo "<option value='$r'>" . $r . "</option>";
                    }
                }
            }

            ?>
        </select>
        <input type="file" name="image" title="image">
        <br>
        <input type="submit" name="edit" value="Edit" style="width: 100px">
        <input type="reset" name="reset" value="Clear" style="width: 100px">
    </form>
 </body>
 </html>

<?php

if (isset($_POST['edit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $categoryId = $_POST['categoryId'];

    $editQuery = "UPDATE product SET name = '$name' , price = $price , quantity = $quantity , categoryId = $categoryId WHERE id = $id";
    if ($connection->query($editQuery)){
        header('Location:get.php');
    }

}










