<?php
    class LoginController extends BaseController{
        public $model;
        public function __construct()
        {   
            $this->model = $this->model('user');
        }

        public function index(){
            return $this->view('Admin/Login/index');
        }

        public function login(){
            $request = $this->request();
            $redirect = $this->redirect();
            $data = $request->getFields();
            $rule = [
                'email'=>'required|email',
                'password'=>'required'
            ];
            $mess = [
                'email.required'=>'Trường này không được bỏ trống!',
                'email.email'=>'Không đúng định dạng email!',
                'password.required'=>'Trường này không được bỏ trống!',
            ];
            $request->validate($rule, $mess);
            $checkError = $request->getErrors();
            if(empty($checkError)){
                $query = $this->model->table('tbl_admin')->where('email', '=', $data['email'])->where('password', '=', md5($data['password']))->first();
                if(!empty($query)){
                    $userInfo = [
                        'id'=>$query['id'],
                        'name'=>$query['name'],
                        'email'=>$query['email'],
                        'phone'=>$query['phone'],
                        'image'=>$query['image'],
                        'address'=>$query['address']
                    ];
                    Session::dataSession('user',$userInfo);
                    return $redirect->redirect('/admin/dashboard');
                }else{
                    Session::flashData('checkLogin', 'Tài khoản hoặc mật khẩu không chính xác!');
                    return $redirect->redirect('/admin/login');
                }            
            }else{
                Session::flashData('errors', $request->getErrors());
                return $redirect->redirect('/admin/login');
            }
        }

        public function logout(){
            Session::deleteSession('user');
            $redirect = $this->redirect();
            return $redirect->redirect('/admin/login');
        }
    }
?>