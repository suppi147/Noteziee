<?php
require_once "CommentController.php";
require_once "FetchComment.php";
class ShowComment extends CommentController
{
    protected $commentPieHtmlpack;
    protected $htmlEnder;
    protected $htmlStarter;
    protected $reverseCommentPie;

    function __construct()
    {
        $commentPieHtmlpack = [];
        $reverseCommentPie = [];
        parent::__construct();
    }

    function Show()
    {
        $fetcherPack = new FetchComment();
        $reverseComentPie = new ArrayIterator(
            array_reverse($fetcherPack->Fetch())
        );

        foreach ($reverseComentPie as $fetcher) {
            $commentPieHtmlpack[] = $fetcher;
        }
        return $commentPieHtmlpack;
    }
}
?>
