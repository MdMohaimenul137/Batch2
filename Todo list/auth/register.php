<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    
</body>
<div class="container">
    <form action="register_process.php" method="post">
        <h2>Registration</h2>
    
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>

            <button type="submit" name="register">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</html>