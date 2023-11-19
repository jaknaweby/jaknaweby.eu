<div class="mt-10">
    <h3 class="text-3xl mb-3 w-fit"><?php echo $list["title"]; ?></h3>
    
    <?php
        echo "<ul>";
        foreach ($list["items"] as $line) { echo "<li class=\"marker-dash text-xl font-light\">{$line}</li>"; }
        echo "</ul>";
    ?>
</div>