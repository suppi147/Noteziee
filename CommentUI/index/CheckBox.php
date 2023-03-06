<?php

class CheckBox{
    public $checkbox;

    function __construct(){
        $this->checkbox="NULL";
    }

    function CheckBoxPack($checkID){
        $this->checkbox='<form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="'.$checkID.'">
                            <input class="big-checkbox" name="check[]" type="checkbox" value="'.$checkID.'" id="'.$checkID.'" onclick="ChecklistArray('.$checkID.');">
                        </form>';
        return $this->checkbox; 
    }
}
?>