<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <style>
        /* your styles (kept same) */
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
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
            background: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <form action="/editInfo" method="POST">
        <?php if (session()->getFlashdata('existing')): ?>
            <span style="color: red;"><?php echo session()->getFlashdata('existing') ?></span>
        <?php endif ?>
        <h1>Edit Your Info</h1>

        <div class="firstname">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" required
                value="<?= old('firstname', esc($user['firstname'] ?? '')) ?>">
        </div>

        <div class="middlename">
            <label for="middlename">Middlename</label>
            <input type="text" name="middlename" id="middlename"
                value="<?= old('middlename', esc($user['middlename'] ?? '')) ?>">
        </div>

        <div class="lastname">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" required
                value="<?= old('lastname', esc($user['lastname'] ?? '')) ?>">
        </div>

        <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required
                value="<?= old('email', esc($user['email'] ?? '')) ?>">
        </div>

        <div class="password">
            <label for="password">New Password (leave blank to keep current)</label>
            <input type="password" name="password" id="password" placeholder="Enter new password (optional)">
        </div>

        <div class="button">
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>