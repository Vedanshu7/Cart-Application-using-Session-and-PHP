<?php
include("connection.php");
session_start();
if (isset($_SESSION["cart"])){
$item_array_id = array_column($_SESSION["cart"],"id");
}else{
    $item_array_id =array();
}
?>
<html>
<head>
    <title>Cart</title>

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
            background-color: #efefef;
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
        <h2>Cart</h2>
    </form>
    <div class="card-body">
        <?php
            if(count($item_array_id) > 0) {
                $i=count($item_array_id);
                for($x=0;$x<$i;$x++){
                      $ID= $item_array_id[$x];
                      $query = "SELECT Name,Price FROM items WHERE id=$ID ";
                      $result = mysqli_query($conn,$query);
                      if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $row["Name"];?>
                            <span class="badge badge-primary badge-pill">Price:<?php echo $row["Price"];?></span>
                            </li>
                        </ul>
                            
                  
                    <?php
                }
            }
        }
     }
      session_destroy();  ?>
        </div> 
    </div>
    </div>
</body>
</html>