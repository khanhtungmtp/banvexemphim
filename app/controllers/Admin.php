<?php
/**
 * Controller quản trị admin
 */
class Admin extends Controller
{
	protected $adminModel;
	protected $uploadOk;
	function __construct()
	{
		// kiểm tra nếu đăng nhập rồi và là admin mới đc vô hệ thống
		Session::checkSession();
		// new model ở đây
		$this->adminModel = $this->model('AdminModel');
	}
	// danh sách user
	public function listUser()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['listUser']=$this->adminModel->listUser();
		$this->view('admin/listUser',$data);
	}
	// xóa user
	public function delUser($id)
	{
		$delUser=$this->adminModel->delUser($id);
		if ($delUser) {
			redirect('admin/listUser');
		}
	}
	// trang chủ
	public function index()
	{
		$this->listMovie();
	}
	// thêm mới phim
	public function addMovie()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'title'       => trim(PostInput('title')) , 
				'khoichieu'   => PostInput('khoichieu') , 
				'noidung'     => trim(PostInput('noidung')) , 
				'trailer_url' => trim(PostInput('trailer_url')) , 
				'thoiluong'   => trim(PostInput('thoiluong')) , 
				'daodien'     => trim(PostInput('daodien')) , 
				'dienvien'    => trim(PostInput('dienvien')) , 
				'ngonngu'     => trim(PostInput('ngonngu')) , 
				'theloai'     => PostInput('theloai') , 
				'rated'       => trim(PostInput('rated')) , 
				'trangthai'      => $_POST['trangthai'] , 
				'listMn'      => ''];
			// kiểm tra lỗi input
				if (empty($data['title'])) {
					$data['title_err'] = "Vui lòng nhập tên phim";
				}
				if (empty($data['khoichieu'])) {
					$data['khoichieu_err'] = "Vui lòng chọn ngày khởi chiếu";
				}
				if (empty($data['noidung'])) {
					$data['noidung_err'] = "Vui lòng nhập nội dung phim";
				}
				if (empty($data['trailer_url'])) {
					$data['trailer_url_err'] = "Vui lòng nhập link trailer phim";
				}
				if (empty($data['thoiluong'])) {
					$data['thoiluong_err'] = "Vui lòng nhập thời lượng phim";
				}
				if (empty($data['daodien'])) {
					$data['daodien_err'] = "Vui lòng nhập đạo diễn phim";
				}
				if (empty($data['dienvien'])) {
					$data['dienvien_err'] = "Vui lòng nhập diễn viên phim";
				}
				if (empty($data['ngonngu'])) {
					$data['ngonngu_err'] = "Vui lòng nhập ngôn ngữ phim";
				}
				if (empty($data['theloai']) || $data['theloai'] == null) {
					$data['theloai_err'] = "Vui lòng chọn thể loại phim";
				}
				if (empty($data['rated']) || $data['rated'] == null) {
					$data['rated_err'] = "Vui lòng nhập đối tượng xem phim";
				}
			// xử lý hình ảnh
				//Thư mục bạn sẽ lưu file upload
				$target_dir    = "public/uploads/";
				//Vị trí file lưu tạm trong server
				$target_file   = $target_dir . basename($_FILES["photo"]["name"]);
				$allowUpload   = true;
				//Lấy phần mở rộng của file
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$maxfilesize   = 800000; //(bytes)
				////Những loại file được phép upload
				$allowtypes    = array('jpg', 'png', 'jpeg', 'gif','JPG', 'PNG', 'JPEG', 'GIF');
			//Kiểm tra xem có phải là ảnh
				if (!empty($_FILES["img"]["tmp_name"])) {
					$check = getimagesize($_FILES["photo"]["tmp_name"]);
					 if($check !== false) {
					        $allowUpload = true;
					    }else{
					        $data['photo_err']="Không phải file ảnh.";
					        $allowUpload = false;
					    }
				}
		    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
			if (file_exists('../'.$target_file)) {
			    $data['photo_err']="File đã tồn tại.";
			    $allowUpload = false;
			}
			// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
			if ($_FILES["photo"]["size"] > $maxfilesize)
			{
			    $data['photo_err']="Không được upload ảnh lớn hơn $maxfilesize (bytes).";
			    $allowUpload = false;
			}
			// Kiểm tra kiểu file
			if (!in_array($imageFileType,$allowtypes ))
			{
			    $data['photo_err']="Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
			    $allowUpload = false;
			}
			 

			// nếu ko có lỗi
			if (empty($data['title_err']) && empty($data['khoichieu_err']) && empty($data['noidung_err']) && empty($data['trailer_url_err']) && empty($data['thoiluong_err']) && empty($data['daodien_err']) && empty($data['dienvien_err']) && empty($data['ngonngu_err']) && empty($data['theloai_err']) && empty($data['rated_err']) && empty($data['photo_err']) ) {
				// Kiểm tra file ok hết chưa
		        if ($allowUpload==true) {
				    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], '../'.$target_file)){
				    $data['photo_err']="Có lỗi xảy ra khi upload file.";
				    }else{
				        $data['photo']=$target_file;
				    }
				}
				$addMovie = $this->adminModel->addMovie($data);
				if ($addMovie) {
					Session::setSession('addMovie',$addMovie);
					redirect('admin/listMovie');
				}
				else {
					$data['success'] = "Thêm thất bại";
				}
				$this->view('admin/addMovie', $data);
				// ngược lại nếu có lỗi
			}
			else {

				$data['listMn'] = $this->adminModel->listCategory();
				$this->view('admin/addMovie', $data);
			}
			// else $_SERVER
		}
		else {
			$data['listMn'] = $this->adminModel->listCategory();
			$this->view('admin/addMovie', $data);
		}
		$this->view('admin/inc/footer');
	}
	// danh sách phim
	public function listMovie()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['listMovie'] = $this->adminModel->listMovie();
		$this->view('admin/listMovie', $data);
		$this->view('admin/inc/footer');
	}
	// sửa thể loại phim
	public function editMovie($id)
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['getMovie'] = $this->adminModel->getMovie($id);
		// update lại cái đã sửa
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
			$data = [
				'title'       => trim(PostInput('title')) , 
				'daodien'     => trim(PostInput('daodien')) , 
				'dienvien'    => trim(PostInput('dienvien')) , 
				'khoichieu'   => PostInput('khoichieu') , 
				'thoiluong'   => trim(PostInput('thoiluong')) , 
				'ngonngu'     => trim(PostInput('ngonngu')) , 
				'noidung'     => trim(PostInput('noidung')) , 
				'trailer_url' => trim(PostInput('trailer_url')) ,
				'rated'       => trim(PostInput('rated')) ,
				'listMn'      => '', 
				'theloai'     => PostInput('theloai') 				
			];
			// kiểm tra lỗi input
			if (empty($data['title'])) {
				$data['title_err'] = "Vui lòng nhập tên phim";
			}
			if (empty($data['khoichieu'])) {
				$data['khoichieu_err'] = "Vui lòng chọn ngày khởi chiếu";
			}
			if (empty($data['noidung'])) {
				$data['noidung_err'] = "Vui lòng nhập nội dung phim";
			}
			if (empty($data['trailer_url'])) {
				$data['trailer_url_err'] = "Vui lòng nhập link trailer phim";
			}
			if (empty($data['thoiluong'])) {
				$data['thoiluong_err'] = "Vui lòng nhập thời lượng phim";
			}
			if (empty($data['daodien'])) {
				$data['daodien_err'] = "Vui lòng nhập đạo diễn phim";
			}
			if (empty($data['dienvien'])) {
				$data['dienvien_err'] = "Vui lòng nhập đạo diễn phim";
			}
			if (empty($data['ngonngu'])) {
				$data['ngonngu_err'] = "Vui lòng nhập ngôn ngữ phim";
			}
			if (empty($data['theloai']) || $data['theloai'] == null) {
				$data['theloai_err'] = "Vui lòng chọn thể loại phim";
			}
			if (empty($data['rated']) || $data['rated'] == null) {
					$data['rated_err'] = "Vui lòng nhập đối tượng xem phim";
				}
			// xử lý hình ảnh
				if ($_FILES['photo']['tmp_name']!='') {
					//Thư mục bạn sẽ lưu file upload
						$target_dir    = "public/uploads/";
						//Vị trí file lưu tạm trong server
						$target_file   = $target_dir . basename($_FILES["photo"]["name"]);
						$allowUpload   = true;
						//Lấy phần mở rộng của file
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						$maxfilesize   = 800000; //(bytes)
						////Những loại file được phép upload
						$allowtypes    = array('jpg', 'png', 'jpeg', 'gif','JPG', 'PNG', 'JPEG', 'GIF');
					//Kiểm tra xem có phải là ảnh
						if (!empty($_FILES["img"]["tmp_name"])) {
							$check = getimagesize($_FILES["photo"]["tmp_name"]);
							 if($check !== false) {
							        $allowUpload = true;
							    }else{
							        $data['photo_err']="Không phải file ảnh.";
							        $allowUpload = false;
							    }
						}
				   /* // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
					if (file_exists('../'.$target_file)) {
					    $data['photo_err']="File đã tồn tại.";
					    $allowUpload = false;
					}
		*/			// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
					if ($_FILES["photo"]["size"] > $maxfilesize)
					{
					    $data['photo_err']="Không được upload ảnh lớn hơn $maxfilesize (bytes).";
					    $allowUpload = false;
					}
					// Kiểm tra kiểu file
					if  (!in_array($imageFileType,$allowtypes ))
					{
					    $data['photo_err']="Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
					    $allowUpload = false;
					}
				}

			// nếu ko có lỗi, thì update
			if (empty($data['title_err']) && empty($data['khoichieu_err']) && empty($data['noidung_err']) && empty($data['trailer_url_err']) && empty($data['thoiluong_err']) && empty($data['daodien_err']) && empty($data['dienvien_err']) && empty($data['ngonngu_err']) && empty($data['theloai_err']) && empty($data['photo_err'])) {
				// nếu người dùng ko sửa ảnh
				if ($_FILES['photo']['size'] == '') {
					$data['photo'] = PostInput('photo_hidden');
				//$uploadOk = false;
				}else{
					// Kiểm tra file ok hết chưa
		        if ($allowUpload==true) {
				    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], '../'.$target_file)){
				    $data['photo_err']="Có lỗi xảy ra khi upload file.";
				    }else{
				        $data['photo']=$target_file;
				    }
				}
					// xóa ảnh cũ trong thư muc khi user thay ảnh mới
					$getImage = $this->adminModel->getImage($id);
					unlink('../'.$getImage->hinh);
				}				
				// update dữ liệu mới vào phim
				$updateMovie = $this->adminModel->updateMovie($id, $data);
				if ($updateMovie) {
					Session::setSession("updateMovie", $updateMovie);
					redirect("admin/listMovie");
				}
				$this->view('admin/editMovie', $data);
				// ngược lại nếu có lỗi
			}
			else {
				$data['listMn'] = $this->adminModel->listCategory();
				$this->view('admin/editMovie', $data);
			}
			// else $_SERVER
		}
		else {
			$data['listMn'] = $this->adminModel->listCategory();
			$this->view('admin/editMovie', $data);
		}
		$this->view('admin/inc/footer');
	}
	// Xóa phim
	public function delMovie($id)
	{
		// xóa ảnh cũ trong thư muc khi user thay ảnh mới
		$getImage = $this->adminModel->getImage($id);
		unlink('../'.$getImage->hinh);
		$delMovie = $this->adminModel->delMovie($id);	
		if ($delMovie) {
			Session::setSession("delMovie", $delMovie);
			redirect("admin/listMovie");
		}
		else {
			die("Xóa thất bại");
		}
	}
	// Thêm mới thể loại phim đang chiếu
	public function addCategory()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'title'     => trim(PostInput('title')) , 
				'title_err' => '', 
				'success'   => ''];
			// kiểm tra lỗi input
				if (empty($data['title'])) {
					$data['title_err'] = "Vui lòng nhập tên thể loại";
				}
				elseif ($this->adminModel->is_cat($data['title'])) {
					$data['title_err'] = "Thể loại này đã tồn tại";
				}
			// nếu không có lỗi thì insert
				if (empty($data['title_err'])) {
					$addCategory = $this->adminModel->addCategory($data['title']);
				// nếu add thành công
					if ($addCategory) {
						Session::setSession('success',$addCategory);
						redirect('admin/listCategory');
				}
				else {
					$data['title_err'] = "Thêm thất bại";
				}
			}
			else {
				// lỗi thì hiển thị lỗi ra form
				$this->view('admin/addCategory', $data);
			}
			// else của $_server
		}
		else {
			$this->view('admin/addCategory');
		}
		$this->view('admin/inc/footer');
	}
	// sửa thể loại phim
	public function editCategory($id)
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['getCategory'] = $this->adminModel->getCategory($id);
		// update lại cái đã sửa
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// kiểm tra lỗi input
			if (empty($data['title'])) {
				$data['title_err'] = "Vui lòng nhập tên thể loại";
			}
			elseif ($this->adminModel->is_cat($data['title'])) {
				$data['title_err'] = "Thể loại này đã tồn tại";
			}
			$data = ['title' => trim(PostInput('title')) ];
			// nếu không có lỗi thì update
			if (empty($data['title_err'])) {
				$updateCategory = $this->adminModel->updateCategory($id, $data['title']);
				if ($updateCategory) {
					Session::setSession("updateCategory", $updateCategory);
					redirect("admin/listCategory");
				}
			}
			else {
				// ngược lại có lỗi show lỗi ra
				$this->view('admin/editCategory', $data);
			}
			// end if server, $data['getCategory']
		}
		else {
			$this->view('admin/editCategory', $data);
		}
		$this->view('admin/inc/footer');
	}
	// Xóa thể loại phim
	public function delCategory($id)
	{
		$delCategory = $this->adminModel->delCategory($id);
		if ($delCategory) {
			Session::setSession("delCategory", $delCategory);
			redirect("admin/listCategory");
		}
		else {
			die("Xóa thất bại");
		}
	}
	// danh sách thể loại phim đang chiếu
	public function listCategory()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['listCategory'] = $this->adminModel->listCategory();
		$this->view('admin/listCategory', $data);
		$this->view('admin/inc/footer');
	}
	// lịch chiếu
	public function addcalendar($id)
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$data=[
				'ngay'=>PostInput('ngay'),
			];
			if (isset($_POST['gio'])) {
				foreach ($_POST['gio'] as $gio) {
					// insert vào csdl
					$data['addCalendar']=$this->adminModel->updateCalendar($id,$data['ngay'],$gio);
					if ($data['addCalendar']) {
						Session::setSession('addCalendar',$data['addCalendar']);
						redirect('admin/listMovie');
					}
				}
			}
			$this->view('admin/addCalendar',$data);
		}else{
			$data['getMovie']=$this->adminModel->getMovie($id);
			$this->view('admin/addCalendar',$data);
		}
		$this->view('admin/inc/footer');
	}
	// sửa lịch chiếu phim
	public function editCalendar($id)
	{
	
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$data=[
				'ngay'=>PostInput('ngay'),
			];
			if (!empty($_POST['gio'])) {
				// xóa dữ liệu cũ trong csdl khi ng dùng chọn giờ khác
				// đếm $_post['gio'] xem bằng với trong db ko, bằng thì update, nhỏ hơn hoặc lớn hơn ban đầu thì insert
				//$data['delCalendar']=$this->adminModel->delCalendar($id);
					foreach ($_POST['gio'] as $gio) {
				// insert vào csdl
						$data['updateCalendar']=$this->adminModel->updateCalendar($id,$data['ngay'],$gio);
						if ($data['updateCalendar']) {
							Session::setSession('updateCalendar',$data['updateCalendar']);
							redirect('admin/listMovie');
						}
					}
			}else{
				redirect('admin/listMovie');
			}
			$this->view('admin/editCalendar',$data);	
		}else{
			$data['getMovie']=$this->adminModel->getMovie($id);
			$data['checkDateTime']=$this->adminModel->checkDateTime($id);
			$this->view('admin/editCalendar',$data);
		}
		$this->view('admin/inc/footer');
	}
	public function ajax_date()
	{
		$this->view('admin/ajax_date');
	}
	public function ajax_time($date)
	{
		$gio=['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
		echo"<li>
			<select name='times[$date][]' class='times'>";
				foreach ($gio as $h){
					echo"<option value='$h'>$h</option>";
				}
				
			echo"</select>
			 <a href='javascript:;' class='del_time' onclick='delTime($(this));'><img src='../../public/img/delete1.png' /></a>
		</li>";
	}
	// xác nhận vé khách
	public function confirmOrder($id)
	{
		$confirmOrder=$this->adminModel->confirmOrder($id);
		if ($confirmOrder) {
			redirect('admin/listOrder');
		}
	}
	// hủy vé khách
	public function delOrder($id)
	{
		$data['delOrder']=$this->adminModel->delOrder($id);
		if ($data['delOrder']) {
			redirect('admin/listOrder');
		}
	}
	// danh sách người dùng mua vé
	public function listOrder()
	{
		$this->view('admin/inc/head');
		$this->view('admin/inc/menu');
		$data['listOrder'] = $this->adminModel->listOrder();
		$this->view('admin/listOrder',$data);
		$this->view('admin/inc/footer');
	}
	// tìm kiếm mã code của khách-> trao vé
	public function checkCode()
	{
		$connect = mysqli_connect("localhost", "root", "", "cgv");
		mysqli_set_charset($connect,"utf8");
		$output = '';
		if(isset($_POST["query"]))
		{
		 $code = mysqli_real_escape_string($connect, $_POST["query"]);
		 $query = "
		  SELECT booking.id as bkID,booking.*,users.id as userID,users.fullname,movie.id,movie.title FROM booking INNER JOIN users ON booking.user_id=users.id INNER JOIN movie ON booking.movie_id=movie.id WHERE booking.code LIKE '$code%' OR users.fullname LIKE '%$code%'
		 ";
		}
		else
		{
		 $query = "
		  SELECT booking.id as bkID,booking.*,users.id as userID,users.fullname,movie.id,movie.title FROM booking INNER JOIN users ON booking.user_id=users.id INNER JOIN movie ON booking.movie_id=movie.id
		 ";
		}

		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$i=0;
		 while($listOrder = mysqli_fetch_array($result))
		 {
		 	$i++;
		  $output .= '
		   <tr>
		     <td>'.$i.'</td>
		     <td>'.$listOrder["fullname"].'</td>
		     <td>'.$listOrder["title"].'</td>
		     <td>'.$listOrder["day"].'</td>
		     <td>'.$listOrder["gio"].'</td>
		     <td>'.$listOrder["seat"].'</td>
		     <td>'.$listOrder["code"].'</td>
		     <td>'; 
		     if($listOrder['confirm']==0){
		    $output .= ' <a href="confirmOrder/'.$listOrder['id'].' ">
		     	<img src="../admin_asset/images/success.png" width="16">
		     </a> || <a href="delOrder/'.$listOrder['id'].' " onclick="return confirm("Bạn có muốn xóa thể loại này?");"><img src="../public/img/delete.png" width="16"></a>';
		 	}elseif($listOrder['confirm']==-1){
		 	$output .= '<div class="text-danger">Đã hủy</div>';
                }else{
                $output .= '<div class="text-success">Đã xác nhận</div>';
		 	}
		     $output .= '</td>
		 	}
		   </tr>
		  ';
		 }
		 echo $output;
		}
		else
		{
		 echo 'Không có dữ liệu phù hợp';
		}
        
	}
	
	
}
