<?php
    header('Access_Control_Allow_Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access_Control_Allow-Headers: Access_Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    //initialising api
    include_once('../core/initialise.php');

    //instantiate the post class
    $post = new Post($db);

    //get posted data
    $data =json_decode(file_get_contents("php://input"));

    $post->id = $data->id;
    $post->student_name = $data->student_name;
    $post->student_no = $data->student_no;
    $post->email = $data->email;
    $post->phone = $data->phone;
    $post->course_id = $data->course_id;

    //creating post
    if ($post->update()) {
        echo json_encode(
            array('message' => 'Post Updated :-)')
        );
    } else{
        echo json_encode(
            array('message' => 'Post Update Failed :-(')
        );
    }
?>