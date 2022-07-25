<?php
    class UserController extends BaseController{
        private $modelRole;
        private $modelUser;
        public function __construct()
        {
            $this->modelRole = $this->model('role');
            $this->modelUser = $this->model('user');
        }

        public function index(){
            $data = $this->modelUser->table('tbl_admin')->select('tbl_admin.*, tbl_role.name AS nameRole')->leftJoin('tbl_role', 'tbl_admin.role_id = tbl_role.id')->get();
            return $this->view('/Admin/User/index', [
                'user'=>$data
            ]);
        }

        public function create(){
            $role = $this->modelRole->getData();
            return $this->view('/Admin/User/create', [
                'role' => $role,
            ]);
        }

        public function store(){
            $request = $this->request();
            $data = $request->getFields();
            $image = '';
            $imageError = '';
            if(!empty($_FILES['file']['name'])){
                $image = $_FILES['file'];
                $checkImage = strstr($image['type'], 'image');
                if($checkImage == false){
                    $imageError = 'Trường này nhận dữ liệu ảnh!';
                }else{
                    $image = time() . '-' . $image['name'];
                    $dir = _DIR_ . '/public/image/admin/' . $image;
                }              
            }else{
                $imageError = 'Trường này này không được bỏ trống!';
            }

           
            $dataUser = [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'role_id'=>$data['role_id'],
                'password'=>md5($data['password']),
                'phone'=>$data['phone'],
                'image'=>$image,
                'address'=>$data['address']
            ];

            $rule = [
                'name'=>'required',
                'email'=>'required|unique:tbl_admin:email|email',
                'role_id'=>'required',
                'password'=>'required',
                'phone'=>'required|unique:tbl_admin:phone|phone',
                'address'=>'required'
            ];

            $mess = [
                'name.required' => 'Trường này không được bỏ trống!',
                'email.required' => 'Trường này không được bỏ trống!',
                'role_id.required' => 'Trường này cần được chọn!',
                'password.required' => 'Trường này không được bỏ trống!',
                'phone.required' => 'Trường này không được bỏ trống!',
                'address.required' => 'Trường này không được bỏ trống!',
                'email.unique' => 'Gía trị đã tồn tại trong CSDL!',
                'phone.unique' => 'Gía trị đã tồn tại trong CSDL!',
                'email.email' => 'Không đúng định dạng email!',
                'phone.phone' => 'Không đúng định dạng SĐT!',
            ];

            $validate = $request->validate($rule, $mess);
            if($validate && $checkImage){
                $checkUpload = move_uploaded_file($_FILES['file']['tmp_name'], $dir);
                $checkCreate =  $this->modelUser->store($dataUser);
                if($checkCreate && $checkUpload){
                    Session::flashData('success', ['success'=>'Dữ liệu mới được thêm thành công!']);
                    echo json_encode(Session::flashData('success'));
                    exit();
                }else{
                    Session::flashData('errorSave', ['errorSave'=>'Dữ liệu mới được thêm thất bại!']);
                    echo json_encode(Session::flashData('errorSave'));
                    exit();
                }       
            }else{
                $errrors = $request->getErrors();
                $errrors['image'] = $imageError;
                Session::flashData('errors', $errrors);
                echo json_encode(Session::flashData('errors'));
                exit();
            }
        }

        public function update($id){
            $data = $this->modelUser->find($id);
            $role = $this->modelRole->getData();
            return $this->view('/Admin/User/update', [
                'user' => $data,
                'role'=>$role
            ]);
        }
    }
?>