<?php

class ArrayList{
    private $items;

    public function __construct($items = []){
        $this->items = [];
        if(is_array($items)){
            $this->items = $items;
        }
    }

    public function debug(){
        $txt = "[ ";
        $lastIndex = count($this->items) - 1;
        foreach($this->items as $key => $item){            
            $txt .= '<span style="color: red">' .$item . '</span>';
            if($key !== $lastIndex){
                $txt .= ", ";
            }
        }
        $txt .= " ] <br/>";
        echo $txt;
    }

    public function add($item){
        $this->items[] = $item;
    }

    public function remove($index){
        $removedValue = null;
        $keepedItems = [];

        foreach($this->items as $key => $item){
            if($key !== $index){
                $keepedItems[] = $item;
            }
            else{
                $removedValue = $item;
            }
        }

        $this->items = $keepedItems;

        return $removedValue;
    }








    public function getItems(){
        return $this->items;
    }

    public function setItems($items){
        $this->items = $items;
    }
}