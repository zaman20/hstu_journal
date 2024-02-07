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
            <?php if(session()->has('msg')): ?>
                <?php echo e(session('msg')); ?>

            <?php endif; ?>
        <div class="login-box">
            <h2>Welcome to Editorial Manager  for
                HSTU'ians in Journal and Research</h2>
            <div class="login-form">
                <label for="">Username:</label>
                <input type="text"> <br>
                <label for="">Password: </label>
                
                <input type="password">

                <button>Author Login</button>
                <button>Reviewer Login</button>
                <button>Editor Login</button>
                <button>Publisher Login</button>
            </div>

            <div class="register-box">
                <a href="">Send Login Details</a>
                <a href="<?php echo e(url('/author-register')); ?>">Register Now</a>
                <a href="">Login Help</a>
            </div>
           
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\hstu_journal\resources\views/login.blade.php ENDPATH**/ ?>