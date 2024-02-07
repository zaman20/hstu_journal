<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSTU in Journal and Research</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-container login-box-wrapper">
        <div class="login-box">
            <h2>Welcome to Editorial Manager  for
                HSTU'ians in Journal and Research</h2>
            <div class="login-form">
                <form action="/add-author" method="post">
                    @csrf
                    <label for="">Username:</label> <br>
                    <input type="text" name="name"> <br>
                    <label for="">Password: </label> <br>
                    <input type="password" name="password"> <br>
                    <label for="">Email: </label> <br>
                    <input type="email" name="email"> <br>
                    <input type="submit" value="Register Now" >
                </form>
            </div>

            <div class="register-box">
                <a href="{{url('/')}}">Login Now</a>
            </div>
           
        </div>
    </div>
</body>
</html>