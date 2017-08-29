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

    public function searchById($email)
    {
        $this->sql = $this->con->prepare("SELECT *
                      FROM Utente
                      WHERE email=?;");
        $result= parent::searchById(array($email));
        return $result;
    }

    public function update($values){
        $this->sql = $this->con->prepare("UPDATE Utente
                     SET nome = ?,
                         cognome = ?,
                         recapito = ?,
                         email = ?,
                         password = ?
                     WHERE email = ?;");
        parent::query($values);
    }

    public function search($email)
    {
        $this->sql = $this->con->prepare("SELECT *
                      FROM Utente
                      WHERE email=?;");
        return parent::search(array($email));
    }

    public function delete($email){
        $this->sql = $this->con->prepare("DELETE FROM Utente
                                          WHERE email=?;");

        parent::query(array($email));
    }

}