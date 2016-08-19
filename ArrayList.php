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
            $txt .= '<span style="color: red">' . $item . '</span>';
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
        $keptItems = [];

        foreach($this->items as $key => $item){
            if($key !== $index){
                $keptItems[] = $item;
            }
            else{
                $removedValue = $item;
            }
        }

        $this->items = $keptItems;

        return $removedValue;
    }

    public function removeAll($value){
        $nbRemoved = 0;
        $keptItems = [];

        foreach($this->items as $item){
            if($item !== $value){
                $keptItems[] = $item;
            }
            else{
                $nbRemoved++;
            }
        }

        $this->items = $keptItems;

        return $nbRemoved;
    }

    public function get($index){
        return isset($this->items[$index]) ? $this->items[$index] : null;
    }

    public function count(){
        return count($this->items);
    }

    public function sizeof(){
        return $this->count();
    }

    public function combine(ArrayList $list){
        foreach($list->items as $item){
            $this->add($item);
        }

        // for($ii = 0; $ii < $list->count(); $ii++){
        //     $this->add($list->get($ii));
        // }
    }

    public function chunk($size){
        $chunks = [];
        $chunk = [];


        foreach($this->items as $item){
            $chunk[] = $item;
            if(count($chunk) === $size){
                $chunks[] = $chunk;
                $chunk = [];
            }
        }

        if(count($chunk) !== 0){
            $chunks[] = $chunk;
        }


        return $chunks;

    }

    public function fill($size, $value, $offset = 0){
        if($offset < 0 || $offset > $this->count()){
            $offset = $this->count();
        }

        for($ii = $offset; $ii < $offset + $size; $ii++){
            $this->items[$ii] = $value;
        }

    }

    public function isEmpty(){
        return $this->count() === 0;
        // return count($this->items) === 0;
    }

    public function pop(){
        return $this->remove($this->count() - 1);
    }

    public function shift(){
        return $this->remove(0);
    }
    public function getItems(){
        return $this->items;
    }

    public function setItems($items){
        $this->items = $items;
    }

    public function unique(){
        // $uniqueList = new ArrayList();
        // foreach($this->items as $item){
        //     if(!$uniqueList->includes($item)){
        //         $uniqueList->add($item);
        //     }
        // }
        // $this->items = $uniqueList->getItems();


        $uniqueList = [];

        foreach($this->items as $item){
            $exists = false;
            foreach($uniqueList as $keptItem){
                if($item === $keptItem){
                    $exists = true;
                    break;
                }
            }
            if(!$exists){
                $uniqueList[] = $item;
            }
        }
        $this->items = $uniqueList;
    }

    public function equals(ArrayList $list){
        $equals = true;
        foreach($this->items as $key => $item){
            if($list->get($key) !== $item){
                $equals = false;
                break;
            }
        }

        return $equals;

        // return $this->items === $list->getItems();
    }

    public function includes($value){
        $found = false;
        foreach($this->items as $item){
            if($item === $value){
                $found = true;
                break;
            }
        }
        return $found;
    }
}