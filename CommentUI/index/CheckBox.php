<?php

class CheckBox{
    public $checkbox;

    function __construct(){
        $this->checkbox="NULL";
    }

    function CheckBoxPack($checkID){
        $this->checkbox='
                            <input class="big-checkbox" name="check[]" type="checkbox" value="'.$checkID.'" id="'.$checkID.'" onclick="ChecklistArray('.$checkID.');">';
        return $this->checkbox; 
    }
}
?>