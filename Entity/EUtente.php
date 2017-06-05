<?php

/**
 * Created by PhpStorm.
 * User: loren
 * Date: 27/05/2017
 * Time: 16:45
 */

/**
 * Class EUtente
 */

abstract class EUtente
{
    /** @AttributeType string */
    private $nome="";
    /** @AttributeType string */
    private $cognome="";
    /** @AttributeType int */
    private $recapito;
    /** @AttributeType string */
    private $email="";
    /** @AttributeType string */
    private $password;


    public function __construct() {}
    /**
     * EUtenteLoggato constructor.
     * @param $nome
     * @param $cognome
     * @param $recapito
     * @param $email
     * @param $password
     */
    public function addUtente($nome, $cognome, $recapito, $email, $password)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->recapito = $recapito;
        $this->email = $email;
        $this->password = $password;
        $db= new FUtente();
        $db->insert($this->toArray());
        return $this;
    }

    /**
     * @return string
     */

    public function __toString()
    {
        return "$this->nome | $this->cognome | $this->recapito | $this->email | $this->password";
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $values=explode(" | ", $this);
        $values[]=$this->getTipo();
        return $values;
    }

    /**
     * @return string
     */
    public function getEmail()
    { return $this->email; }

    abstract function getTipo();
}