<?php


class SqlOperate
{
    private $host='localhost';
    private $user="root";
    private $password="123456";
    private $database='test';
    private $mysqli;
    private $res;
    public function __construct()
    {
        $this->mysqli=mysqli_connect($this->host,$this->user,$this->password,$this->database);
//        $res=$mysqli->query("select * from user_info");
//        $data=$res->fetch_row();
    }
    public function Get($sql){
        $this->res=$this->mysqli->query($sql);
        $arr=array();
        while($data=$this->res->fetch_assoc()) {
            $arr[]=$data;
        }
        return $arr;
        mysqli_free_result($this->res);

    }
    public function Copy($sql){
        $this->res=$this->mysqli->query($sql);
        if($this->res) return 1;
        else return 0;
    }
    public function close(){
        $this->mysqli->close();
    }
}

?>