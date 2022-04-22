<?php  

//Connect to database
    $conn = mysqli_connect('localhost', 'Derrick', 'admin', 'derrick_pizza' );
//check connection
    if(!$conn):
        echo 'Connection error: ' . mysqli_connect_error();
    endif;

?>