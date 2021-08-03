<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css ">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr rd:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="application/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">List of quarantined people</h2>
                    <a href="search.php" class="btn btn-success pull-right">Search people</a>
                    <a href="insert.php" class="btn btn-success pull-right">Add people</a>
                </div>
                <?php
                require_once 'config.php';
                $sql = "SELECT * FROM people order by name";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) >0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo"<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Telephone</th>";
                        echo "<th>Address</th>";
                        echo "<th>F</th>";
                        echo "<th>Location</th>";
                        echo "<th>Start Date</th>";
                        echo "<th>End Date</th>";
                        echo "</tr>";
                        echo"</thead>";
                        echo"<tbody>";
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['tel'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['F'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['start_date'] . "</td>";
                            echo "<td>" . $row['end_date'] . "</td>";
                            echo "<td>";
                            echo"<a href='update.php?id=". $row['id']
                                . "'title='Update Record' data-toggle='toolip'>
                                        <span class='glyphicon glyphicon-pencil'></span></a>";
                            echo"<a href='delete.php?id=". $row['id']
                                . "'title='Delete Record' data-toggle='toolip'>
                                        <span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        mysqli_free_result($result);
                    }else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                }else{
                    echo"ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
