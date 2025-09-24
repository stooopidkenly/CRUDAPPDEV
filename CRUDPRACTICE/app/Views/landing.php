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
</body>

</html>