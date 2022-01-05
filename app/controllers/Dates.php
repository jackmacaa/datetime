<?php
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
            ];

            $this->view('dates/index', $data);
        }

        public function difference(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
                    'returnformat' => trim($_POST['returnformat']),
                    'startdate' => trim($_POST['startdate']),
                    'enddate' => trim($_POST['enddate']),
                    'difference' => ''
                ];


                
                if($data['returnformat'] == 'days'){
                    $diff = [
                        'difference' => $this->dateModel->days($data),
                        'returnformat' => 'Days'
                        ];
                }
                if($data['returnformat'] == 'weeks'){
                    $diff = [
                        'difference' => $this->dateModel->weeks($data),
                        'returnformat' => 'Weeks'
                        ];
                }
                if($data['returnformat'] == 'years'){
                    $diff = [
                        'difference' => $this->dateModel->years($data),
                        'returnformat' => 'Years'
                    ];
                }
                else{
                    $diff = [
                        'difference' => $this->dateModel->days($data),
                        'returnformat' => 'DEFAULTED TO DAYS'
                    ];
                }

                $this->view('dates/difference', $diff);
            }

            else{
                $data = [
                    'returnformat' => '',
                    'startdate' => '',
                    'enddate' => ''
                ];
                $this->view('dates', $data);
            }

        }

    }