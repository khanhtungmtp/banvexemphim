<?php 
/**
 * Model chi tiết phim
 */
class DetailModel extends Model
{
	
	function __construct()
	{
		# kế thừa để kết nối csdl
		parent::__construct();
	}
	// chi tiết phim
	public function getDetail($id)
	{
		$this->db->query("SELECT movie.id as Mid,movie.*,cat.id,cat.title as titleCat FROM movie INNER JOIN category cat ON cat.id=movie.category_id  WHERE movie.id=:id GROUP BY Mid");
		$this->db->bind(':id',$id);
		// lấy 1 dòng dữ liệu 
		return $this->db->single();
	}
	// Lấy chi tiết phim
	public function getMovie($id)
	{
		$this->db->query('SELECT * FROM movie WHERE id=:id');
		$this->db->bind(':id',$id);
		return $this->db->single();
	}
	// phòng đặt chỗ ngồi
	public function create_order($user_id,$movie_id,$ngay,$gio,$ghe,$code)
	{
		$this->db->query('INSERT INTO booking(user_id,movie_id,day,gio,seat,code) VALUES(:user_id,:movie_id,:day,:gio,:seat,:code)');
		$this->db->bind(':user_id',$_SESSION['id']);
		$this->db->bind(':movie_id',$movie_id);
		$this->db->bind(':day',$ngay);
		$this->db->bind(':gio',$gio);
		$this->db->bind(':seat',$ghe);
		$this->db->bind(':code',$code);
		if ($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function getRoom()
	{
		$this->db->query('SELECT seat FROM booking');
		return $this->db->resultSet();
	}
}