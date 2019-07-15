<?php
include("connection.php"); 
  if(isset($_POST['sub'])){
    $insert="select path from items";
    $result=$conn->query($insert);
    $MyPhoto;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $MyPhoto=$row["path"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
  }
?>
<html>

<head>
    <title>
        17IT037
    </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="display.php" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Image</h4>
            </div>
            <div class="card-body">
                <div class="form-group" align="center" >
                    <img src="<?php echo $MyPhoto;?>" alt="Image">
                </div>
                <div class="form-group" align="center">
                    <input type="submit" name="sub" class="form-group btn btn-success" value="submit">
                </div>
            </div>
        </div>
    </form>
</body>

</html>