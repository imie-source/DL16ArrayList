<?php

require_once("ArrayList.php");

$list = new ArrayList([1, 2, 5, 9]);

$list->add(43);
$list->add(13);

$list->debug();

$removedElement = $list->remove(4);

$list->debug();

echo "L'élément supprimé est : " . $removedElement . "<br/>";

$list2 = new ArrayList(["Bob", "John", "Alice", "Bob", "Gabriel"]);

$list2->debug();

$nbRemoved = $list2->removeAll("Bob");

echo "$nbRemoved éléments supprimés";

$list2->debug();

echo $list2->get(45);

$list->combine($list2);

$list->debug();

// var_dump($list->chunk(3));

$list->fill(2, "PLOP", 3);

$list->debug();

$list3 = new ArrayList([1, 2]);
$list3->debug();
$list3->fill(5, 0, 1);
$list3->debug();


$list4 = new ArrayList([1,2,3,4,5]);
$list5 = new ArrayList([1,2,3,4,5]);

var_dump($list4->equals($list5));

$list6 = new ArrayList([1,2,3,4,5,6,78,9,1,2,4,5,6,3,4,5,8,7,2,2,2,98]);

$list6->unique();
$list6->debug();



