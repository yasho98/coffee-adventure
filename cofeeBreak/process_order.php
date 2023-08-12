<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Name = $_POST["Name"];
    $Age= $_POST["Age"];
    $Email = $_POST["Email"];
    $Phone = $_POST["Phone"];
    $Address = $_POST["Address"];
    $Coffeetype = $_POST["coffee_type"];
    $Bakeryitem = $_POST["bakery_item"];

/*
    echo print_r($Name = $_POST["Name"]);
    echo print_r($Email = $_POST["Email"]);
    echo print_r($Phone = $_POST["Phone"]);
    echo print_r($Adress= $_POST["Address"]);
    echo print_r($Coffeetype = $_POST["coffee_type"]);
    echo print_r($Bakeryitem = $_POST["bakery_item"]);
    */

    //Database Connection
    $conn = new  mysqli('localhost','root','','orders');
    if($conn-> connect_error){
        die( 'Çonnection Failed : ' .$conn->connect_error);
    } else {
    $stmt = $conn->prepare("INSERT INTO ordertable(Name,Age,Email,Phone,Address,Coffeetype,Bakeryitem)VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sisisss", $Name, $Age, $Email ,$Phone , $Address, $Coffeetype , $Bakeryitem);
    $stmt->execute();
    //echo print_r($stmt);
    echo "Order Successful....";
    $stmt->close();
    $conn->close();
    //header('location:order.html');
    }

}else{
    echo 'something went wrong. Try again';
    }

?>