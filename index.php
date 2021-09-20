<?php
$host="localhost";
$user="root";
$passowrd="";
$dbname="shop";
$conn= mysqli_connect($host,$user,$passowrd,$dbname);


//insert
if(isset($_POST['send'])){
$names = $_POST['names'];
$price = $_POST['price-product']; 
 $insert = "INSERT INTO `products` Values (null ,'$names', $price)";
 $i = mysqli_query($conn, $insert);
}

//read select 
$select = "SELECT * FROM  `products`";
$s= mysqli_query($conn , $select);

//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM `products` WHERE id =$id ";
   $d= mysqli_query($conn , $delete);
} 



?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
        <h2 class="text-info text-center">CURD operator</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>names</label>
                        <input name="names"  type="text" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input name="price-product" type="text"  class="form-control" placeholder="price">
                    </div>
                    <div class="mx-auto w-25">
                    <button name="send" class="btn btn-info mt-3 mx-auto w-100  " > send data </button>
                    <button name="update" class="btn btn-primary mt-3 mx-auto w-100 " > Update data </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-6  mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                   <tr>
                       <th>ID</th>
                       <th>NAME</th>               
                       <th>PRICE</th>
                       <th>Action</th>
                   </tr>
                   <?php foreach($s as $data){ ?>
                    <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['names'] ?></td>
                    <td><?php echo $data['price'] ?></td>
                    <td><a href="index.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                    <a href="index.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
                </td>

                    <?php }?>
                </table>
      </div>
        </div>
            </div>

    
</body>
</html>