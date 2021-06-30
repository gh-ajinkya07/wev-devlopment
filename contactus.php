<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Database Connection

    $conn = new mysqli('localhost', 'root','','customer');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into customer_feedback (Name, email, message) values (?,?,?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        echo "<script>alert('Feed Back Sent!!');window.location.href='products.html'</script>";
        $stmt->close();
        $conn->close();
    }

?>