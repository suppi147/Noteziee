<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>project cards - Bootdey.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="http://localhost/Noteziee/CommentUI/css/index.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://localhost/Noteziee/CommentUI/js/index.js"></script>
    </head>
    <body>
        <div class="container p-0">
            <h1 class="h1-edit">Noteziee</h1>
            <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID">
                <div class="form-group">
                 <textarea name="commentContent" id="commentContent" class="form-control" placeholder="Enter Comment" rows="6" cols="40"></textarea>
                </div>
                <div class="form-group">
                 <input type="hidden" name="control_flag" id="control_flag" value="post" />
                 <div class="col text-center"><input type="submit" name="submit" id="submit" class="btn btn-primary " value="Submit" />
                </div> 
                </div>
            </form>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/FetchComment.php';
include __DIR__.'/../../CommentController/DeleteComment.php';
$htmlStarter1='<div class="col-12 col-md-6 col-lg-3">
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
                    <button type="button" onclick="deleteID(';
                    
$htmlStarter2=');" class="btn btn-primary col text-center"">Delete</button>                     
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
$showerPack= new FetchComment();
    $showerPack->Fetch();
    foreach( $showerPack->Fetch() as $key=> $shower){
        echo $htmlStarter1.$key.$htmlStarter2.$shower.$htmlEnder;
    }
$deleteTest= new DeleteComment();
//$deleteTest->Delete(113);
echo '</div>
</div>
</body>
</html>
';
?>