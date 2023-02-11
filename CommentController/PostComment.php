<?php
require_once("CommentController.php");
class PostComment extends CommentController{
    protected $commentContent;
    function __construct(){
        parent::__construct();
    }

    function Filter(){
        $this->commentContent = filter_var($this->commentContent, FILTER_SANITIZE_STRING);
    } 

    function Post(){
        parent:$this->Connect2DB();

        $this->commentContent="sssssxzcxzs<h1>";//$_POST["comment_content"];

        $this->Filter();
        echo $this->commentContent;
    }
}

$s= new PostComment;
$s->Post();
?>