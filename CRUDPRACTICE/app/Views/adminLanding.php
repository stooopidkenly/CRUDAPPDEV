<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin Landing Page</h1>
    <?php if (session()->getFlashdata('loginSuccessAdmin')): ?>
        <span style="color:green;"><?php echo session()->getFlashdata('loginSuccessAdmin') ?></span>
    <?php endif ?>

    <form action="/admin/showUsers" method="get">
        <button type="submit">Show All Users</button>
    </form>
</body>

</html>