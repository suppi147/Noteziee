<?php
class CopyButton{
    public $copyButton;

    function __construct(){
        $this->copyButton="NULL";
    }
    function CopyButtonPack($checkID,$commentBox){
        $this->copyButton= '<textarea id="c'.$checkID.'" hidden>'.$commentBox.'</textarea><button class="btn btn-success" onclick="CopyToClipboard(\'#c'.$checkID.'\');tempAlert(\'Copy to clipboard!!!\',1000)">Copy</button>
        
        ';
        return $this->copyButton;
    }   
}
?>