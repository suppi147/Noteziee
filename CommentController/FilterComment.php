<?php
class FilterComment{
    protected $itemFiltering;
    function __construct(){
        $this->itemFiltering="NULL";
    }

    function GetItemfiltering(){
        return $this->itemFiltering;
    }

    function FilterComment($commentUnfilter){
        if (strlen(trim($commentUnfilter)) == 0)
            return false;
        
        $this->itemFiltering=htmlspecialchars($commentUnfilter, ENT_QUOTES, 'UTF-8');
        return true;
    } 

    function FilterID($IDFiltering){
        $this->itemFiltering=$IDFiltering;
        if (strlen(trim($this->itemFiltering)) != 0){
            if(is_numeric($this->itemFiltering)== true){
                if(strpos($this->itemFiltering,'.')== false){
                    if($this->itemFiltering>0){
                        $this->itemFiltering=(int)$this->itemFiltering;     
                        return true;
                    }
                }
            }
        }
        return false;    
    }
}
?>