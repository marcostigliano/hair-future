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
        $this->setEmail($email);
        $this->password = $password;
        return $this;
    }

    public function addUtenteDB($nome, $cognome, $recapito, $email, $password)
    {
        $this->addUtente($nome, $cognome, $recapito, $email, $password);
        $db= new FUtente();
        $db->insert($this->__toArray());
        return $this;
    }

    public function loadByID1($email)
    {
        $db= new FUtente();
        $db=$db->searchById($email);
        $user=0;
        if ($db['tipo']='cliente') $user=new ECliente();
        elseif ($db['tipo']='parrucchiere') $user=new EParrucchiere();
        elseif ($db['tipo']='direttore') $user=new EDirettore();
        $user->nome=$db['nome'];
        $user->cognome=$db['cognome'];
        $user->recapito=$db['recapito'];
        $user->email=$db['email'];
        $user->password=$db['password'];
        return $user;

    }

    public function updateUtente($nome, $cognome, $recapito, $email, $password)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->recapito = $recapito;
        $this->email = $email;
        $this->password = $password;
        $load = $this->__toArray();
        $load[4] = $this->email;
        $db = new FAppuntamento();
        return $db->update($load);
    }

    public function loadByID($email)
    {
        $db= new FUtente();
        $db=$db->search($email);
        return $db[0];
    }


    public function deleteUtente()
    {
        $db = new FUtente();
        return $db->delete($this->getEmail());
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
    public function __toArray()
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

    // per gestire le particolarità di un'email
    public function setEmail($email)
    { $this->email=$email; }

    abstract function getTipo();

    public function prenotaAppuntamento($utentedaprenotare,$data,$ora)
    {
        $app=new EAppuntamento();

        if ($this->getTipo()=='Cliente')
            $utente=$this;
        else $utente=$this->loadByID($utentedaprenotare);
        $app->addAppuntamento($data,$ora);
    }

    public function visualizzaServizio($nome, $prezzo)
    {
        $cs= new ECatalogoServizi();
        $cs->ottieniServizio($nome, $prezzo);
    }
}