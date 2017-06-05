<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 19.14
 */
class FDb{
    protected $con;
    protected $_result;
    protected $sql;

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

    /**
     * @param string $codice
     * @return array
     */
    public function search($values){
        $this->sql->execute($values);
        $this->_result = $this->sql->fetchAll();
        return $this->_result;
    }

    /**
     * @param array $values
     */
    public function query($values){
        $this->sql->execute($values);
    }

}
