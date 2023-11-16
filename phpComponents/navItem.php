<?php
echo "<li class='w-full py-0.5 pl-3 ";

if ($title === $itemTitle) {

    if ($lang === "html") {
        echo "bg-red-600";
    } else if ($lang === "css") {
        echo "bg-sky-600";
    } else if ($lang === "js") {
        echo "bg-amber-500";
    } else if ($lang === "php") {
        echo "bg-indigo-600";
    } else if ($lang === "sql") {
        echo "bg-orange-600";
    }

    echo " text-white'><a href=''>";
} else {
    echo "hover:bg-gray-200'><a href='#'>";
}

echo "{$itemTitle}</a></li>";
?>
