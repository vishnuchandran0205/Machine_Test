<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Page</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .registration-form {
            display: none; /* Initially hide the registration form */
        }
    </style>
</head>
<body>
    <div class="login-container">
       <div id="login-h2" style="display:block"><h2>Login</h2></div> 
        @if(session('error'))
        <div class="alert alert-danger" style="color: red">
            {{ session('error') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-danger" style="color: green">
            {{ session('success') }}
        </div>
        @endif

        <form action="/adminlogin" method="post" id="login-form">
            @csrf
            <input type="text" id="username" name="username" placeholder="Username">
            <div>
                <span id="username-error" style="color: red"></span>
            </div>
            <input type="password" id="password" name="password" placeholder="Password">
            <div>
                <span id="password-error" style="color: red"></span>
            </div>
            <button type="submit" onclick="return mainVal();">Login</button>

            <p ><a href="#" onclick="showRegistrationForm()">Register</a></p>
        </form>

        <hr> <!-- Add a horizontal line to separate login and registration forms -->

        <div id="reg-h2" style="display: none"><h2>Registration</h2></div>
       
        <form action="/register" method="post" class="registration-form" id="registration-form">
            @csrf
            <input type="text" id="name" name="name" placeholder="Name">
            <div>
                <span id="reg-name-error" style="color: red"></span>
            </div>
            <input type="text" id="reg-username" name="reg-username" placeholder="Username">
            <div>
                <span id="reg-username-error" style="color: red"></span>
            </div>
            <input type="password" id="reg-password" name="reg-password" placeholder="Password">
            <div>
                <span id="reg-password-error" style="color: red"></span>
            </div>
            <button type="submit" onclick="return regVal();">Register</button>
            <p><a href="##" onclick="showLoginForm()">Login</a></p>
        </form>

        
       
    </div>

    <script>
        function mainVal() {
            // Your existing login validation logic here
            uname = document.getElementById('username').value;
            paswd = document.getElementById('password').value;

            if (uname == "" || uname == null) {
                document.getElementById('username-error').innerHTML ='username field is required';
                return false;
            } else if (paswd == "" || paswd == null) {
                document.getElementById('password-error').innerHTML ='password field is required';
                return false;
            } else {
                return true;
            }
        }

        function regVal() {
            // Your existing registration validation logic here
            name = document.getElementById('name').value;
            regUname = document.getElementById('reg-username').value;
            regPaswd = document.getElementById('reg-password').value;

            if (name == "" || name == null) {
                document.getElementById('reg-name-error').innerHTML ='name field is required';
                return false;
            } else if (regUname == "" || regUname == null) {
                document.getElementById('reg-username-error').innerHTML ='username field is required';
                return false;
            } else if (regPaswd == "" || regPaswd == null) {
                document.getElementById('reg-password-error').innerHTML ='password field is required';
                return false;
            } else {
                return true;
            }
        }

        function showRegistrationForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('login-h2').style.display = 'none';
            document.getElementById('reg-h2').style.display = 'block';
            document.getElementById('registration-form').style.display = 'block';
            document.getElementById('reg').style.display = 'none';
            document.getElementById('lflogin').style.display = 'block';
        }
        function showLoginForm() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('login-h2').style.display = 'block';
            document.getElementById('reg-h2').style.display = 'none';
            document.getElementById('registration-form').style.display = 'none';
            document.getElementById('reg').style.display = 'block';
            document.getElementById('lflogin').style.display = 'none';
        }
        
    </script>
</body>
</html>
