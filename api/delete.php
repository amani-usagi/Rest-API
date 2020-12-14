<?php
    header('Access_Control_Allow_Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access_Control_Allow-Headers: Access_Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    //initialising api
    include_once('../core/initialise.php');

    //instantiate the post class
    $post = new Post($db);

    //get posted data
    $data =json_decode(file_get_contents("php://input"));

    $post->id = $data->id;

    //creating post
    if ($post->delete()) {
        echo json_encode(
            array('message' => 'Post Deleted :-)')
        );
    } else{
        echo json_encode(
            array('message' => 'Post Delete Failed :-(')
        );
    }
?>