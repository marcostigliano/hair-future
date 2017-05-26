<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 19.14
 */
class FDb{
    private $con;
    private $_result;

    public function __construct(){
        global $config;
        try {
            $this->con = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . ".<br/>";
            die();
        }
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->con = null;
    }

    public function query($sql){
        $this->_result = $this->con->query($sql);
        if(!$this->_result){    return false;  }
        else{   return true;    }
    }


}