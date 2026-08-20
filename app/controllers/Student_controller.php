<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Student_controller extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = true;

        $data['title'] = 'Student Information';
        $this->call->view('Students_home', $data);
    }

    public function profile()
    {
        $student = [
            'student_id'      => 'MCC 2024-00164',
            'name'            => 'Ericha Tucio',
            'course'          => 'BS Information Technology',
            'birth_date'        => 'December 12, 2005',
            'age'             => '20',
            'year'            => '3rd Year',
            'section'         => 'F4',
             'number'          => '+63 912 0398 167',
            'email'           => 'erichatucio@gmail.com',
            'place_of_birth'  => 'Poblacion, Bansud, Oriental Mindoro',
            'address'         => 'Puerto Galera, Oriental Mindoro',
            'photo'           => 'damidayo.jpg'
        ];
        $this->call->view('Students_profile', $student);
    }
}