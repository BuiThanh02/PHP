<?php
require_once 'config.php';
$id = $name = $tel = $address = $F = $location = $start_date = $end_date = '';
$id_err = $name_err = $tel_err = $address_err = $F_err = $location_err = $start_date_err = $end_date_err = '';

if (isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if(empty($input_name)) {
        $name_err = "Please enter a name.";
    }else{
        $name = $input_name;
    }

    $input_tel = trim($_POST["tel"]);
    if(empty($input_tel)) {
        $tel_err = "Please enter a tel.";
    }else{
        $tel = $input_tel;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)) {
        $address_err = "Please enter a address.";
    }else{
        $address = $input_address;
    }

    $input_F = trim($_POST["F"]);
    if(empty($input_F)) {
        $F_err = "Please enter F.";
    }else{
        $F = $input_F;
    }

    $input_location = trim($_POST["location"]);
    if(empty($input_location)) {
        $location_err = "Please enter a location.";
    }else{
        $location = $input_location;
    }

    $input_start_date = trim($_POST["start_date"]);
    if(empty($input_start_date)) {
        $start_date_err = "Please enter a start_date.";
    }else{
        $start_date = $input_start_date;
    }

    $input_end_date = trim($_POST["end_date"]);
    if(empty($input_end_date)) {
        $end_date_err = "Please enter a end_date.";
    }else{
        $end_date = $input_end_date;
    }

    if(empty($id_err)&&empty($name_err)&&empty($tel_err)&&empty($address_err)&&empty($F_err)&&empty($location_err)&&empty($start_date_err)&&empty($end_date_err)){
        $sql = "UPDATE people SET name=?, tel=?, address=?, F=?, location=?, start_date=?, end_date=? WHERE id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt,"ssssssss",$param_name, $param_tel, $param_address, $param_F, $param_location, $param_start_date, $param_end_date, $param_id);

            $param_id = $id;
            $param_name = $name;
            $param_tel = $tel;
            $param_address = $address;
            $param_F = $F;
            $param_location= $location;
            $param_start_date = $start_date;
            $param_end_date = $end_date;

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
    if (isset($_GET["id"]) && !empty($_GET["id"])){
        $id = trim($_GET["id"]);

        $sql = "SELECT * FROM people WHERE id=?";
        if ($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result)==1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $id = $row["id"];
                    $name = $row["name"];
                    $tel = $row["tel"];
                    $address = $row["address"];
                    $F = $row["F"];
                    $location = $row["location"];
                    $start_date = $row["start_date"];
                    $end_date = $row["end_date"];
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
                    <div class="form-group <?php echo (!empty($name_err))? 'has-error' : ''; ?>">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control" value="">
                        <span class="help-block"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($tel_err))? 'has-error' : ''; ?>">
                        <label >Telephone</label>
                        <input type="text" name="tel" class="form-control" value="">
                        <span class="help-block"><?php echo $tel_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err))? 'has-error' : ''; ?>">
                        <label >Address</label>
                        <input type="text" name="address" class="form-control" value="">
                        <span class="help-block"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($F_err))? 'has-error' : ''; ?>">
                        <label >F</label>
                        <input type="text" name="F" class="form-control" value="">
                        <span class="help-block"><?php echo $F_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($location_err))? 'has-error' : ''; ?>">
                        <label >Location</label>
                        <input type="text" name="location" class="form-control" value="">
                        <span class="help-block"><?php echo $location_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($start_date_err))? 'has-error' : ''; ?>">
                        <label >Start Date</label>
                        <input type="text" name="start_date" class="form-control" value="">
                        <span class="help-block"><?php echo $start_date_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($end_date_err))? 'has-error' : ''; ?>">
                        <label >End Date</label>
                        <input type="text" name="end_date" class="form-control" value="">
                        <span class="help-block"><?php echo $end_date_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="submit">
                    <a href="index.php" class="btn btn-defauft">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>