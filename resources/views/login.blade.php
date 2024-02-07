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
            @if(session()->has('msg'))
                {{session('msg')}}
            @endif
            <h2>Welcome to Editorial Manager  for
                HSTU'ians in Journal and Research</h2>
            <div class="login-form">
                <form action="/auth-login" id="loginForm" method="post">
                    @csrf
                    <label for="">Username:</label>
                    <input type="text" name="name"> <br>
                    <label for="">Password: </label>
                    <input type="password" name="password">
                    <input type="hidden" class="type" name="type">
                </form>
                <button class="author-login">Author Login</button>
                <button class="reviewer-login">Reviewer Login</button>
                <button class="editor-login">Editor Login</button>
                <button class="publisher-login">Publisher Login</button>
            </div>

            <div class="register-box">
                <a href="">Send Login Details</a>
                <a href="{{url('/author-register')}}">Register Now</a>
                <a href="">Login Help</a>
            </div>
           
        </div>
    </div>


    <script src="js/jquery-3.6.4.min.js"></script>
    <script>
        $('.author-login').on('click',function(){
            $('.type').val('author');
            $('#loginForm').submit();
        });
    </script>
</body>
</html>