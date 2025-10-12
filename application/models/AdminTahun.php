<?php 


class AdminTahun extends CI_Model {
    public function getYears($start_year = 1999){
        $current_year = date('Y');
        $years = [];

        for ($y = $current_year; $y >= $start_year; $y--) {
            $years[] = $y;
        }

        return $years;
    }

}