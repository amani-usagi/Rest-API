<?php
    header('Access_Control_Allow_Origin: *');
    header('Content-Type: application/json');

    //initialising api
    include_once('../core/initialise.php');

    //instantiate the post class
    $post = new Post($db);

    //query post
    $result = $post->read();
    $num = $result->rowCount();
    
    if($num > 0 ){
        $post_arr = array();
        $post_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $post_item = array(
                'id' => $id,
                'student_name' => $student_name,
                'student_no' => $student_no,
                'email' => $email,
                'phone' => $phone,
                'course_id' => $course_id,
                'course_name' => $course_name
            ); 
            array_push($post_arr['data'], $post_item);
        }

        //converting to json and output
        echo json_encode($post_arr);
    } else{
        echo json_encode(array('message' => 'No results found. :-('));
    }
?>