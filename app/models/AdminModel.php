<?php
/**
 *
 */
class AdminModel extends Model
{
    public function __construct()
    {
        // kế thừa để new database
        parent::__construct();
    }
    public function listuser()
    {
        $this->db->query('SELECT * FROM users WHERE is_admin=2');
        // lấy hết dòng dữ liệu
        $row=$this->db->resultSet();
        return $row;
    }

    // xóa user
    public function delUser($id)
    {
        $this->db->query("DELETE FROM users WHERE id=:id");
        $this->db->bind(":id", $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // xóa ảnh cũ trong thư mục
    public function getImage($id)
    {
        $this->db->query('SELECT hinh FROM movie WHERE id=:id');
        $this->db->bind(':id', $id);
        // lấy 1 dòng dữ liệu
        return $this->db->single();
    }
    // kiểm tra tồn tại category chưa
    public function is_cat($title)
    {
        $this->db->query('SELECT * FROM category WHERE title=:title');
        $this->db->bind(':title', $title);
        // lấy 1 dòng dữ liệu
        $this->db->single();
        // kiểm tra số dòng
        if ($this->db->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }
    // thêm mới category
    public function addCategory($title)
    {
        $this->db->query('INSERT INTO category(title) VALUES(:title)  ');
        $this->db->bind(':title', $title);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // danh sách category
    public function listCategory()
    {
        $this->db->query('SELECT * FROM category ORDER BY created ASC');
        // lấy tất cả dữ liệu
        return $this->db->resultSet();
    }
    // list menu category
    public function listCat()
    {
        $this->db->query('SELECT cat.*,movie.category_id FROM category cat INNER JOIN movie ON cat.id=movie.category_id GROUP BY cat.title ');
        // lấy tất cả dữ liệu
        return $this->db->resultSet();
    }
    // editCategory
    public function getCategory($id)
    {
        $this->db->query("SELECT * FROM category WHERE id=:id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
    // Xóa delCategory
    public function delCategory($id)
    {
        $this->db->query("DELETE FROM category WHERE id=:id");
        $this->db->bind(":id", $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // cập nhập updateMovie
    public function updateCategory($id, $title)
    {
        $this->db->query("UPDATE category SET title=:title WHERE id=:id");
        $this->db->bind(":id", $id);
        $this->db->bind(":title", $title);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // thêm mới bộ phim
    public function addMovie($data)
    {
        $this->db->query('INSERT INTO movie(title,daodien,dienvien,khoichieu,thoiluong,ngonngu,noidung,trailer_url,hinh,category_id,rated,is_public) VALUES(:title,:daodien,:dienvien,:khoichieu,:thoiluong,:ngonngu,:noidung,:trailer_url,:photo,:theloai,:rated,:is_public)');
        // bindValue
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':daodien', $data['daodien']);
        $this->db->bind(':dienvien', $data['dienvien']);
        $this->db->bind(':khoichieu', $data['khoichieu']);
        $this->db->bind(':thoiluong', $data['thoiluong']);
        $this->db->bind(':ngonngu', $data['ngonngu']);
        $this->db->bind(':noidung', $data['noidung']);
        $this->db->bind(':trailer_url', $data['trailer_url']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':theloai', $data['theloai']);
        $this->db->bind(':rated', $data['rated']);
        $this->db->bind(':is_public', $data['trangthai']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Xóa delMovie
    public function delMovie($id)
    {
        $this->db->query("DELETE FROM movie WHERE id=:id");
        $this->db->bind(":id", $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // cập nhập updateMovie
    public function updateMovie($id, $data)
    {
        $this->db->query("
			UPDATE movie 
			SET title       =:title,
				daodien     =:daodien, 
				dienvien    =:dienvien, 
				khoichieu   =:khoichieu, 
				thoiluong   =:thoiluong, 
				ngonngu     =:ngonngu, 
				noidung     =:noidung, 
				trailer_url =:trailer_url, 
				hinh        =:photo, 
				category_id =:theloai,
				rated       =:rated
			WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':daodien', $data['daodien']);
        $this->db->bind(':dienvien', $data['dienvien']);
        $this->db->bind(':khoichieu', $data['khoichieu']);
        $this->db->bind(':thoiluong', $data['thoiluong']);
        $this->db->bind(':ngonngu', $data['ngonngu']);
        $this->db->bind(':noidung', $data['noidung']);
        $this->db->bind(':trailer_url', $data['trailer_url']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':theloai', $data['theloai']);
        $this->db->bind(':rated', $data['rated']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // danh sách phim
    public function listMovie()
    {
        //  $this->db->query('SELECT movie.id,movie.title,movie.khoichieu,movie.thoiluong,movie.ngonngu,movie.category_id,movie.is_public,lichchieu.id,lichchieu.movie_id,lichchieu.ngay,lichchieu.gio FROM movie INNER JOIN lichchieu ON movie.id=lichchieu.movie_id ');
        // return $this->db->resultSet();
        $this->db->query('SELECT id,title,khoichieu,thoiluong,ngonngu,category_id,is_public FROM movie LIMIT 0,10 ');
        return $this->db->resultSet();
    }
    // lọc phim đang chiếu, sắp chiếu
    public function sortMovie($khoichieu)
    {
        $this->db->query('SELECT khoichieu,is_public FROM movie WHERE khoichieu=:khoichieu');
        $this->db->bind(':khoichieu', $khoichieu);
        return $this->db->resultSet();
    }
    // danh sách phim
    public function getListMovie()
    {
        $this->db->query('SELECT id,title FROM movie');
        return $this->db->resultSet();
    }
    public function getMovie($id)
    {
        $this->db->query('SELECT * FROM movie WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    // thêm mới hoặc sửa lịch
    public function updateCalendar($id, $ngay, $gio)
    {
        $this->db->query('UPDATE lichchieu SET movie_id=:movie_id,
			ngay=:ngay,gio=:gio WHERE id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':movie_id', $id);
        $this->db->bind(':ngay', $ngay);
        $this->db->bind(':gio', $gio);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // danh sách lịch chiếu phim
    public function getMovieByid($id)
    {
        $this->db->query('SELECT lichchieu.*,movie.id as movie_id,movie.title FROM lichchieu INNER JOIN movie ON lichchieu.movie_id=movie.id WHERE movie.id=:id');
        $this->db->bind(':id', $id);
        // lấy 1 dòng dữ liệu
        return $this->db->single();
    }
    public function delCalendar($id)
    {
        $this->db->query('DELETE FROM lichchieu WHERE movie_id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //kiểm tra tồn tại ngày giờ
    public function checkDateTime($id)
    {
        $this->db->query('SELECT movie_id,ngay,gio FROM lichchieu WHERE movie_id=:id');
        $this->db->bind(':id', $id);
        // lấy tất cả dòng dữ liệu
        return $this->db->resultSet();
    }
    
    // danh sách người dùng mua vé
    public function listOrder()
    {
        $this->db->query('SELECT booking.id as bkID,booking.*,users.id as userID,users.fullname,movie.id,movie.title FROM booking INNER JOIN users ON booking.user_id=users.id INNER JOIN movie ON booking.movie_id=movie.id ');
        // lấy tất cả dòng dữ liệu
        return $this->db->resultSet();
    }
    // xác nhận vé mua
    public function confirmOrder($id)
    {
        $this->db->query("
			UPDATE booking 
			SET confirm =:confirm 
			WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':confirm', 1);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // hủy vé mua
    public function delOrder($id)
    {
        $this->db->query("
			UPDATE booking 
			SET confirm =:confirm 
			WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':confirm', -1);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // tìm kiếm mã code của khách-> trao vé, ajax_checkcode
    public function checkCode($code)
    {
        $this->db->query('SELECT booking.id as bkID,booking.*,users.id as userID,users.fullname,movie.id,movie.title FROM booking INNER JOIN users ON booking.user_id=users.id INNER JOIN movie ON booking.movie_id=movie.id WHERE booking.code LIKE "$code%"');
        // lấy 1 dòng dữ liệu
        $this->db->resultSet();
        // kiểm tra số dòng
        if ($this->db->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }
    // sắp xếp theo phim đang chiếu hoặc sắp chiếu, ajax_sort
    public function ajax_sortMovie($cat)
    {
        $this->db->query('SELECT id,title,khoichieu,thoiluong,ngonngu,category_id,is_public FROM movie WHERE is_public=:cat LIMIT 0,10 ');
        $this->db->bind(':cat', $cat);
        return $this->db->resultSet();
    }
}
