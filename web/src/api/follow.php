<?php
require SERVICES."FollowService.php";
require API."handleApiRequest.php";
handleApiRequest([FollowService::class, "create"], null, [FollowService::class, "delete"], null)
?>