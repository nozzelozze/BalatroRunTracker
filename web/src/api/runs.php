<?php
require SERVICES."RunService.php";
require API."handleApiRequest.php";
handleApiRequest([RunService::class, "create"], [RunService::class, "read"], function()
{
    $id = basename($_SERVER["REQUEST_URI"]);
    RunService::delete(["RunID" => $id]);
}, function($data)
{
    $result = RunService::read($data);
    if (!$result["success"])
    {
        return "Something went wrong...";
    }
    foreach ($result["result"] as $run)
    {
        include COMPONENTS . "runCard.php";
    }
})
?>