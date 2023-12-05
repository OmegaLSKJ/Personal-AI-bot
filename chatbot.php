<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Javis Chatbot</title>
        <link rel="stylesheet" href="chatbot.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
        <script src="chatbot.js" defer></script>
    </head>
    <body class="Dark-mode">
    <h3 style="color:white;margin:10px 10px 10px 10px">Hello, <?php echo $_SESSION['name']; ?></h3>
    <a href="logout.php">
        <div class="lout">
        <button style="color: #fff;background:turquoise;padding:5px;margin:0 20px 10px 1200px">logout</button>
        </div>
    </a>
    <div class="chat-container"></div>
     <!-- Typing container -->
    <div class="typing-container">
        <div class="typing-content">
            <div class="typing-textarea">
                <textarea id="chat-input" placeholder="Enter a prompt here" required></textarea>
                <span id="send-btn" class="material-symbols-outlined">send</span>
            </div>
            <div class="typing-controls">
                <span id="theme-btn" class="material-symbols-outlined">light_mode</span>
                <span id="delete-btn" class="material-symbols-outlined">delete</span>
            </div>
        </div>
    </div>
        
    </body>
</html>