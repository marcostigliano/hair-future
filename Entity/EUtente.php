<?php

/**
 * Created by PhpStorm.
 * User: lorenza
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

    /**
     * EUtenteLoggato constructor.
     * @param $nome
     * @param $cognome
     * @param $recapito
     * @param $email
     * @param $password
     */
    function __construct($nome, $cognome, $recapito, $email, $password)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->recapito = $recapito;
        $this->email = $email;
        $this->password = $password;
    }

    function __toString()
    {
        return "Nome: $this->nome ";
    }

    abstract function getTipo();
}