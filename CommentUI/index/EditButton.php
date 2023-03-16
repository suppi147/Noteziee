<?php
require_once("ModalButton.php");
class EditButton extends ModalButton{
    public $editButtonHeader;
    public $editButtonTailer;

    public $textareaID;
    public $editbuttonID;

    function __construct(){
        parent::__construct();
        
        $this->modalButtonHeader='
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#';
        $this->modalIDstarter='">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal" id="';
        
        
    }

    function EditButtonPack($commentShow,$commentID){
        $this->textareaID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
        $this->editbuttonID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
        $this->modalIDender='" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID">
                        <div class="form-group">
                        <textarea type="text" name="commentContent" id="'.$this->textareaID.'" rows="25" cols="77">';
        $this->modalButtonTailer='</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                        <input type="hidden" name="control_flag" id="control_flag" value="edit" />
                                        <input type="hidden" name="id" id="id" value="'.$commentID.'" onclick="Copy('.$commentID.');"/>
                                        <button id="'.$this->editbuttonID.'" type="submit" class="btn btn-primary" >Change</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <script>
                                        var input = document.getElementById("'.$this->textareaID.'");
                                        input.addEventListener("keypress", function(event) {
                                        if (event.key === "Enter" && !event.shiftKey) {
                                            event.preventDefault();
                                            document.getElementById("'.$this->editbuttonID.'").click();
                                        }
                                        });
                                        </script>
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