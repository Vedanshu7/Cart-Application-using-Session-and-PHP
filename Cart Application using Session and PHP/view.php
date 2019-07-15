<?php
  include("connection.php");
  session_start();
  if(isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'id' => $_GET["id"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="view.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="view.php"</script>';
        }
    }
    else{
        $item_array = array(
            'id' => $_GET["id"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
  }

?>
<html>
<head>
    <title>Items</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  ></script>

    <style>
         @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #ffffff;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
    </style>
</head>
<body>

    <div class="container">
    <div class="card">
    <div class="card-header">
        <h2>Items</h2>
        </div>
        <form method="POST" action="new.php">
        <input type="submit" name="cart"  class="btn btn-info pull-right"
                                       value="Cart">
    </form>
    <div class="card-body">
         <div class="row">
        <?php
            $query = "SELECT * FROM items ORDER BY id ASC ";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    
                    <div class="col-md-3">

                        <form method="POST" action="view.php?id=<?php echo $row["Id"];?>" enctype="multipart/form-data">

                            <div class="product">
                                <img src="<?php echo $row["path"]; ?>" class="img-thumbnail">
                                <h5 class="text-info"><?php echo $row["Name"]; ?></h5>
                                <h5 class="text-danger">$<?php echo $row["Price"]; ?></h5>
                                <h5 class="form-info">Item Left:<?php echo $row["availability"];?></h5>
                                <input type="submit" name="add"  class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
              
                    <?php
                }
            }
        ?>
          </div>
         </div>
    </div>
    </div>
</body>
</html>