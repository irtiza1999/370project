<?php
include '_dbconnect.php';
$script = $_SERVER['SCRIPT_NAME'];
$params = $_SERVER['QUERY_STRING'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_POST['user_id'];
    $newName = $_POST['newName'];
    $newMail = $_POST['newMail'];
    $newPass = $_POST['newPass'];
    $newCPass = $_POST['cnewPass'];
    $newAddress = $_POST['newAddress'];
    if(strlen($newCPass)>0){    
        if($newPass == $newCPass){
            $newPass = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `user_name` = '$newName', `user_email` = '$newMail', `user_pass` = '$newPass',`user_address`='$newAddress' WHERE `user_id` = $user_id";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: /store/manageUser.php?edit=success");
            }else{
                header("Location: /store/manageUser.php?edit=failed");
            }
        }
        else{
            header("Location: /store/manageUser.php?edit=failed");
        }exit();
    }else{
        $sql = "UPDATE `users` SET `user_name` = '$newName', `user_email` = '$newMail', `user_address`='$newAddress' WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: /store/manageUser.php?edit=success");
    }else{
        header("Location: /store/manageUser.php?edit=failed");
    }    
}
    }
    
?>