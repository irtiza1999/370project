<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["userName"];
    $userEmail = $_POST["signupEmail"];
    $userAddress = $_POST["signupAddress"];
    $password = $_POST["signupPass"];
    $cpassword = $_POST["signupPassConfirm"];
    $exists = false;

    $sql = "SELECT user_email FROM `users`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $email = $row['user_email'];
        if($email==$userEmail){
            $exists = true;
        }
        }

    if(($password==$cpassword) && $exists==false){
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `user_address`, `user_created_timestamp`) VALUES ('$username', '$userEmail', '$password', '$userAddress', current_timestamp());
";
        $result = mysqli_query($conn,$sql);
        if($result){
            $showAlert = true;
        }
    }else{
        $showErr= true;
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <title>SignUp</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_header.php' ?>
    <div class="container">
        <h1 class="text-center">Signup</h1>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="userName" class="form-label">Username</label>
                <input type="text" class="form-control" id="userName" name="userName" aria-describedby="userName"
                    required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="signupAddress"
                    name="signupAddress" required></textarea>
                <label for="signupAddress">Enter your address</label>
            </div>
            <div class="mb-3">
                <label for="signupPass" class="form-label">Password</label>
                <input type="password" class="form-control" id="signupPass" name="signupPass" required>
            </div>
            <div class="mb-3">
                <label for="signupPassConfirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="signupPassConfirm" name="signupPassConfirm" required>
            </div>
            <button type="submit" class="btn btn-success">SignUp</button>
        </form>
    </div>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>