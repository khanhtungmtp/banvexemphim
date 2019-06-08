<?php 
/**
 * 
 */
class UserModel extends Model
{

	function __construct()
	{
		// $this->db=new Database();
		parent::__construct();
	}
	public function profile()
	{
		$this->db->query("SELECT * FROM users WHERE id=:id");
		$this->db->bind(":id",$_SESSION['id']);
		return $this->db->single();
	}
	public function addUser($data)
	{
		$this->db->query('INSERT INTO users(fullname,email,password,phone,address,birthday,gioitinh) VALUES(:fullname,:email,:password,:phone,:address,:birthday,:gioitinh)');
		// bindValue
		$this->db->bind(':fullname',$data['fullname']);
		$this->db->bind(':email',$data['email']);
		$this->db->bind(':password',md5($data['password']));
		$this->db->bind(':phone',$data['phone']);
		$this->db->bind(':address',$data['address']);
		$this->db->bind(':birthday',$data['birthday']);
		$this->db->bind(':gioitinh',$data['gioitinh']);
		
		if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
	}
	public function getuser($email)
	{
		$this->db->query('SELECT * FROM users WHERE email=:email');
		// bindValue
		$this->db->bind(':email',$email);
		// lấy dòng dữ liệu
		$row=$this->db->single();
        return $row;
	}
	// kiểm tra tồn tại email khi đăng ký form
    public function findUserbyEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind('email',$email);
        $this->db->single();
        // kiểm tra số dòng
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
	}
	// hiển thị phim ra trang chủ
	public function getMovie()
	{
		$condition=date('Y-m-d H:i:s');
		$this->db->query("SELECT movie.*,cat.id as idCat,cat.title as titleCat FROM movie INNER JOIN category cat ON cat.id=movie.category_id WHERE is_public=1 AND khoichieu<='$condition' GROUP BY movie.title");
		return $this->db->resultSet();
	}
	// Phòng ngày giờ phim
	public function calendar_view($id)
	{
		$this->db->query('SELECT movie.id,movie.title,movie_id,ngay,gio FROM movie INNER JOIN lichchieu ON movie.id=movie_id WHERE movie_id=:id');
		$this->db->bind(':id',$id);
		// lấy tất cả dòng dữ liệu
		return $this->db->resultSet();  
	}


}