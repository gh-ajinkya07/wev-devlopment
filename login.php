<?php

    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Database Connection

    $conn = new mysqli('localhost','root','','customer');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("select * from registration where Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if ($data['Password'] == $password){
                echo "<script>alert('Login Successfully');window.location.href='products.html'</script>";
            }
            else{
                echo "<script>alert('Invalid Password');window.location.href='accounts.html'</script>";
            }
        }
        
        else
        {
            echo "<script>alert('Invalid Email or Password');window.location.href='accounts.html'</script>";
        }
 }
?>