<?php
    class HomeController extends BaseController{
        public $model;

        public function __construct(){
            $this->model = $this->model('home');
        }

        public function index(){
            $this->model->table('tbl_role')->where('id', '=', '3')->deleteData();
        }

        public function store(){
            $data = [
                'name' => 'name-3',
                'title' => 'title-3',
                'logo' => 'logo-3'
            ];
            $this->model->store($data);
        }

        public function update($id){
            $data = [
                'name' => 'name-3',
                'title' => 'title-3',   
                'logo' => 'logo-3'
            ];
           $this->model->edit($id, $data);
        }

        public function delete($id){
            var_dump($this->model->idLast());
        }
    }
?>