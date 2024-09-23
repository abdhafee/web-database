<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Details System</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1>MWS & EID</h1>
    </nav>

    <!-- Header -->
    <div class="bimg" style="background-image: url('developing.webp'); width: 100%; height: 500px; position: relative; margin-top: 10px;"></div>
    <div class="bg-img"></div>
    
    <!-- Login Page -->
    <div class="login-box">
        <div class="login">
            <h1>Login Page</h1>
            <form action="connection.php" onsubmit="return isValid()" method="post" enctype="multipart/form-data">
                <label for="name">USERNAME :</label>
                <input type="text" id="name" name="user_name" placeholder="Enter The Valid User Name"><br>
                <label for="password">PASSWORD :</label>
                <input type="password" id="password" name="psswd" placeholder="Enter The Valid Password"><br>
                <button type="submit" id="login" value="Login" name="login">Login</button>
            </form>
        </div>
    </div>

    <script>
        function isValid() {
            var user_name = document.getElementById('name').value.trim();
            var psswd = document.getElementById('password').value.trim();

            if (user_name === "" && psswd === "") {
                alert("Username and Password fields are empty!");
                return false;
            }

            if (user_name === "") {
                alert("Username field is empty!");
                return false;
            }

            if (psswd === "") {
                alert("Password field is empty!");
                return false;
            }

            return true; // If all checks pass, allow form submission
        }
    </script>
</body>
</html>