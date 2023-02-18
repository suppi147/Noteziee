<?php
require_once("CommentController.php");
require_once("FetchComment.php");
class ShowComment extends CommentController{
      protected $commentPieHtmlpack;
      protected $htmlEnder;
      protected $htmlStarter;
      protected $reverseCommentPie;

      function __construct(){
            $commentPieHtmlpack=array();
            $reverseCommentPie=array();
            $htmlStarter="NULL";
            $htmlEnder="NULL";
            parent::__construct();
      }

      function Show(){
            $fetcherPack=new FetchComment();
            $htmlStarter='<div class="Container"><div class="panel panel-default"><div class="panel-body">';
            $htmlEnder='</div></div></div>';

            $reverseComentPie= new ArrayIterator(array_reverse($fetcherPack->Fetch()));

            
            foreach($reverseComentPie as $fetcher)
            {
                  $commentPieHtmlpack[]=$htmlStarter.$fetcher.$htmlEnder;
            }
            return $commentPieHtmlpack;
      }
}
?>