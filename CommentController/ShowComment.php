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
            $htmlStarter='<div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-more-horizontal align-middle"
                                >
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p>';
            $htmlEnder='</p>
            </div>
        </div>
    </div>';

            $reverseComentPie= new ArrayIterator(array_reverse($fetcherPack->Fetch()));

            
            foreach($reverseComentPie as $fetcher)
            {
                  $commentPieHtmlpack[]=$htmlStarter.$fetcher.$htmlEnder;
            }
            return $commentPieHtmlpack;
      }
}
?>