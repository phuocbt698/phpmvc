<?php
    class RoleController extends BaseController{
        private $model;
        
        public function __construct()
        {
            $this->model = $this->model('role');
        }

        public function index(){
            $data = $this->model->getData();
            return $this->view('/Admin/Role/index', [
                'data' => $data
            ]);
        }

        public function create()
        {
            return $this->view('/Admin/Role/create');
        }

        public function store()
        {
            $request = $this->request();
            $data = $request->getFields();
            $dataNew = [
                'name'=>$data['name']
            ];
            $rule = [
                'name'=>'required|min:5|max:200|unique:tbl_role:name'
            ];
            $mess = [
                'name.required'=>'Trường này không được để trống!',
                'name.min'=>'Trường này nhận tối thiểu độ dài hơn 5!',
                'name.max'=>'Trường này nhận tối đa độ dài 200!',
                'name.unique'=>'Gía trị này đã tồn tại trong CSDL'
            ];
            $checkVali = $request->validate($rule, $mess);
            if($checkVali){
                $this->model->store($dataNew);
                Session::flashData('success', ['success'=>'Dữ liệu mới được thêm thành công!']);
                echo json_encode(Session::flashData('success'));
                exit();
            }else{
                Session::flashData('errors', $request->getErrors());
                echo json_encode(Session::flashData('errors'));
                exit();
            }
        }

        public function update($id){
            if(isset($id)){
                $id = $id;
                $data = $this->model->find($id);
            }
            return $this->view('Admin/Role/update', [
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
               'name'=>'required|min:5|max:250|unique:tbl_role:name'
            ];

            $messages = [
                'name.required'=>'Trường này không được bỏ trống!',
                'name.min'=>'Trường này có độ dài lớn hơn 5!',
                'name.max'=>'Trường này có độ dài nhỏ hơn 250!',
                'name.unique'=>'Giá trị đã tồn tại trong cơ sở dữ liệu!',
            ];
            $checkValidate = $validate->validate($rules, $messages);
            if($checkValidate){
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