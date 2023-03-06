<?php
class ModalButton{
    public $modalButtonHeader;
    public $modalIDstarter;
    public $modalIDender;
    public $modalButtonTailer;

    function __construct(){
        $this->modalButtonHeader='<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#';
        $this->modalIDstarter='">
                    Details
                    </button>
                    <!-- Modal -->
                    <div class="modal" id="';
$this->modalIDender='" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="white-space: break-spaces;">
                            <p>';
$this->modalButtonTailer='</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
    }

    function ModalButtonPack($commentShow){
        $randomModalID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
        return $this->modalButtonHeader.$randomModalID.$this->modalIDstarter.$randomModalID.$this->modalIDender.$commentShow.$this->modalButtonTailer;
    }
}
?>