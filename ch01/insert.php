<html>
<head>
    <title>Add New | BookStore</title>
</head>
<body>
<?php
$bookId = 0;
$authorId = 0;
$title = "";
$ISBN = "";
$pub_year = 1999;
$availble = 1;

if (!empty($_POST['bookId '])){
    $bookId = $_POST['bookId '];
}

if (!empty($_POST['authorId '])){
    $bookId = $_POST['authorId '];
}

if (!empty($_POST['title '])){
    $bookId = $_POST['title '];
}

if (!empty($_POST['ISBN '])){
    $bookId = $_POST['ISBN '];
}

if (!empty($_POST['pub_year '])){
    $bookId = $_POST['pub_year '];
}

if (!empty($_POST['availble '])){
    $bookId = $_POST['availble '];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Book id: <input type="text" name="bookid">
    Author id: <input type="text" name="authorid">
    Title: <input type="text" name="title">
    ISBN: <input type="text" name="ISBN">
    Public Year: <input type="text" name="pub_year">
    Available: <input type="text" name="available">
    <input type="submit" value="Add Book">
</form>

<?php
$myDB = new mysqli('localhost', 'root', '', 'library');
if ($myDB->connect_error){
    die ('Connect Error (' . $myDB->connect_errno . ') ' . $myDB->connect_error);
}

if ($title != '' && $ISBN != ''){
    $insert = "insert into books (bookid, authorid, title, ISBN, pub_year, available) values
    ($bookId, $authorId, '$title', '$ISBN', $pub_year, $availble)";
    echo $insert;
    $myDB->query($insert);
    echo "New record created successfully";
}

if ($title != ''){
    $sql = "select * from books 
        where available =1 and title like '%{$title}$'
        order by title";
} else {
    $sql = "select * from books
        where available = 1 order by title";
}
$result = $myDB->query($sql);
?>
</body>
</html>