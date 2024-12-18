<?php
require SERVICES."CommentService.php";
require API."handleApiRequest.php";
handleApiRequest([CommentService::class, "create"], [CommentService::class, "read"])
?>