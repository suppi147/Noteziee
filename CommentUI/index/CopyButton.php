<?php
class CopyButton{
    public $copyButton;

    function __construct(){
        $this->copyButton="NULL";
    }
    function CopyButtonPack($checkID,$commentBox){
        $this->copyButton= '<xmp id="c'.$checkID.'" hidden>'.htmlspecialchars_decode($commentBox).'</xmp><button id="copy" class="btn" onclick="CopyToClipboard(\'#c'.$checkID.'\');tempAlert(\'Copy to clipboard!!!\',1000)">Copy</button>
        
        ';
        return $this->copyButton;
    }   
}
?>