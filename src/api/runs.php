<?php
require SERVICES."RunService.php";

handleApiRequest(
    function () 
    {
        return RunService::create();
    },
    function () 
    {
        return RunService::get();
    }
)

?>