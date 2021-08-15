<?php
//connect to database
$conn = mysqli_connect('localhost', 'root', '', 'userlog');

//check connection
if(!$conn) {
    echo mysqli_connect_error();
}

?>