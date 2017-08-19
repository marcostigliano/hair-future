<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/05/17
 * Time: 21.01
 */

class EServizio
{
//Attributi e metodi privati.

    /**
     * @var string
     */
    private $codice="";

    /**
     * @var string
     */
    private $nome="";

    /**
     * @var string
     */
    private $descrizione="";

    /**
     * @var float
     */
    private $prezzo=0.0;

    /**
     * @var int
     */
    private $durata=0;


    private function updateAttributi()
    {
        $Caronte = new FServizio();
        $Caronte->updateAttributi($this->nome, $this->descrizione, $this->prezzo, $this->durata, $this->codice);
    }
//Metodi pubblici.

    /**
     * @param $nome
     * @param $descrizione
     * @param $prezzo
     * @param $durata
     * @param $nomeCategoria
     */

    public function creaNuovo($nome, $descrizione, $prezzo, $durata, $nomeCategoria)
    {
        $Caronte = new FServizio();
        $Caronte->insert($nome, $descrizione, $prezzo,
                $durata, $nomeCategoria);
        $risultati = $Caronte->searchByNomePrezzo($nome, $prezzo);
        $this->loadByID($risultati);
    }

    /**
     * @param $risultati
     */
    public function loadByID($risultati)
    {
        $this->codice = $risultati['codice'];
        $this->nome = $risultati['nome'];
        $this->descrizione = $risultati['descrizione'];
        $this->prezzo = $risultati['prezzo'];
        $this->durata = $risultati['durata'];
    }

//Tutti i GET.

    /**
     * @return string
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @return int
     */
    public function getDurata()
    {
        return $this->durata;
    }

    /**
     * @return float
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

//Tutti i SET.

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        $this->updateAttributi();
    }

    /**
     * @param string $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
        $this->updateAttributi();
    }

    /**
     * @param $prezzo
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
        $this->updateAttributi();
    }

    /**
     * @param $durata
     */
    public function setDurata($durata)
    {
        $this->durata = $durata;
        $this->updateAttributi();
    }

    public function rimuoviDefinitivamente()
    {
        $Caronte = new FServizio();
        $Caronte->delete($this->codice);
    }

    public function __toString()
    {
        return "Nome servizio: ".$this->nome.", Codice: ".$this->codice.", Descrizione  ".$this->descrizione.", Prezzo: ".$this->prezzo.", Durata: ".$this->durata."\n";
    }
}