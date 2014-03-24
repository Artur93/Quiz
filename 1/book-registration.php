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
die(json_encode(array(
             "code" => 1,
             "name" => $bookname,
             "author" => $bookauthor
              )));

}
 
else{
header("HTTP/1.0 400 Bad Request");
die(json_encode(array(
			"code" => 0,
            "Message" => "Book Was Not Registered"
              )));
}

mysql_close($connect);



?>