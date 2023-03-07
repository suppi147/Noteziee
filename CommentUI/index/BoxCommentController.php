<?php
define("PACK_HEADER",'<div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header px-4 pt-4">
                            ');
class BoxCommentController{
    public $commentBoxHeader;

    public $commentBoxItem;
    public $commentBoxTailer;

    function __construct(){
        $this->commentBoxHeader=PACK_HEADER;                                 
    }
    function AddPackHeader($checkboxPack){
        $this->commentBoxHeader=PACK_HEADER.$checkboxPack.'<div class="card-actions float-right ">';
    }
    function AddButtons2Pack($adder){
        $this->commentBoxHeader=$this->commentBoxHeader.$adder;
    }

    function FullPack($commentBox,$id){
        $this->commentBoxItem='
                                </div>
                                    </div>
                                    
                                        
                                        <div class="card-body" style="white-space: break-spaces;"><span>
                                    <p id="'.$id.'">';
        $this->commentBoxTailer='</p>
                                    </span>
                                    </div>
                                          </div>
                                                </div>';  
        return $this->commentBoxHeader.$this->commentBoxItem.$commentBox.$this->commentBoxTailer;
    }
}
?>