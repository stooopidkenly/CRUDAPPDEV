<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>List of Users</h1>

    <table>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo esc($user['id']) ?></td>
                <td><?php echo esc($user['firstname']) ?></td>
                <td><?php echo esc($user['middlename']) ?></td>
                <td><?php echo esc($user['lastname']) ?></td>
                <td><?php echo esc($user['email']) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>