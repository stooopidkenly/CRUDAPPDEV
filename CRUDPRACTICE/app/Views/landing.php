<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to the Landing Page!</h1>
    <?php if (session()->getFlashdata('loginSuccess')): ?>
        <span style="color:green"><?php echo session()->getFlashdata('loginSuccess') ?></span>
    <?php endif ?>


    <h1>Welcome to the App! <?php echo session()->get('firstname') ?></h1>

    <form action="/logout" method="POST">
        <button type="submit">LOGOUT</button>
    </form>
</body>

</html>