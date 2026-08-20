<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$config['middlewares'] = array(
    'student' => load_class('Student_middleware', 'middlewares'),
);