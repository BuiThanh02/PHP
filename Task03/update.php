<?php
require_once 'config.php';
$id = $title = $author = $price = $qty = '';
$id_err = $title_err = $author_err = $price_err = $qty_err = '';
if (isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $input_id = trim($_POST["id"]);
    if(empty($input_id)) {
        $id_err = "Please enter a ID.";
    }elseif (!ctype_digit($input_id)) {
        $id_err = 'Please enter a valid ID.';
    }else{
        $id = $input_id;
    }

    $input_title = trim($_POST["title"]);
    if(empty($input_title)) {
        $title_err = "Please enter a title.";
    }elseif (!filter_var(trim($_POST["title"]), FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$")))){
        $title_err = 'Please enter a valid title.';
    }else{
        $title = $input_title;
    }

    $input_author = trim($_POST["author"]);
    if(empty($input_author)) {
        $author_err = "Please enter a author.";
    }elseif (!filter_var(trim($_POST["author"]), FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$")))){
        $author_err = 'Please enter a valid author.';
    }else{
        $author = $input_author;
    }

    $input_price = trim($_POST["price"]);
    if(empty($input_price)) {
        $price_err = "Please enter a price.";
    }elseif (!ctype_digit($input_price)) {
        $id_err = 'Please enter a valid price.';
    }else{
        $price = $input_price;
    }

    $input_qty = trim($_POST["qty"]);
    if(empty($input_qty)) {
        $qty_err = "Please enter a qty.";
    }elseif (!ctype_digit($input_qty)) {
        $id_err = 'Please enter a valid qty.';
    }else{
        $qty = $input_qty;
    }

    if(empty($id_err)&&empty($title_err)&&empty($author_err)&&empty($price)&&empty($qty_err)){
        $sql = "UPDATE books SET id=?, title=?, author=?, price=?, qty=? WHERE id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt,"sssi",$param_id, $param_title, $param_author, $param_price, $param_qty);

            $param_id = $id;
            $param_title = $title;
            $param_author = $author;
            $param_price = $price;
            $param_qty = $qty;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            }else{
                echo "Something went wrong. please try again later";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_stmt_close($link);
}else{
    if (isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];

        $sql = "SELECT * FROM books WHERE id=?";
        if ($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result)==1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $id = $row["id"];
                    $title = $row["title"];
                    $author = $row["author"];
                    $price = $row["price"];
                    $qty = $row["qty"];
                }else{
                    header("location: error.php");
                    exit();
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }else{
        header("location: error.php");
        exit();
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
                    <h1>Update Record</h1>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($id_err))? 'has-error':'';?>">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $id;?>">
                        <span class="help-block"><?php echo $id_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($title_err))? 'has-error':'';?>">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title;?>">
                        <span class="help-block"><?php echo $title_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($author_err))? 'has-error':'';?>">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" value="<?php echo $author;?>">
                        <span class="help-block"><?php echo $author_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($price_err))? 'has-error':'';?>">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $price;?>">
                        <span class="help-block"><?php echo $price_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($qty_err))? 'has-error':'';?>">
                        <label>Qty</label>
                        <input type="text" name="qty" class="form-control" value="<?php echo $qty;?>">
                        <span class="help-block"><?php echo $qty_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <input type="submit" class="btn btn-primary" value="submit">
                    <a href="index.php" class="btn btn-defauft">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>