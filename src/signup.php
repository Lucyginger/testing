<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup 1</title>
<!--     <link rel="stylesheet" href="signup.css"> -->
    <script src="https://kit.fontawesome.com/6233a8b1d1.js" crossorigin="anonymous"></script>

</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $firstname      = $_POST['firstname'];
            $lastname       = $_POST['lastname'];
            $email          = $_POST['email'];
            $password       = $_POST['password'];

            $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES(?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $email, $password]);
            if($result){
                echo'Successfully saved. ';
            } else{
                echo'There were errors. ';
            }
            
        }
        ?>
    </div>

    <section class="signup-booking">
        <p>Sign up and start sharing!</p>
        <hr>
        <div class="signup-container">
            <form id="signup-form">
                <div class='signup-left-right'>
                    <div class='signup-input-pack'>
                        <input type='text' class='signup-input-text-left' id='signup-firstname' placeholder="First Name"required>
                    </div>
                    <div class='signup-input-pack'>
                        <input type='text' class='signup-input-text-right' id='signup-lastname' placeholder="Last Name" required>
                    </div>
                </div>
                <div class='signup-input-pack'>
                    <input type='text' class='signup-input-text' id='signup-username' placeholder="Username" required>
                </div>
                <div class='signup-input-pack'>
                    <input type='email' class='signup-input-text' id='signup-email' placeholder="Email" required>
                </div>
                <div class='signup-input-pack'>
                    <input type='password' class='signup-input-text' id='signup-password' placeholder="Password" required>
                </div>
                <div class='signup-input-pack'>
                    <input type='password' class='signup-input-text' id='signup-confirmpassword' placeholder="Confirm Password" required>
                </div>
            </form> 
        </div>
        <div class='signup-dot-container'>
             <span class="signup-dot-current"></span>
            <span class="signup-dot"></span>
            <span class="signup-dot"></span>  
        </div>
        
        <button class='signup-button'>Next</button>
    </select>

</body>
<script src="../js/navbar.js"></script>
</html>
