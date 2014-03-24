<?php

$host = "localhost";
$user = "root";
$dbpasswd = "vertrigo";
$database = "book";
$tables = "books";

$connect = mysql_connect($host, $user,$dbpasswd);
$select = mysql_select_db($database);

    $bookname = $_POST['bookName'];
    $bookauthor = $_POST['bookAuthor'];
 
if (!empty($bookname) && !empty($bookauthor))
{

$operation = mysql_query("Insert into $tables (bookname, bookauthor) values ('$bookname', '$bookauthor')") or die("die");

header("HTTP/1.0 201 Created");
echo 'Created';

}
 
else{
header("HTTP/1.0 400 Bad Request");
echo 'not registered';
}

mysql_close($connect);



?>