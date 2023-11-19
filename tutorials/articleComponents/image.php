<div class="flex justify-between mt-32">
    <div class="w-10/12">
        <h2 class="text-4xl font-medium pb-2 mb-3 border-b-2
        <?php
        if ($lang == "html") { echo "border-red-500"; }
        else if ($lang == "css") { echo "border-sky-500"; }
        else if ($lang == "js") { echo "border-yellow-500"; }
        else if ($lang == "php") { echo "border-indigo-500"; }
        else if ($lang == "sql") { echo "border-orange-500"; }
        ?>
        "><?php echo $image["title"]; ?></h2>

        <?php
            foreach ($image["items"] as $line) { echo "<p class=\"text-xl font-light\">{$line}</p>"; }
        ?>
    </div>
    <img src="../img/<?php echo $image["src"]; ?>" alt="<?php echo $image["alt"]; ?>" class="w-1/12 h-fit my-auto">
</div>