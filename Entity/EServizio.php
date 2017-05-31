<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/05/17
 * Time: 21.01
 */
require_once "EDenaro.php";

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

    /**
     * @return string
     */
    private function generaCodice()
    {
        return str_shuffle(date("Y").(date("n")+date("i")).(date("j")+date("s")).strtoupper(substr(str_shuffle(strtr($this->getNome()," ", "x")), 0, 4)));
    }

//Metodi pubblici.

    /**
     * @param $nome
     * @param $descrizione
     * @param $prezzo
     * @param $durata
     */

    function creaNuovo($nome, $descrizione, $prezzo, $durata)
    {
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->durata = $durata;
        $this->codice = $this->generaCodice();
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
    }

    /**
     * @param string $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @param $prezzo
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @param $durata
     */
    public function setDurata( $durata)
    {
        $this->durata = $durata;
    }

}