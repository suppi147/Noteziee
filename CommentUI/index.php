<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Noteziee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <br><h2 align="center">Noteziee</h2></br>
  <form action="http://localhost/Noteziee/MainController/MainRail.php" method="POST" id="commentID">
    <div class="form-group">
     <textarea name="commentContent" id="commentContent" class="form-control" placeholder="Enter Comment" rows="6" cols="40"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="control_flag" id="control_flag" value="post" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
<?php
include __DIR__.'/../CommentController/ShowComment.php';

$showerPack= new ShowComment();

foreach( $showerPack->Show() as $shower){
  echo $shower;
}
echo '</body>';
?>