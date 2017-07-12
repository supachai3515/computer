<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Rest_server extends BaseController {

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('rest_server');
    }
}
