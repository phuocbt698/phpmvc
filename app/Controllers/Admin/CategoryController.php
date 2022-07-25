<?php
    class CategoryController extends BaseController{
        public $model;

        public function __construct()
        {
            $this->model = $this->model('category');
        }
        public function index(){
            $data = $this->model->getData();
            return $this->view('Admin/Category/index', [
                'data'=> $data
            ]);
        }

        public function create(){
            return $this->view('Admin/Category/create');
        }

        public function store(){
            $validate = $this->validate();
            $request = $this->request()->getFields();
            $data = [
                'name' => $request['name']
            ];
            $rules = [
               'name'=>'required|min:5|max:250|unique:tbl_category:name'
            ];

            $messages = [
                'name.required'=>'Trường này không được bỏ trống!',
                'name.min'=>'Trường này có độ dài lớn hơn 5!',
                'name.max'=>'Trường này có độ dài nhỏ hơn 250!',
                'name.unique'=>'Giá trị đã tồn tại trong cơ sở dữ liệu!',
            ];
            $validate->validate($rules, $messages);
            $checkValidate = $validate->getErrors();
            if(empty($checkValidate)){
                $this->model->store($data);
                Session::flashData('success', ['success'=>'Dữ liệu mới được thêm thành công!']);
                echo json_encode(Session::flashData('success'));
                exit();
            }else{
                Session::flashData('errors', $validate->getErrors());
                echo json_encode(Session::flashData('errors'));
                exit();
            }          
        }

        public function update($id){
            if(isset($id)){
                $id = $id;
                $data = $this->model->find($id);
            }
            return $this->view('Admin/Category/update', [
                'data'=>$data
            ]);
        }

        public function edit($id){
            $validate = $this->validate();
            $request = $this->request()->getFields();
            $data = [
                'name' => $request['name']
            ];
            $rules = [
               'name'=>'required|min:5|max:250|unique:tbl_category:name'
            ];

            $messages = [
                'name.required'=>'Trường này không được bỏ trống!',
                'name.min'=>'Trường này có độ dài lớn hơn 5!',
                'name.max'=>'Trường này có độ dài nhỏ hơn 250!',
                'name.unique'=>'Giá trị đã tồn tại trong cơ sở dữ liệu!',
            ];
            $validate->validate($rules, $messages);
            $checkValidate = $validate->getErrors();
            if(empty($checkValidate)){
                $this->model->edit($id, $data);
                Session::flashData('success', ['success'=>'Dữ liệu đã được chỉnh sửa thành công!']);
                echo json_encode(Session::flashData('success'));
                exit();
            }else{
                Session::flashData('errors', $validate->getErrors());
                echo json_encode(Session::flashData('errors'));
                exit();
            }          
        }

        public function delete($id){
            $this->model->destroy($id);
            $data = $this->model->getData();
            echo json_encode($data);
            exit();
        }
    }
?>