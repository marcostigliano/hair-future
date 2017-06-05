<?php

/**
 * Created by PhpStorm.
 * User: loren
 * Date: 05/06/2017
 * Time: 15:18
 */
class FUtente extends FDb
{

    /**
     * FUtente constructor.
     */

     public function __construct()
    {
        parent::__construct(); //connessione al database
    }

    /**
     * @param $values
     */

    public function insert($values)
    {
        $this->sql =
            $this->con->prepare("INSERT INTO Utente(nome, cognome, recapito, email, password, tipo)
                                 VALUES (?,?,?,?,?,?)");
        parent::query($values);
    }


}