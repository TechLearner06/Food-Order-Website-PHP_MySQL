<?php
    //start session
    session_start();

    ob_start();
    
    $siteurl='http://localhost/Food_Order_Website/';
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="foodorder";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
      die("connection failed" .mysqli_connect_error());
    }
?>