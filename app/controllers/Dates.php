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

                $data[] = match($data['returnformat']){
                    'weeks' => $data['difference'] = $this->dateModel->weeks($data),
                    'years' => $data['difference'] = $this->dateModel->years($data),
                    default => $data['difference'] = $this->dateModel->days($data),
                };

                $this->view('dates/difference', $data);
            }

            else{
                $data = [
                    'returnformat' => '',
                    'startdate' => '',
                    'enddate' => '',
                    'difference' => ''
                ];
                $this->view('dates', $data);
            }

        }

    }