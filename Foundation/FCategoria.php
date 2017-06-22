<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 21/06/17
 * Time: 12.17
 */
class FCategoria extends FDb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function searchByNome($nome)
    {
        $this->sql = $this->con->prepare("SELECT *
                      FROM Categoria WHERE nome=?");

        return parent::searchById(array($nome));
    }

    public function searchAll()
    {
        $this->sql = $this->con->prepare("SELECT *
                      FROM Categoria");
        return parent::searchAll();
    }

    public function insert($nomeCategoria, $descrizioneCategoria)
    {
        $this->sql =
            $this->con->prepare("INSERT INTO Categoria(nome, descrizione)
                                 VALUES (?,?)");
        parent::query(array($nomeCategoria, $descrizioneCategoria));

    }

    public function update($nomeCategoriaNuovo, $descrizioneCategoriaNuova, $nomeCategoriaVecchio)
    {
        $this->sql = $this->con->prepare("UPDATE Categoria
                     SET nome = ?,
                         descrizione = ?
                     WHERE nome = ?;");
        parent::query(array($nomeCategoriaNuovo, $descrizioneCategoriaNuova, $nomeCategoriaVecchio));
    }

    public function delete($codice)
    {
        $this->sql = $this->con->prepare("DELETE FROM Categoria WHERE nome = ?;");
        parent::query(array($codice));
    }
}