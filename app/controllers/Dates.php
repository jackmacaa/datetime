<?php
/*namespace app\controllers;
use app\libraries\Controller;
use app\models\Date;*/
    class Dates extends Controller
    {
        private Date $dateModel;

        public function __construct()
        {
            $this->dateModel = $this->model('Date');
        }

        public function index()
        {
            $posts = $this->dateModel->getPosts();

            $data = [
                'title' => 'Date Time App',
                'returnformat' => '',
                'startdate-timezone' => '',
                'startdate' => '',
                'enddate-timezone' => '',
                'enddate' => '',
                'posts' => $posts
            ];

            $this->view('dates/index', $data);
        }

        public function difference(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if(empty($_SESSION['user_id'])){
                    $_SESSION['user_id'] = 3;
                    $_SESSION['user_name'] = 'Guest';
                }

                $data = [
                    'user-id' => $_SESSION['user_id'],
                    'returnformat' => trim($_POST['returnformat']),
                    'startdate-timezone' => trim($_POST['startdate-timezone']),
                    'startdate' => trim($_POST['startdate']),
                    'enddate-timezone' => trim($_POST['enddate-timezone']),
                    'enddate' => trim($_POST['enddate']),
                    'result' => '',
                    'returnformat_err' => '',
                    'startdate_err' => '',
                    'enddate_err' => ''
                ];

                // check if inputs are empty
                if(empty($data['returnformat'])){
                    $data['returnformat_err'] = 'Please enter a return format';
                }
                if(empty($data['startdate'])){
                    $data['startdate_err'] = 'Please enter a start date';
                }
                if(empty($data['enddate'])){
                    $data['enddate_err'] = 'Please enter an end date';
                }
                if(empty($data['startdate-timezone'])){
                    $data['startdate-timezone'] = 'Australia/Adelaide';
                }
                if(empty($data['enddate-timezone'])){
                    $data['enddate-timezone'] = 'Australia/Adelaide';
                }

                // checks if input date is valid

                // check if any _err exists and if not running the corresponding function
                if(empty($data['returnformat_err']) &&
                    empty($data['startdate_err']) &&
                    empty($data['enddate_err'])){
                    // checking what dateformat they asked for and running that function
                    $data[] = match($data['returnformat']){
                        'weekdays' => $this->dateModel->weekDays($data),
                        default => $this->dateModel->dateDifference($data),
                    };

                    flash('post_message', 'Post Added');
                    // returning the processed data to the differences page
                    $this->view('dates/difference', $data);

                } else{
                    $this->view('dates/index', $data);
                }

            // Not sure if this will ever run
            }else{
                $data = [
                    'returnformat' => '',
                    'startdate' => '',
                    'enddate' => ''
                ];
                $this->view('dates/index', $data);
            }
        }

        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'user-id' => $_SESSION['user_id'],
                    'returnformat' => trim($_POST['returnformat']),
                    'startdate-timezone' => trim($_POST['startdate-timezone']),
                    'startdate' => trim($_POST['startdate']),
                    'enddate-timezone' => trim($_POST['enddate-timezone']),
                    'enddate' => trim($_POST['enddate']),
                    'returnformat_err' => '',
                    'startdate_err' => '',
                    'enddate_err' => ''
                ];

                // check if inputs are empty
                if(empty($data['returnformat'])){
                    $data['returnformat_err'] = 'Please enter a return format';
                }
                if(empty($data['startdate'])){
                    $data['startdate_err'] = 'Please enter a start date';
                }
                if(empty($data['enddate'])){
                    $data['enddate_err'] = 'Please enter an end date';
                }
                if(empty($data['startdate-timezone'])){
                    $data['startdate-timezone'] = 'Australia/Adelaide';
                }
                if(empty($data['enddate-timezone'])){
                    $data['enddate-timezone'] = 'Australia/Adelaide';
                }

                // checks if input date is valid

                // check if any _err exists and if not running the corresponding function
                if(empty($data['returnformat_err']) &&
                    empty($data['startdate_err']) &&
                    empty($data['enddate_err'])){
                    // checking what dateformat they asked for and running that function
                    $data[] = match($data['returnformat']){
                        'weekdays' => $this->dateModel->WeekDays($data),
                        default => $this->dateModel->DateDifference($data),
                    };

                    flash('post_message', 'Post Updated');
                    // returning the processed data to the differences page
                    $this->view('dates/difference', $data);

                } else{
                    $this->view('dates/edit', $data);
                }


            }else{
                $post = $this->dateModel->getPostById($id);

                $data = [
                    'id' => $id,
                    'returnformat' => $post->return_format,
                    'startdate-timezone' => $post->start_date_timezone,
                    'startdate' => $post->start_date,
                    'enddate-timezone' => $post->end_date_timezone,
                    'enddate' => $post->end_date,
                    'returnformat_err' => '',
                    'startdate_err' => '',
                    'enddate_err' => ''
                ];
                $this->view('dates/edit', $data);
            }
        }
    }