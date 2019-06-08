<?php

/**
 *
 */
class Core
{
    protected $currentController = 'index';
    protected $currentMethod = 'index';
    protected $params = [];

    function __construct()
    {
        $url = $this->getUrl();
        //print_r($url);
        //look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // chuyển những chữ cái đầu tiên của mỗi từ trong chuỗi thành chữ in hoa
            $this->currentController = ucwords($url[0]);

            // xóa khỏi mảng     == để phương thức sử dụng mảng 3 trở đi
            unset($url[0]);
        }
        // requeid the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // khởi tạo class controller
        $this->currentController = new $this->currentController;
        // kiểm tra method
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                
                // xóa khỏi mảng
                unset($url[1]);
            }
        }
        // Hàm array_values() sẽ trả về một mảng liên tục bao gồm các giá trị của mảng được truyền vào.
        // Nói cách khác hàm sẽ chuyển từ key tự tạo sang key 0,1,2,3
        $this->params=$url ? array_values($url) : [];
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);


    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // loại bỏ khoảng trắng dư thừa ở cuối
            $url = rtrim($_GET['url'], '/');
            // lọc và xóa đi những ký tự trùng khớp
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // chuyển một chuỗi thành một mảng
            $url = explode('/', $url);
            return $url;
        }

    }
}

?>