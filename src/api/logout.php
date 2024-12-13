<?php
require SERVICES."AuthService.php";
require API."handleApiRequest.php";
handleApiRequest(null, [AuthService::class, "logout"])
?>