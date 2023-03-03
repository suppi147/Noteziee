<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Noteziee ;3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="http://localhost/Noteziee/CommentUI/css/index.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://localhost/Noteziee/CommentUI/js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <h1 class="h1-edit">Noteziee</h1>
            <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID" onclick="ReceiveEnter();">
                <div class="form-group">
                 <textarea name="commentContent" id="commentContent" class="form-control" placeholder="Enter Comment" rows="10" cols="60"></textarea>
                </div>
                <div class="form-group">
                 <input type="hidden" name="control_flag" id="control_flag" value="post" />
                 <div class="col text-center"><button id="myBtn" type="submit" class="btn btn-primary" >Submit</button>
                 
                </div> 
                </div>
            </form>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/FetchComment.php';
include __DIR__.'/../../CommentController/DeleteComment.php';
include __DIR__.'/../../CommentController/EditComment.php';
require_once("CommentBox.php");
require_once("DeleteButton.php");
require_once("EditButton.php");
require_once("ModalButton.php");

define("MAX_COMMENTLINE",6);
    $showerPack= new FetchComment();
    $commentBoxTrigger= new CommentBox();
    $deleteButtonTrigger=new DeleteButton();
    $editButtonTrigger=new EditButton();
    $modalButtonTrigger=new ModalButton();

    foreach( $showerPack->Fetch() as $commentID=> $commentShow){
        $commentBoxTrigger->AddDeleteButton2Pack($deleteButtonTrigger->DeleteButtonPack($commentID));
        $commentBoxTrigger->AddEditButton2Pack($editButtonTrigger->EditButtonPack($commentShow,$commentID));
        if(substr_count($commentShow,"\n")>MAX_COMMENTLINE)
            $commentBoxTrigger->AddModalButton2Pack($modalButtonTrigger->ModalButtonPack($commentShow));       
        echo $commentBoxTrigger->FullPack($commentShow);
    }

$editPack = new EditComment();

echo '</div>
        </div>
            </body>
                </html>';
?>