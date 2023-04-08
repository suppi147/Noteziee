<?php
class FilterComment{
    protected $itemFiltering;
    protected $IDFiltering;
    function __construct(){
        $this->itemFiltering="NULL";
        $this->IDFiltering=-1;
    }

    function GetItemfiltering(){
        return $this->itemFiltering;
    }

    function GetIDFiltering(){
        return $this->IDFiltering;
    }

    function FilterComment($commentUnfilter){
        if (strlen(trim($commentUnfilter)) == 0)
            return false;
        
        $commentUnfilter=str_replace("<xmp>","<p>",$commentUnfilter);
        $commentUnfilter=str_replace("</xmp>","</p>",$commentUnfilter);
        $commentUnfilter=str_replace('',"</p>",$commentUnfilter);
        $commentUnfilter= stripslashes($commentUnfilter);
        if (strlen(trim($commentUnfilter)) == 0)
            return false;
        $this->itemFiltering=htmlspecialchars($commentUnfilter, ENT_QUOTES, 'UTF-8');
        return true;
    } 

    function FilterID($IDFiltering){
        $this->IDFiltering=$IDFiltering;
        if (strlen(trim($this->IDFiltering)) != 0){
            if(is_numeric($this->IDFiltering)== true){
                if(strpos($this->IDFiltering,'.')== false){
                    if($this->IDFiltering>0){
                        $this->IDFiltering=(int)$this->IDFiltering;     
                        return true;
                    }
                }
            }
        }
        return false;    
    }
}
?>