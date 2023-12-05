<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jarvis-Sign In</title>
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
            <h1 id="title">Sign In</h1>
            <form action="login.php" method="post">
                <div class="input-group" >
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <br>
                    <?php if (isset($_GET['error'])) { ?>
                    <span class="error"><?php echo "*".$_GET['error']; ?></span>
                    <?php } ?>
                    <div class="btn-field">
                        <button type="submit" id="signupBtn">Sign In</button>
                    </div>
                    <br>
                    <p>Forgot Password <a href="#">Click Here</a></p>
                </div>
                </div>
            </form>
        </div>

      </div>  
        <script src="index.js"></script>
    </body>
</html>