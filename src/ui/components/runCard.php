<a class="runs__card" href="/run/<?= $run["RunID"] ?>" id="run-<?= $run["RunID"] ?>">
    <p><?php echo $run["Username"]; ?></p>
    <p><?= $run["Score"] ?></p>
    <p><?= $run["SubmittedAt"] ?></p>
    <button onclick="event.preventDefault(); event.stopPropagation(); onRemoveRun(<?= $run['RunID'] ?>)">Remove</button>
</a>