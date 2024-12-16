<?php
require SERVICES."RunService.php";
require API."handleApiRequest.php";
handleApiRequest([RunService::class, "create"], [RunService::class, "read"], function()
{
    $id = basename($_SERVER["REQUEST_URI"]);
    RunService::delete(["RunID" => $id]);
})
?>