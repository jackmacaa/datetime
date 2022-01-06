<?php
    class Date
    {
        protected $date1;
        protected $date2;
        protected $diff;

        public function weekDays($data):int{
            $this->date1 = new DateTime($data['startdate']);
            $this->date2 = new DateTime($data['enddate']);
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
            return $days;
        }

        public function dateDifference($data):string{
            $this->date1 = new DateTime($data['startdate']);
            $this->date2 = new DateTime($data['enddate']);

            $this->diff = $this->date1->diff($this->date2);

            $formatedDiff = match($data['returnformat']){
                'weeks' => floor(($this->diff->format('%a')) / 7),
                'years' => $this->diff->format('%y'),
                default => $this->diff->format('%a'),
            };

            return $formatedDiff;
        }
    }