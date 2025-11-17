<?php

    if(!isset($_SESSION['_csrf_token']) || !isset($_SESSION['user']) || ($_POST['_csrf_token'] !== $_SESSION['_csrf_token'])){
        
        $id=filter_input(INPUT_POST, 'id');
        $book=query($db, "SELECT * FROM books WHERE id=:id",[':id'=>$id]);
        if($book){
            delete($db,'books', ['id'=>$id]);
        }
        header('location: /books');
    }else{
        header('location:/');

    }