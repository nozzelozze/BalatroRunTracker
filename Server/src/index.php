<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/favicon-16x16.png">
    <link rel="manifest" href="/public/site.webmanifest">
    <title>Balatro Runs</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>

<body>
    <?php

    require "./Services/DBService.php";
    $result = DBService::getInstance()->getUsers();

    foreach ($result as $user) {
        include "./components/Usercard.php";
    }

    ?>
</body>

</html>