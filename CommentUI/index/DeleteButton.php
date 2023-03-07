<?php
class DeleteButton{
    public $DeleteButton;

    public $comfirmModalHeader;
    public $comfirmModalTailer;

    function __construct(){
        
        
        
    }

    function DeleteButtonPack($deleteID){

      $randomModalID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
      $this->comfirmModalHeader='<button type="button" class="btn btn-warning" data-toggle="modal" onclick="ToggleOn1('.$deleteID.');ChecklistArray('.$deleteID.');" data-target="#'.$randomModalID.'">
        Delete
        </button>
        <!-- Modal -->
        <div class="modal" id="'.$randomModalID.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Choose with caution</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="UntoggleOn1('.$deleteID.');">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> Are you sure you want to permanently delete this note?</p>
            </div>
            <div class="modal-footer">';
            
        $this->DeleteButton='<button type="button" onclick="deleteID('.$deleteID.');" data-dismiss="modal" class="btn btn-warning ">Confirm</button>';
     
      
      $this->comfirmModalTailer='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="UntoggleOn1('.$deleteID.');">Close</button>
                                    </div>
                                        </div>
                                            </div>
                                                </div>';
        
        return $this->comfirmModalHeader.$this->DeleteButton.$this->comfirmModalTailer;
    }
}
?>