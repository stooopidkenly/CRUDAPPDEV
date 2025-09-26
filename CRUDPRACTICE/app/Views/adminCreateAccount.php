<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('inc')): ?>
        <span style="color:red"><?php echo session()->getFlashdata('inc') ?></span>
    <?php endif ?>

    <?php if (session()->getFlashdata('wrong')): ?>
        <span style="color:red"><?php echo session()->getFlashdata('wrong') ?></span>
    <?php endif ?>

    <form action="/registerAdmin" method="POST">
        <h1>Create Admin Account Here</h1>
        <div class="username">
            <label for="username">username</label>
            <input type="text" name="username" required>
        </div>
        <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="password">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="button">
            <button type="submit">Register</button>
        </div>
    </form>
</body>

</html>