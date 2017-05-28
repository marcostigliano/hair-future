<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/05/17
 * Time: 21.01
 */
class EServizio
{
    private $codice="";
    private $nome="";
    private $descrizione="";
    private $prezzo;
    private $durata;

    /**
     * @return string
     */
    private function generaCodice(){
        return date("Y").(date("n")+date("i")).(date("j")+date("s")).substr(str_shuffle(strtr($this->getNome()," ", "x")), 0, 4);
    }

    /**
     * Servizio constructor.
     * @param $nome
     * @param $descrizione
     * @param $prezzo
     * @param DateInterval $durata
     * @param $codice
     */
    function __construct($nome, $descrizione, $prezzo,DateInterval $durata, $codice)
    {
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->durata = $durata;
        if ($codice != NULL){
            $this->codice = $codice;
        }else{
            $this->codice = $this->generaCodice();
        }
    }

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
     * @return mixed
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * @return DateInterval
     */
    public function getDurata()
    {
        return $this->durata;
    }

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
     * @param mixed $prezzo
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @param DateInterval $durata
     */
    public function setDurata(DateInterval $durata)
    {
        $this->durata = $durata;
    }

}