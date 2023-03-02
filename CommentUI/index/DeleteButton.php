<?php
class DeleteButton{
    public $DeleteButtonHeader;
    public $DeleteButtonTailer;

    function __construct(){
        $this->DeleteButtonHeader='<button type="button" onclick="deleteID(';
        $this->DeleteButtonTailer=');" class="btn btn-warning ">Delete</button>';
    }

    function DeleteButtonPack($deleteID){
        return $this->DeleteButtonHeader.$deleteID.$this->DeleteButtonTailer;
    }
}
?>