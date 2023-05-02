<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world</h1>

    <?php

    use App\Classes\Database\DB;
    use App\Classes\Database\MysqlConnection;

    $connection = new MysqlConnection('mysql', 'school', 'internal', 'secret');

    dd(DB::query()->raw('SELECT * FROM users'));

    echo "<br>Connected successfully";

    ?>
</body>
</html>