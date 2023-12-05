<?php 
session_start();
include "db.php";
 global $name;
 global $pass;
 global $email;

 if(isset($_POST['submit'])){
    global $conn;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
   
    if (empty($name)) {
        header("Location: SignUp.php?error=User Name is required");
        exit();
    }
    else if(empty($email)){
        header("Location: SignUp.php?error=Email is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: SignUp.php?error=Password is required");
        exit();
    }
    else{
    $stmt = $conn->prepare("INSERT INTO registration(name,email,password) values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$pass);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header("Location: SignIn.php");
    exit();
    }
 }

  ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jarvis Sign Up</title>
        <link href="index.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e09b62ae63.js" crossorigin="anonymous"></script> 
    </head>

    <body>
        <section id="header">
            <a href="#"><img src="" class="logo" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="SignUp.php">SignUp</a></li>
                    <li><a href="SignIn.php">SignIn</a></li>
                    </ul>
            </div>
        </section>
        
      <div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form action="Signup.php" method="post">
            <div class="input-group" id="input">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" name="name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" id="email" name="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password">
                    </div>
                    <br>
                    <?php if (isset($_GET['error'])) { ?>
                    <span class="error"><?php echo "*".$_GET['error']; ?></span>
                    <?php } ?>
                    <div class="btn-field">
                        <button type="submit" id="signupBtn" value="submit" name="submit">Sign up</button>
                        <button type="submit" id="signinBtn" class="disable" value="submit">Sign In</button>
                    </div>
                    <br>
                    <p>Forgot Password <a href="#">Click Here</a></p>
                </div>
            </form>
        </div>

      </div>  
        <script src="index.js"></script>
    </body>
</html>