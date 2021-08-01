<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once 'config.php';

    $sql = "SELECT * FROM books WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt,"i",$param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)== 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $title = $row["title"];
                $author= $row["author"];
                $price = $row["price"];
                $qty = $row["qty"];
            }else{
                header("location: error.php");
                exit();
            }
        }
    }
}
?>
<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css ">
        .wrappers{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrappers">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>View Record</h1>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <p class="from-control-static"><?php echo $row["title"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <p class="from-control-static"><?php echo $row["author"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <p class="from-control-static"><?php echo $row["price"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <p class="from-control-static"><?php echo $row["qty"]; ?></p>
                </div>
                <p><a href="index.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>