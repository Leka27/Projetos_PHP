<?php
 
echo "teste";
echo phpInfo();

$con = mysqli_connect("192.168.100.71","root","root","teste");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
    echo "conectou";
}

?>
