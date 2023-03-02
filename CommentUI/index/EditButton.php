<?php
require_once("ModalButton.php");
class EditButton extends ModalButton{
    public $editButtonHeader;
    public $editButtonTailer;

    function __construct(){
        parent::__construct();
        $this->modalButtonHeader='<button type="button" class="btn btn-success" data-toggle="modal" data-target="#';;
        $this->modalIDstarter='">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="';
        $this->modalIDender='" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID">
                        <div class="form-group">
                        <textarea type="text" name="commentContent" id="commentContent" rows="25" cols="84">';
        
    }

    function EditButtonPack($commentShow,$commentID){
        $this->modalButtonTailer='</textarea>
                                    </div>
                                    <div class="modal-footer">
                                    
                                        <div class="form-group">
                                    <input type="hidden" name="control_flag" id="control_flag" value="edit" />
                                        <input type="hidden" name="id" id="id" value="'.$commentID.'" />
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>';
        return $this->ModalButtonPack($commentShow);
    }
}
?>