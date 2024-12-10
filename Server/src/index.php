<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slutprojekt</title>
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