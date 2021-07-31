<?php
$myDB = new mysqli('localhost', 'root', '', 'library');
if ($myDB->connect_error){
    die('Connect Error (' . $myDB->connect_errno . ') ' . $myDB->connect_error);
}
$sql = "select * from books where available = 1 order by title";
$result = $myDB->query($sql);
?>

<table cellspacing="2" cellpadding="6" align="centter" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">These Books are currently available</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">ISBN</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo stripslashes($row["title"]);
        echo "</td><td align='center'>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["TSBN"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>


