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
            $htmlStarter='<p>';
            $htmlEnder='</p>';

            $reverseComentPie= new ArrayIterator(array_reverse($fetcherPack->Fetch()));

            
            foreach($reverseComentPie as $fetcher)
            {
                  $commentPieHtmlpack[]=$htmlStarter.$fetcher.$htmlEnder;
            }
            return $commentPieHtmlpack;
      }
}
?>