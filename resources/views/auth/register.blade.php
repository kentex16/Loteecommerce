<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppin&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        .header{
            position: fixed;
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 100px;
            z-index: 99;
            background: transparent;
        }
        .header .nav a{
            text-decoration: none;
            color: #fff;
            font-size: 17px;
            margin-left: 20px;
            font-weight: 600;
        }
        .header .search input {
            background: transparent;
            font-size: 20px;
            border-radius: 5px;
            border: 2px solid white;
            padding-left: 10px;
            right: 100px;
            outline: none;
            color: #fff;
        }
        .header .search i{
            position: absolute;
            right: 110px;
            top: 22px;
            color: #fff;
        }
        .background
        {
            width: 100%;
            height: 100vh;
            background-image: url('/images/your-background-image.jpg');
            background-position: center;
            background-size: cover;
        }
        .home{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 75%;
            height: 75%;
            transform: translate(-50%,-50%);
            background-image: url('/images/your-background-image.jpg');
            background-position: center;
            background-size: cover;
            display: flex;
            margin-top: 10px;
            border: 1px solid black;
            border-radius: 10px;
            border: none;
        }
        .content{
            display: flex;
            flex-direction: column;
            width: 700px;
            padding: 100px 0;
        }
        .content a{
            position: relative;
            text-decoration: none;
            color: #fff;
            font-size: 3em;
            font-weight: 700;
            top: -40px;
            left: 80px;
        }
        .content h2,
        .content h3,
        .content pre {
            text-align: center;
            color: #fff;
            display: block;
        }

        .content h2 {
            font-size: 3.5em;
        }

        .content h3 {
            font-size: 2em;
        }

        .content pre {
            margin-top: 20px;
            font-size: 1em;
        }

        .content .icon {
            margin-top:20px;
            font-size: 1.5em;
            display: flex;
            justify-content: center;
        }
        .content .icon i {
            margin-left: 20px;
            color: #fff;
        }
        .login {
            width: 450px;
            position: relative;
            padding: 100px 30px;
            backdrop-filter: blur(20px);
            margin-left: auto;
        }
        .login h2{
            font-size: 2em;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        .login .input{
            position: relative;
            width: 100%;
            height: 30px;
            margin-bottom: 40px;
        }
        .login .input .input1 {
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: transparent;
            border:none;
            outline: none;
            border-bottom: 2px solid #fff;
            color: #fff;
            width: 100%;
            height: 100%
        }

        ::placeholder
        {
            color: #fff;
            font-size: 18px;
        }
        
        .check {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            color: #fff;
        }
        .check a {
            text-decoration: none;
            color: #fff;
        }
        .check a:hover{
            text-decoration: underline;
        }
        .login .button 
        {
            width: 100%;
            height: 40px;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            height: 40px;
            background-color: crimson;
            border: none;
            outline: none;
            outline: none;
            outline: none;
            font-size: 20px;
            font-weight: 700;
            border-radius: 7px;
            color: #fff;
        }
        button:active{
            font-size: 25px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin="anonymous"></script>
    <title>Lote.ph</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
         

            <a class="nav-link" href="/">Home</a>

    </header>

    <div class="background">
        <section class="home">
            <div class="content">
                <a href="#" class="logo">Lote.PH</a>
                <h2>WELCOME AND INQUIRE</h2>
                <h3>BUY AND SELL LANDS</h3>
                <pre> VISIT LOTE.PH FOR LAND LOT INQUIRIES AND SALES</pre>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
            <div class="login">
                <h2>Register</h2>
                
                    <x-slot name="logo">
                        <x-authentication-card-logo />
                    
                    
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input">
                            <input id="name" class="input1" type="text" name="name"
                                :value="old('name')" placeholder="Name" required > 
                            
                        </div>
                        <div class="input">
                            <input id="email" class="input1" type="email" name="email" placeholder="Email"
                                :value="old('email')" required > 
                            
                        </div>
                        <div class="input">
                            <input id="phone" class="input1" type="number" name="phone" placeholder="Phone"
                                :value="old('phone')" required > 
                            
                        </div>
                        <div class="input">
                            <input id="address" class="input1" type="text" name="address" placeholder="Address"
                                :value="old('address')" required > 
                            
                        </div>
                        <div class="input">
                            <input id="password" class="input1" type="password" name="password" placeholder="Password" required
                                 >
                            
                        </div>
                        <div class="input">
                            <input id="password_confirmation" class="input1" type="password" name="password_confirmation" placeholder="Confirm Password" required
                                 >
                            
                        </div>
                        <div class="check">
                            <label for="terms" class="flex items-center">
                                <x-checkbox id="terms" name="terms" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('I agree to the terms and privacy policy') }}</span>
                           
                        <div class="check">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                      
                        <div class="button">
                            <x-button>
                                {{ __('Register') }}
                            </x-button>
                        </div>
                        </div>
                    </label>
                </div>
                    </form>
              
            </div>
        </section>
    </div>
</body>
</html>
