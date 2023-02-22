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
                 <div class="col text-center"><input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
                </div> 
                </div>
            </form>
            <div class="row">
<?php
include __DIR__.'/../../CommentController/ShowComment.php';

$showerPack= new ShowComment();
foreach( $showerPack->Show() as $shower){
  echo $shower;
}
echo '</div>
</div>
</body>
</html>
';
?>