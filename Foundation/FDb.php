<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 19.14
 */
class FDb{
    private $con;

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

    public function search(){
        
        $sql = "SELECT codice FROM Appuntamento WHERE codice = '0001'";
        $result = $this->con->query($sql);
        return $result->fetchAll();
    }
}