<?php
define("PACK_HEADER",'<div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header px-10 pt-4">
                            <div class="card-actions float-right ">
                            ');
class BoxCommentController{
    public $commentBoxHeader;

    public $commentBoxItem;
    public $commentBoxTailer;

    function __construct(){
        $this->commentBoxHeader=PACK_HEADER;                                 
    }
    function AddPackHeader($checkboxPack){
        $this->commentBoxHeader=PACK_HEADER;
    }
    function AddButtons2Pack($adder){
        $this->commentBoxHeader=$this->commentBoxHeader.$adder;
    }

    function FullPack($commentBox,$id){
        $this->commentBoxItem='
                                </div>
                                    </div> 
                                        <div class="card-body" style="padding-left: 3rem;
                                        padding-right: 3rem;
                                        padding-top: 2rem;
                                        padding-bottom: 0.2rem;"><span><p class="p-edit" id="'.$id.'">';
        $this->commentBoxTailer='</p></span>
                                    </div>
                                          </div>
                                                </div>';  
        return $this->commentBoxHeader.$this->commentBoxItem.$commentBox.$this->commentBoxTailer;
    }
}
?>