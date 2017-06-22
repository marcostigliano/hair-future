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
     * @param $id
     * @return array associativo corrispondente alla tupla cercata dove le chiavi corrispondono
     *                  ai nomi degli attributi della tabella nel db in cui è contenuta
     */
    public function searchById($id){
        $this->sql->execute($id);
        $this->_result = $this->sql->fetch(PDO::FETCH_ASSOC); //mi mette in un array i risultati della query
        return $this->_result;
    }

    /**
     * @param $values
     * @return array  di array associativi corrispondenti alle tuple cercate dove le chiavi corrispondono
     *                  ai nomi degli attributi della tabella nel db in cui è contenuta
     */
    public function search($values){
        $this->sql->execute($values);
        $this->_result = $this->sql->fetchAll(PDO::FETCH_ASSOC); //mi mette in un array i risultati della query
        return $this->_result;
    }

    /**
     * @param array $values
     */
    public function query($values){
        $this->sql->execute($values);
    }

}
