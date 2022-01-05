<?php
    class Dates extends Controller
    {
        private mixed $dateModel;

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

        public function days(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
                    'startdate' => trim($_POST['startdate']),
                    'enddate' => trim($_POST['enddate'])
                ];

                $days = $this->dateModel->days($data);

                $this->view('dates/days', $days);
            }

        }

        public function weeks(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
                    'startdate' => trim($_POST['startdate']),
                    'enddate' => trim($_POST['enddate'])
                ];

                $weeks = $this->dateModel->weeks($data);

                $this->view('dates/weeks', $weeks);
            }

        }



    }