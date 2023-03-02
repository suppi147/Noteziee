<?php
define("PACK_HEADER",'<div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header px-4 pt-4">
                                <div class="card-actions float-right">');
class CommentBox{
    public $commentBoxHeader;

    public $commentBoxItem;
    public $commentBoxTailer;

    function __construct(){
        $this->commentBoxHeader=PACK_HEADER;
        $this->commentBoxItem='</div>
                                    </div>
                                        <div class="card-body px-5 pt-1" style="white-space: break-spaces;">
                                    <p>';
        $this->commentBoxTailer='</p>
                                    </div>
                                          </div>
                                                </div>';                                    
    }
    function AddDeleteButton2Pack($deleteButtonPack){
        $this->commentBoxHeader=PACK_HEADER.$deleteButtonPack;
    }
    function AddEditButton2Pack($editButtonPack){
        $this->commentBoxHeader=$this->commentBoxHeader.$editButtonPack;
    }

    function AddModalButton2Pack($modalButtonPack){
        $this->commentBoxHeader=$this->commentBoxHeader.$modalButtonPack;
    }
    function FullPack($commentBox){
        return $this->commentBoxHeader.$this->commentBoxItem.$commentBox.$this->commentBoxTailer;
    }
}
?>