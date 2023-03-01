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
            <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID">
                <div class="form-group">
                 <textarea name="commentContent" id="commentContent" class="form-control" placeholder="Enter Comment" rows="10" cols="60"></textarea>
                </div>
                <div class="form-group">
                 <input type="hidden" name="control_flag" id="control_flag" value="post" />
                 <div class="col text-center"><input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg" value="Submit" />
                </div> 
                </div>
            </form>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/FetchComment.php';
include __DIR__.'/../../CommentController/DeleteComment.php';

define("MAX_COMMENTLINE",6);
$CommentBoxStarter='<div class="col-12 col-md-6 col-lg-4">
<div class="card">
    <div class="card-header px-4 pt-4">
        <div class="card-actions float-right">
            <div class="dropdown show">

                    <button type="button" onclick="deleteID(';
$DeleteButtonTrigger=');" class="btn btn-warning ">Delete</button>                     
               ';
$modalButtonStarter='
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#';
$ModalIDstarter='">
                    Details
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="';
$ModalIDender='" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="white-space: break-spaces;">
                            <p>';
$ModalButtonCommenter='</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
$ModalButtonEnder='    
            </div>
        </div>
    </div>
    <div class="card-body px-5 pt-1" style="white-space: break-spaces;">
        <p>';
$CommentBoxEnder='</p>
</div>
</div>
</div>';
$showerPack= new FetchComment();

    foreach( $showerPack->Fetch() as $commentID=> $commentShow){
        $randomModalID=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);
        if(substr_count($commentShow,"\n")>MAX_COMMENTLINE){
            $startPack = $CommentBoxStarter.$commentID.$DeleteButtonTrigger.$modalButtonStarter.$randomModalID.$ModalIDstarter.$randomModalID.$ModalIDender.$commentShow;
            $endPack = $ModalButtonCommenter.$ModalButtonEnder.$commentShow.$CommentBoxEnder;
        }
        else{
            $startPack = $CommentBoxStarter.$commentID.$DeleteButtonTrigger;
            $endPack = $ModalButtonEnder.$commentShow.$CommentBoxEnder;
        }
        
            echo $startPack.$endPack;
    }
echo '</div>
</div>
</body>
</html>
';
?>