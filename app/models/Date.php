<?php
    class Date
    {
        protected string $date1;
        protected string $date2;
        protected string $diff;

        public function years($data):int{
            $this->date1 = strtotime($data['startdate']);
            $this->date2 = strtotime($data['enddate']);
            $this->diff = abs($this->date2 - $this->date1);

            return floor($this->diff / (365 * 60 * 60 * 24));
        }

        public function weeks($data):int{
            $this->date1 = strtotime($data['startdate']);
            $this->date2 = strtotime($data['enddate']);
            $this->diff = abs($this->date2 - $this->date1);

            $years = floor($this->diff / (365 * 60 * 60 * 24));
            $months = floor(($this->diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($this->diff + $years * 365 * 60 * 60 * 24 + $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            return floor($days / 7);
        }

        public function days($data):int{
            $this->date1 = strtotime($data['startdate']);
            $this->date2 = strtotime($data['enddate']);
            $this->diff = abs($this->date2 - $this->date1);

            $years = floor($this->diff / (365 * 60 * 60 * 24));
            $months = floor(($this->diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));

            return floor(($this->diff + $years * 365 * 60 * 60 * 24 + $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        }

        public function weekDays($data):int{
            $date1 = new DateTime($data['startdate']);
            $date2 = new DateTime($data['enddate']);
            $days = 0;
            $weekend = ['Sat', 'Sun'];

            while($date1 < $date2)
            {
                $date1->modify('+1 day');
                $day = $date1->format('D');

                if($day != $weekend[0] && $day != $weekend[1])
                {
                    $days++;
                }
            }

            return $days;
        }

    }