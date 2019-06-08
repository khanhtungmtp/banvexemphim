<?php 
/**
 * Controller ngoài trang chủ
 */
class Index extends Controller
{
	
	function __construct()
	{
		// new model ở đây	
		$this->userModel=$this->model('UserModel');
	}
	// trang chủ
	public function index()
	{
		$this->view('home/inc/header');
		$data['getMovie']=$this->userModel->getMovie();
		$this->view('home/index',$data);
		$this->view('home/inc/footer');
	}
	// thông tin cá nhân
	public function profile()
	{
		$this->view('home/inc/header');

		$data['profile']=$this->userModel->profile();
		$this->view('home/profile',$data);
		$this->view('home/inc/footer');
	}
	// đăng xuất
	public function logout()
	{
		// session start
		Session::init();
		// hủy session
		Session::destroy();
		redirect('index');
	}
	// đăng nhập
	public function login()
	{
		$this->view('home/inc/header');
		//Hàm filter_input_array () nhận các biến bên ngoài (ví dụ: từ đầu vào biểu mẫu) và tùy chọn lọc chúng. Hàm này rất hữu ích cho việc truy xuất / lọc nhiều giá trị
		$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		// KIỂM TRA NGƯỜI DÙNG SUBMIT
		if ($_SERVER['REQUEST_METHOD']=='POST') {

			$data=[
				'email'        =>trim(PostInput('email')),
				'password'     =>trim(PostInput('password')),
				'email_err'    =>'',
				'password_err' =>'',
				'session_user' =>''
			];
			// kiểm tra lỗi input
			if (empty($data['email'])) {
				$data['email_err']="<p class='alert alert-danger'>Vui lòng nhập email </p>";
			}elseif($this->userModel->findUserbyEmail($data['email'])==false){
			    // nếu email không tồn tại
                $data['email_err']="<p class='alert alert-danger'>Email này không tồn tại trong hệ thống </p>";
            }

			if (empty($data['password'])) {
				$data['password_err']="<p class='alert alert-danger'>Vui lòng nhập mật khẩu </p>";
			}elseif (strlen($data['password'])<8) {
				$data['password_err']="<p class='alert alert-danger'>Mật khẩu phải trên 7 ký tự </p>";
			}


			// nếu không có lỗi thì đăng nhập thành công
			if (empty($data['email_err']) && empty($data['password_err'])) {
				$user=$this->userModel->getuser($data['email']);
				if ($user) {
					// session start
				//Session::init();
				// lưu vào session
				//Session::setSession('email',$data['email']);
				Session::setSession('id',$user->id);
				Session::setSession('email',$user->email);
				Session::setSession('fullname',$user->fullname);
				Session::setSession('phone',$user->phone);
				Session::setSession('address',$user->address);
				Session::setSession('birthday',$user->birthday);
				Session::setSession('gioitinh',$user->gioitinh);
					if ($user->is_admin==2) {
						redirect('index');
					}else{
						Session::setSession('admin',$user->is_admin);
						redirect('admin');
					}
				
				}else{
					$data['password_err']='Sai mật khẩu';
					// lỗi thì hiển thị lỗi ra form
					$this->view('home/login',$data);
				}
				
			}else{
				// ngược lại có lỗi thì hiện lỗi ra view
				$this->view('home/login',$data);
			}

		}else{
			// chưa submit thì hiện giao diện login ra
			$this->view('home/login');
		}

		$this->view('home/inc/footer');
	}
	// đăng ký
	public function register()
	{
		$this->view('home/inc/header');
		$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			
			$data=[
			'fullname'     => trim(PostInput('fullname')),
			'email'        =>trim(PostInput('email')),
			'password'     =>trim(PostInput('password')),
			'phone'        => trim(PostInput('phone')),
			'address'      => trim(PostInput('address')),
			'birthday'     => trim(PostInput('birthday')),
			'gioitinh'     => PostInput('gioitinh'),
			'fullname_err' => '',
			'email_err'    => '',
			'password_err' => '',
			'phone_err'    => ''
			];


			// kiểm tra lỗi input
			if (empty($data['fullname'])) {
				$data['fullname_err']="<p class='alert alert-danger'>Vui lòng nhập họ và tên </p>";
			}

			if (empty($data['email'])) {
				$data['email_err']="<p class='alert alert-danger'>Vui lòng nhập email </p>";
			}elseif($this->userModel->findUserbyEmail($data['email'])){
			    // nếu email tồn tại
                $data['email_err']="<p class='alert alert-danger'>Email này đã tồn tại </p>";
            }

			if (empty($data['password'])) {
				$data['password_err']="<p class='alert alert-danger'>Vui lòng nhập mật khẩu </p>";
			}elseif (strlen($data['password'])<8) {
				$data['password_err']="<p class='alert alert-danger'>Mật khẩu phải trên 7 ký tự </p>";
			}
			if (empty($data['phone'])) {
				$data['phone_err']="<p class='alert alert-danger'>Vui lòng nhập số điện thoại </p>";
			}

			// nếu không có lỗi thì insert vào csdl
			if (empty($data['fullname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['phone_err'])) {

				$adduser=$this->userModel->addUser($data);
				$user=$this->userModel->getuser($data['email']);
				// nếu insert thành công
				if ($adduser==true) {
					// insert thành công

					Session::init();
					Session::setSession('id',$user->id);
					Session::setSession('email',$user->email);
					Session::setSession('fullname',$user->fullname);
					Session::setSession('phone',$user->phone);
					Session::setSession('address',$user->address);
					Session::setSession('birthday',$user->birthday);
					Session::setSession('gioitinh',$user->gioitinh);
					

					redirect('index');

				}else{
					$this->view('home/register',$data);
				}

			}else{
				$this->view('home/register',$data);
			}

		}else{
			// lúc chưa submit
			$this->view('home/register');
		}

		$this->view('home/inc/footer');
	}
	// phong đặt chỗ ngồi
	public function calendar_view($id)
	{
		$this->view('home/inc/header');
		$data['calendar_view']=$this->userModel->calendar_view($id);
		$this->view('home/calendar_view',$data);
		$this->view('home/inc/footer');
	}

}