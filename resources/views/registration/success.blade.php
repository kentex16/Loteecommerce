<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body
        {
            background-image: url('/images/your-background-image.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 18px;
            color: #333;
        }

        .container .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .container .btn:hover {
            background-color: #0056b3;
        }

        .dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .dialog-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .dialog-box h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .dialog-box .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dialog-box .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registration Successful!</h1>
        <p>Your registration was successful. You can now log in.</p>
        <a class="btn" id="logincss" href="{{ route('login') }}">Login</a>
    </div>

    
    <div class="dialog" id="dialog-box">
        <div class="dialog-box">
            <h2>Registration Successful!</h2>
            <p>Your registration was successful. You can now log in.</p>
            <a class="btn" id="logincss" href="{{ route('login') }}">Login</a>
        </div>
    </div>

   
    <script>
        setTimeout(function () {
            document.getElementById("dialog-box").style.display = "flex";
        }, 2000); 
    </script>
</body>

</html>
