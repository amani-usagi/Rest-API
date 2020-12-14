<?php
    class Post{
        //database
        private $conn;
        private $table = 'students';

        //post properties
        public $id;
        public $student_name;
        public $student_no;
        public $email;
        public $phone;
        public $course_id;
        public $course_name;
        public $created;

        //constructor for db connection
        public function __construct($db){
            $this->conn = $db;
        }

        //geting post form database
        public function read(){
            $query = 'SELECT
                c.name as course_name,
                p.id,
                p.student_name,
                p.student_no,
                p.email,
                p.phone,
                p.course_id,
                p.created
                    FROM 
                    ' .$this->table . ' p 
                    LEFT JOIN 
                        course c ON p.course_id = c.id
                        ORDER BY p.created DESC'; 

                //prepared statement
                $stmt = $this->conn->prepare($query);

                //execute querry
                $stmt->execute();

                return $stmt;
        }

        //read single post based on input details 
        public function read_single(){
            $query = 'SELECT
                c.name as course_name,
                p.id,
                p.student_name,
                p.student_no,
                p.email,
                p.phone,
                p.course_id,
                p.created
                    FROM 
                    ' .$this->table . ' p 
                    LEFT JOIN 
                        course c ON p.course_id = c.id
                        WHERE p.id = ? LIMIT 1 '; //limiting the query to one result

            //prepared statement
            $stmt = $this->conn->prepare($query);
            //binding the parameter
            $stmt->bindParam(1, $this->id);
            //executing query
            $stmt->execute();
             
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->student_name = $row['student_name'];
            $this->student_no = $row['student_no'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->course_id = $row['course_id'];
        }
        public function create(){
            //query
            $query = 'INSERT INTO ' . $this->table . ' SET student_name = :student_name, student_no = :student_no, email = :email, phone = :phone, course_id = :course_id';

            //prepared statement
            $stmt = $this->conn->prepare($query);
 
            //cleaning data
            $this->student_name = htmlspecialchars(strip_tags($this->student_name));
            $this->student_no = htmlspecialchars(strip_tags($this->student_no));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->course_id = htmlspecialchars(strip_tags($this->course_id));

            //binding parameters
            $stmt->bindParam(':student_name', $this->student_name);
            $stmt->bindParam(':student_no', $this->student_no);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':course_id', $this->course_id);

            //execute query
            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

        //update post function
        public function update(){
            //query
            $query = 'UPDATE ' . $this->table . ' 
            SET student_name = :student_name, student_no = :student_no, email = :email, phone = :phone, course_id = :course_id WHERE id = :id';

            //prepared statement
            $stmt = $this->conn->prepare($query);
 
            //cleaning data
            $this->student_name = htmlspecialchars(strip_tags($this->student_name));
            $this->student_no = htmlspecialchars(strip_tags($this->student_no));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->course_id = htmlspecialchars(strip_tags($this->course_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            //binding parameters
            $stmt->bindParam(':student_name', $this->student_name);
            $stmt->bindParam(':student_no', $this->student_no);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':course_id', $this->course_id);
            $stmt->bindParam(':id', $this->id);

            //execute query
            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }
        public function delete(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);


            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }
?> 