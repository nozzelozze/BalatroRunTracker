<?php
require SERVICES."CommentService.php";
require API."handleApiRequest.php";
handleApiRequest([CommentService::class, "create"], [CommentService::class, "read"], null, 
function($data)
{
    $result = CommentService::read($data);
    if (!$result["success"])
    {
        return "Something went wrong...";
    }
    $comment = $result["result"];
    include COMPONENTS . "comment.php";
})
?>