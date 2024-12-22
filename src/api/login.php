<?php
require SERVICES."AuthService.php";
require API."handleApiRequest.php";
handleApiRequest([AuthService::class, "login"])
?>