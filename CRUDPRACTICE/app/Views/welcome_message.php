<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        h1 {
            display: flex;
            justify-content: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 40px;
        }

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu a {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-decoration: none;

        }

        a {
            margin: 20px;
            margin-top: 100px;
            font-size: 42px;
        }
    </style>

</head>

<body>
    <h1>Welcome to my Basic CRUD Application</h1>

    <!-- Account Creation Successful -->
    <?php if (session()->getFlashdata('completed')): ?>
        <span style="color: green;"><?php echo session()->getFlashdata('completed') ?></span>
    <?php endif ?>

    <?php if (session()->getFlashdata('incomplete')): ?>
        <span style="color: red;"><?php echo session()->getFlashdata('incomplete') ?></span>
    <?php endif ?>

    <?php if (session()->getFlashdata('adminSuccess')): ?>
        <span style="color: green;"><?php echo session()->getFlashdata('adminSuccess') ?></span>
    <?php endif ?>

    <div class="menu">
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/adminCreateAccount">AdminCreateAccount</a>
        <a href="/adminLogin">AdminLoginAccount</a>
    </div>
</body>

</html>