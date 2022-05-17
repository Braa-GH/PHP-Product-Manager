<?php
    require_once "DBConnector.php";
    $note = "";

    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];

        if (!empty($id)) {
            $num = $connection->query("SELECT id FROM Category where id = $id")->num_rows;
            if ($num > 0) {
                $note = "Id $id is exist!";
            } else {
                if (!empty($name)) {
                    $sql = "INSERT INTO Category (id,name) VALUES ($id , '$name')";
                    $connection->query($sql);
                } else {
                    $note = "Name is empty!";
                }
            }
        } else {
            $note = "Id cannot be Null!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Categories</title>
    </head>
    <body>
    <header>
        <ul>
            <li> <a href="home.php">Add Category</a> </li>
            <li> <a href="add.php">Add Product</a> </li>
            <li> <a href="get.php">Products</a> </li>
        </ul>
    </header>

        <h1>Add Category</h1>

        <form method="post" action="">
            <label>Category id: </label>
            <input type="number" name="id">
            <br>
            <label>Category name: </label>
            <input type="text" name="name">
            <br>
            <input type="submit" name="add" value="Add Category" id="submitBtn">
        </form>
        <span>
            <?php echo $note ?> <br>
        </span>
        <br>
        <table border="1px">
            <tr>
                <td>Category id</td>
                <td>Category name</td>
            </tr>
            <?php
            $result = $connection -> query("SELECT * FROM Category");
                if ($result -> num_rows >0){
                    while ($row = $result -> fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "</tr>";
                    }
                }

            ?>
        </table>
        <style>
            #submitBtn{
                padding: 5px;
                background-color: green;
                color: white;
                width: 100px;
                font-weight: bold;
            }

            span{
                padding: 2px 5px;
                /*font-weight: bold;*/
                font-family: "Meiryo UI";
            }
        </style>

    </body>
</html>
