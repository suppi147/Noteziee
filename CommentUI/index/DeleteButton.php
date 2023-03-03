<?php
class DeleteButton{
    public $DeleteButtonHeader;
    public $DeleteButtonTailer;

    public $comfirmModalHeader;
    public $comfirmModalTailer;

    public $modalIDstarter;

    public $modalIDender;
    function __construct(){
        $this->comfirmModalHeader='<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#';
        $this->modalIDstarter='">
        Delete
        </button>
        <!-- Modal -->
        <div class="modal fade" id="';
        $this->modalIDender='" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Choose with caution</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p> Are you sure you want to permanently delete this note?</p>
            </div>
            <div class="modal-footer">';
        $this->DeleteButtonHeader='<button type="button" onclick="deleteID(';
        $this->DeleteButtonTailer=');" class="btn btn-warning ">Confirm</button>';
        $this->comfirmModalTailer='<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                        </div>
                                            </div>
                                                </div>';
    }

    function DeleteButtonPack($deleteID){
        $randomModalID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
        return $this->comfirmModalHeader.$randomModalID.$this->modalIDstarter.$randomModalID.$this->modalIDender.$this->DeleteButtonHeader.$deleteID.$this->DeleteButtonTailer.$this->comfirmModalTailer;
    }
}
?>