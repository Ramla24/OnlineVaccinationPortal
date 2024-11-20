<?php

include 'config.php';

if (isset($_POST['fullname'],$_POST['address'],$_POST['nic'],$_POST['pno'],$_POST['email'],$_POST['tel'])){
    exit("empty field");
}

if (empty($_POST['fullname'] || empty($_POST['address']) || empty($_POST['nic']) || empty($_POST['pno']) || empty($_POST['email']) || empty($_POST['tel']))){
    exit("empty values"); 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $pno = $_POST['pno'];
        $tel = $_POST['tel'];
        
        
        $stmt = $conn->prepare("INSERT INTO registerform (fullname, email, nic, address,pno,tel) VALUES ("$fullname", "$email", "$nic", "$address", "$pno", "$tel")");
        $stmt->bind_param("ssis", $fullname, $email, $nic, $address, $pno,$tel);

        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $pno = $_POST['pno'];
        $tel = $_POST['tel'];
        

        
        $stmt = $conn->prepare("UPDATE registerform SET fullname=?, email=?, nic=?, address=?, pno=?, tel=? WHERE id=?");
        $stmt->bind_param("ssisi", $fullname, $email, $nic, $address, $pno,$tel);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>