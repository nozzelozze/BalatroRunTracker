<?php
require SERVICES."RunService.php";
require API."handleApiRequest.php";
handleApiRequest([RunService::class, "create"], [RunService::class, "read"])
?>