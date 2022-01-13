<?php
/*namespace app\models;
use app\controllers\Dates;*/

    class Date
    {
        private $date1;
        private $date2;
        private $diff;
        private $db;

        public function __construct(){
            $this->db =  new Database;
        }

        // DB FUNCS
        public function getPosts(){
            $this->db->query('SELECT *,
                                posts.id as postId,
                                users.id as userId,
                                posts.created_at as postCreated,
                                users.created_at as userCreated
                                FROM posts
                                INNER JOIN users
                                ON posts.user_id = users.id
                                ORDER BY posts.created_at DESC
                                ');

            return $this->db->resultSet();
        }

        public function getPostById($id)
        {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            return $row = $this->db->single();
        }

        public function addPost($data, $result){
            $this->db->query('INSERT INTO posts (user_id, return_format, start_date_timezone, start_date, end_date_timezone , end_date, result) 
                                VALUES(:user_id, :return_format, :start_date_timezone, :start_date, :end_date_timezone, :end_date, :result)');

            $this->db->bind(':user_id', $data['user-id']);
            $this->db->bind(':return_format', $data['returnformat']);
            $this->db->bind(':start_date_timezone', $data['startdate-timezone']);
            $this->db->bind(':start_date', $data['startdate']);
            $this->db->bind(':end_date_timezone', $data['enddate-timezone']);
            $this->db->bind(':end_date', $data['enddate']);
            $this->db->bind(':result', $result);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updatePost($data, $result){
            $this->db->query('UPDATE posts SET user_id = :user_id, return_format = :return_format,
                                        start_date_timezone = :start_date_timezone, start_date = :start_date,
                                        end_date_timezone = :end_date_timezone, end_date = :end_date,
                                        result = :result WHERE id = :id');

            $this->db->bind(':user_id', $data['user-id']);
            $this->db->bind(':return_format', $data['returnformat']);
            $this->db->bind(':start_date_timezone', $data['startdate-timezone']);
            $this->db->bind(':start_date', $data['startdate']);
            $this->db->bind(':end_date_timezone', $data['enddate-timezone']);
            $this->db->bind(':end_date', $data['enddate']);
            $this->db->bind(':result', $result);
            $this->db->bind(':id', $data['id']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :id');

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // DATE calc FUNCS
        public function setUp($data){
            $this->date1 = new DateTime($data['startdate'], new DateTimeZone($data['startdate-timezone']));
            $this->date2 = new DateTime($data['enddate'], new DateTimeZone($data['enddate-timezone']));
        }

        public function dateDifference(array $data){
           $this->setUp($data);
            // Calc difference between the two dates
            $this->diff = $this->date1->diff($this->date2);

            // return to format the user asked for
            $result =  match($data['returnformat']){
                'weeks' => floor(($this->diff->format('%a')) / 7),
                'years' => $this->diff->format('%y'),
                default => $this->diff->format('%a'),
            };
            if(empty($data['id'])){
                $this->addPost($data, $result);
            }else {
                $this->updatePost($data, $result);
            }

            return $result;
        }

        public function weekDays(array $data):int{
            $this->setUp($data);
            
            $days = 0;
            $weekend = ['Sat', 'Sun'];

            while($this->date1 < $this->date2)
            {
                $this->date1->modify('+1 day');
                $day = $this->date1->format('D');
                if($day != $weekend[0] && $day != $weekend[1])
                {
                    $days++;
                }
            }
            $data['result'] = $days;
            $this->addPost($data, $days);
            return $days;
        }

        // made pointless by adding 2 if statements to controller...
        public function checkTimezone($date, $timezone):DateTime{
            $setDate = new DateTime();

            if(empty($timezone)){
                $setDate = new DateTime($date, new DateTimeZone('Australia/Adelaide'));
            }
            else{
                $setDate= new DateTime($date, new DateTimeZone($timezone));
            }
            return $setDate;
        }
    }