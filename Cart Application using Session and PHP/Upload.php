<?php
  include('connection.php');  
  if(isset($_POST['sub'])){
     $imge=$_FILES['image']['name'];
     $path="Image/$imge";
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
    $insert="insert into items values(NULL,'$path','$imge',20.25,10)";
    $result=$conn->query($insert);
    if ($result === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
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
    <form action="Upload.php" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Item</h4>
            </div>
            <div class="card-body">
                <div class="form-group" align="center" >
                    <input type="file" name="image" id="f">
                </div>
                <div class="form-group" align="center">
                    <input type="submit" name="sub" class="form-group btn btn-success" value="submit">
                </div>
            </div>
        </div>
    </form>
</body>

</html>