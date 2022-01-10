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
            $data = [
                'title' => 'Date Time App',
                'returnformat' => '',
                'startdate-timezone' => '',
                'startdate' => '',
                'enddate-timezone' => '',
                'enddate' => ''
            ];

            $this->view('dates/index', $data);
        }

        public function difference(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
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
                        'weekdays' => $this->dateModel->weekDays($data),
                        default => $this->dateModel->dateDifference($data),
                    };

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
    }