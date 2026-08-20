<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Student_middleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
            redirect('student?blocked=1');
            return;
        }

        return $next();
    }
}