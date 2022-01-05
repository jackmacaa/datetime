<?php
    class Date
    {
        public function days($data){

            $date1 = strtotime($data['startdate']);
            $date2 = strtotime($data['enddate']);

            $diff = abs($date2 - $date1);

            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff + $years * 365 * 60 * 60 * 24 + $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            return $days;

        }

        public function weeks($data){

            $date1 = strtotime($data['startdate']);
            $date2 = strtotime($data['enddate']);

            $diff = abs($date2 - $date1);

            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff + $years * 365 * 60 * 60 * 24 + $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            return floor($days / 7);

        }

        public function years($data){

            $date1 = strtotime($data['startdate']);
            $date2 = strtotime($data['enddate']);

            $diff = abs($date2 - $date1);

            return $years = floor($diff / (365 * 60 * 60 * 24));

        }
    }