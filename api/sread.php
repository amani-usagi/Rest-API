<?php
    header('Access_Control_Allow_Origin: *');
    header('Content-Type: application/json');

    //initialising api
    include_once('../core/initialise.php');

    //instantiate the post class
    $post = new Post($db);

    $post->id = isset($_GET['id']) ? $_GET['id'] : die();
    $post->read_single();

    $post_arr = array(
        'id' => $id,
        'student_name' => $post->student_name,
        'student_no' => $post->student_no,
        'email' => $post->email,
        'phone' => $post->phone,
        'course_id' => $post->course_id,
        'course_name' => $post->course_name,
    );
    //json
    print_r(json_encode($post_arr));
?>