<?php 
/**
 * Controller chi tiết phim
 */

class Detail extends Controller
{
	protected $detailModel;
	function __construct()
	{
		// new model ở đây	
		$this->detailModel=$this->model('DetailModel');
	}
	// chi tiết phim
	public function index($id)
	{
		$this->view('home/inc/header');
		$data['getDetail']=$this->detailModel->getDetail($id);
		$this->view('home/detail',$data);
		$this->view('home/inc/footer');
	}
	// phòng đặt chỗ ngồi
	public function camera_room($id,$ngay,$gio)
	{	
		//id,ngay,gio là get từ trình duyệt xuống
		$data=[
			'id'=>$id,
			'ngay'=>$ngay,
			'gio'=>$gio,
		];
		$this->view('home/inc/header');
		$data['getMovie']=$this->detailModel->getMovie($id);
		$data['camera_room']=$this->detailModel->getRoom();
		$this->view('home/camera_room',$data);
	}
	// thông tin vé 
	public function order($id,$ngay,$gio)
	{	
		//id,ngay,gio là get từ trình duyệt xuống
		$this->view('home/inc/header');
		$data=[
			'movie_id'=>$id,
			'user_id'=>$_SESSION['id'] ,
			'ngay'=>$ngay,
			'gio'=>$gio,
			'ghe'=>PostInput('seats')
		];
		$code=[];
		// khai báo chuỗi ký tự
		$chars = 'abcdefghijklmnopqrstuv0123456789';
		// chiều dài của chuỗi
		$length = strlen($chars);
		// lấy 5 chữ số
		for ($i = 0;$i < 5;$i++) {
			$idx = rand() % $length;
			$code[] = strtoupper($chars[$idx]);
		}
		$data['code']=implode('', $code);
		$data['getMovie']=$this->detailModel->getMovie($id);
		if ($data['ghe']!=null) {
			$create_order=$this->detailModel->create_order($data['user_id'],$data['movie_id'],$data['ngay'],$data['gio'],$data['ghe'],$data['code']);
		}
		//print_r($data);
		if ($create_order) {
			Session::init();
			Session::setSession('ten',$data['getMovie']->title);
			Session::setSession('ngay',$data['ngay']);
			Session::setSession('gio',$data['gio']);
			Session::setSession('ghe',$data['ghe']);
			Session::setSession('code',$data['code']);
			/*echo "<div class='message'>
              Cảm ơn bạn đã đặt ghế xem bộ phim này. Vui lòng mang theo mã". $data['code']." để lấy vé.</div>";*/
              redirect('detail/success');
		}else{
			redirect('index');
		}
	}
	public function success()
	{
		$this->view('home/inc/header');
		$this->view('home/success');
		$this->view('home/inc/footer');
	}


}