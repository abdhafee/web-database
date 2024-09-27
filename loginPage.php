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

<style>
.bimg{
  background-image: url('developing.webp'); 
  width: 100%; 
  height: 500px; 
  position: relative; 
  margin-top: 10px;
}
.login-box{
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  transition: 2s;
  border-radius: 20px;
  width: 35vw;
  height: auto;
  top: -290px;
  left: 480px;
  padding: 20px;
  position: absolute;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.bg-img{
  background-color: #003104;
  width: 100%;
  height: 200px;
  position: relative;
}

.login-box h1{
  text-align: center;
  padding: 10px;
}

.login-box label{
  padding: 20px;
  font-weight: bold;
}

.login input{
  padding: 10px;
  display:flex;
  width: 30vw;
  margin: 10px;
  background: transparent;
  border-radius: 10px;
  border: solid 3px #000;
}

.login button{
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 10px;
  width: 15vw;
  margin-left: 125px;
  margin-top: -10px;
  font-weight: bold;
  border-radius: 10px;
  background-color: #000;
  color: #ddd;
}
  /* Responsive design */
@media (max-width: 768px) {
  *{
    margin: 0;
    padding: 0;
  }

  html,body{
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: 'Poppins', sans-serif;
}

.bimg{
  width: 100%; 
  height: 400px; 
  position: relative;
  margin-top: 10px;
}

.bg-img{
  background-color: #003104;
  width: 100%;
  height: 240px;
  position: relative;
  }

.login-box {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  transition: 2s;
  width: 70vw;
  height: auto;
  top: -290px;
  left: 50px;
  padding: 20px;
  position: absolute; /* Reduced padding */
  border-radius: 10px; /* Slightly less rounded */
  height: auto; /* Allows content to define height */
  margin: 10px auto; /* Centering */
}

.login input {
  width: 64vw;
  margin: 10px;
  background: transparent;
  margin-left: 0; /* Reset margin for mobile */
}

.login button {
  width: 100px; /* Full width for button */
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  margin-left: 125px;
  position: relative;
  left: -25px;
}

.login-box h1 {
  font-size: 28px;
  margin-top: -20px;
}

.login-box label {
  font-size: 14px; /* Smaller font size */
  right: 20px;
  position: relative;
}
}

</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1>MWS & EID</h1>
    </nav>

    <!-- Header -->
    <div class="bimg" style=""></div>
    <div class="bg-img">

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
