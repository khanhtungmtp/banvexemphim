<?php 

/**
 * 
 */
class Session
{
	// khởi tạo session
	public static function init()
	{
		session_start();
	}
	// đặt tên session
	public static function setSession($key,$value)
	{
		$_SESSION[$key]=$value;
	}
	// trả về session
	public static function getSession($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	// kiểm tra session
	public function checkSession()
	{
		// khởi tạo session
		self::init();
		if (self::getSession("admin") == false ) {
			self::destroy();
			redirect('index/login');
		}
	}

	// hủy session
	public function destroy()
	{
		session_destroy();
	}
}