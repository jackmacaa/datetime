<?php
    class Date
    {
        protected DateTime $date1;
        protected DateTime $date2;
        protected DateInterval $diff;

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

        public function dateDifference(array $data):string{
            $this->date1 = new DateTime($data['startdate'], new DateTimeZone($data['startdate-timezone']));
            $this->date2 = new DateTime($data['enddate'], new DateTimeZone($data['enddate-timezone']));

            // Calc difference between the two dates
            $this->diff = $this->date1->diff($this->date2);

            // return to format the user asked for
            return match($data['returnformat']){
                'weeks' => floor(($this->diff->format('%a')) / 7),
                'years' => $this->diff->format('%y'),
                default => $this->diff->format('%a'),
            };
        }

        public function weekDays(array $data):int{
            $this->date1 = new DateTime($data['startdate'], new DateTimeZone($data['startdate-timezone']));
            $this->date2 = new DateTime($data['enddate'], new DateTimeZone($data['enddate-timezone']));

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
    }