<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 28/05/17
 * Time: 18.02
 */
class FAppuntamento extends FDb{

    public function __construct(){
        parent::__construct();
    }

    /**
     * @param string $codice
     * @return array
     */
    public function search($id)
    {
        $this->sql = $this->con->prepare("SELECT *
                      FROM Appuntamento
                      WHERE codice=?;");
        return parent::search(array($id));
    }

    /**
     * @param array $values
     */
    public function insert($values)
    {
        $this->sql = $this->con->prepare("INSERT INTO Appuntamento(data, ora, durata, costo, utente, listaServizi)
                      VALUES (?,?,?,?,?,?)");
        parent::query($values);
    }

    /**
     * @param array $values
     */
    public function update($values){
        $this->sql = $this->con->prepare("UPDATE Appuntamento
                     SET data = ?,
                         ora = ?,
                         durata = ?,
                         costo = ?,
                         utente = ?,
                         listaServizi = ?
                     WHERE codice = ?;");
        parent::query($values);
    }

    /**
     * @param string $codice
     */
    public function delete($codice){
        $this->sql = $this->con->prepare("DELETE FROM Appuntamento WHERE codice=?;");
        parent::query(array($codice));
    }

}
