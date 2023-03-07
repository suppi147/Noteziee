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
            <form action="http://localhost/Noteziee/MainController/MainRail.php" name="submitForm" method="POST" id="commentID" onclick="ReceiveEnter();">
                <div class="form-group">
                 <textarea name="commentContent" id="commentContent" class="form-control" placeholder="Enter Something :3" rows="10" cols="60"></textarea>
                </div>
                <div class="form-group">
                    
                 <input type="hidden" name="control_flag" id="control_flag" value="post" />
                 <div class="col text-center"><button id="myBtn" type="submit" class="btn btn-primary btn-lg" >Submit</button>
                 
                </div> 
                </div>
            </form>
            <div class="col text-center" style="padding-bottom:15px;">
            </div>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/FetchComment.php';
include __DIR__.'/../../CommentController/DeleteComment.php';
include __DIR__.'/../../CommentController/EditComment.php';
require_once("BoxCommentController.php");
require_once("DeleteButton.php");
require_once("EditButton.php");
require_once("ModalButton.php");
require_once("CheckBox.php");
require_once("SelectAllButton.php");
require_once("CopyButton.php");
define("MAX_COMMENTLINE",6);
define("MAX_LETTER",435);
    $showerPack= new FetchComment();

    $commentBoxTrigger= new BoxCommentController();
    $deleteButtonTrigger=new DeleteButton();
    $editButtonTrigger=new EditButton();
    $modalButtonTrigger=new ModalButton();
    $checkBoxTrigger=new CheckBox();
    $selectAllButtonTrigger=new SelectAllButton();
    $copyButtonTrigger=new CopyButton();

    foreach( $showerPack->Fetch() as $commentID=> $commentShow){
        $commentBoxTrigger->AddPackHeader($checkBoxTrigger->CheckBoxPack($commentID));
        $commentBoxTrigger->AddButtons2Pack($selectAllButtonTrigger->SelectAllButtonPack());
        $commentBoxTrigger->AddButtons2Pack($deleteButtonTrigger->DeleteButtonPack($commentID));
        $commentBoxTrigger->AddButtons2Pack($editButtonTrigger->EditButtonPack($commentShow,$commentID));
        $commentBoxTrigger->AddButtons2Pack($copyButtonTrigger->CopyButtonPack($commentID,$commentShow));
        if(substr_count($commentShow,"\n")>MAX_COMMENTLINE or strlen($commentShow)>MAX_LETTER){
            $commentBoxTrigger->AddButtons2Pack($modalButtonTrigger->ModalButtonPack($commentShow));
            if(substr_count($commentShow,"\n")>MAX_COMMENTLINE ){
                $showMore=explode("\n", $commentShow);
                $commentShow="";
                for ($i=0; $i < MAX_COMMENTLINE; $i++) { 
                    if($i==MAX_COMMENTLINE-1){
                        $commentShow=$commentShow.$showMore[$i]."\n";
                        break;
                    }
                    $commentShow=$commentShow.$showMore[$i]."\n";
                }
                $commentShow=$commentShow.".....";
            }
            if(strlen($commentShow)>MAX_LETTER){
                $commentShow=substr($commentShow,0,MAX_LETTER-100);
                $commentShow=$commentShow.".....";
            }
            
        }
        
        
        echo $commentBoxTrigger->FullPack($commentShow,$commentID);
    }

echo '</div>
        </div>
            </body>
                </html>';
?>