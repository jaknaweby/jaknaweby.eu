<div class="mt-10">
    <h3 class="text-3xl mb-3 pb-1 w-fit border-b-2
    <?php
    if ($lang == "html") { echo "border-red-500"; }
    else if ($lang == "css") { echo "border-sky-500"; }
    else if ($lang == "js") { echo "border-yellow-500"; }
    else if ($lang == "php") { echo "border-indigo-500"; }
    else if ($lang == "sql") { echo "border-orange-500"; }
    ?>
    ">
    <?php echo $subtitle["title"]; ?>
    </h3>
    
    <?php
        foreach ($subtitle["items"] as $line) { echo "<p class=\"marker-dash text-xl font-light\">{$line}</p>"; }
    ?>
</div>