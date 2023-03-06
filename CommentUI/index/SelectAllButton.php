<?php
class SelectAllButton{
    public $selectAllButton;

    function __construct(){
        $this->selectAllButton="NULL";
    }

    function SelectAllButtonPack(){
        $this->selectAllButton='
        <input type="submit" onclick="SelectAll(); " id="checkall" class="btn btn-info" value="Select all"/>
        ';
        return $this->selectAllButton;
    }
}
?>