<?php

require_once("ArrayList.php");

$list = new ArrayList([1, 2, 5, 9]);

$list->add(43);
$list->add(13);

$list->debug();

$removedElement = $list->remove(4);

$list->debug();

echo "L'élément supprimé est : " . $removedElement . "<br/>";