<?php
require SERVICES . "RunService.php";
$runs = RunService::read();
?>

<form id="submit-form">
  <label for="Score">Score</label>
  <input type="number" name="Score" id="Score" />

  <button type="submit">Submit Run</button>
</form>

<div class="runs">
    <?php
    foreach ($runs as $run)
    {
        include COMPONENTS."runCard.php";
    }
    ?>
</div>