<?php
    class DashboardController extends BaseController{
        public function index(){
            return $this->view('Admin/Dashboard/index');
        }

        public function create(){
            return $this->view('Admin/Dashboard/create');
        }
    }
?>