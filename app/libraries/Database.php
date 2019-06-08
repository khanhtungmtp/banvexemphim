<?php
/**
 * kết nối cơ sở dữ liệu
 */
class Database
{
    private $host=DB_HOST;
    private $username=DB_USER;
    private $password=DB_PASS;
    private $dbname=DB_NAME;
    private $stmt;
    private $dbh;
    private $error;
    public function __construct()
    {
        $dsn="mysql:host=".$this->host.";dbname=".$this->dbname;
        $options= array(
            PDO::ATTR_PERSISTENT => true ,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION

        );
        try {
            $this->dbh=new PDO($dsn, $this->username, $this->password, $options);
            $this->dbh->exec("set names utf8");
        } catch (PDOException $e) {
            $this->error=$e->getMessage();
            echo $this->error;
        }
    }
    // chuẩn bị sql
    public function query($sql)
    {
        $this->stmt=$this->dbh->prepare($sql);
    }
    // bind values
    public function bind($param, $value, $type=null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type=PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                    $type=PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // thực thi sql
    public function execute()
    {
        return $this->stmt->execute();
    }
    // lấy 1 dòng dữ liệu trong bảng
    public function single()
    {
        // gọi hàm thực thi
        $this->execute();
        // lấy 1 dòng dữ liệu
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // lấy tất cả dữ liệu trong bảng
    public function resultSet()
    {
        // gọi hàm thực thi
        $this->execute();
        // lấy tất cả dữ liệu trong bảng
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
    // trả về số dòng
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
