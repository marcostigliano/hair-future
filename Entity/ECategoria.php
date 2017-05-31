<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/05/17
 * Time: 21.16
 */
require_once "EServizio.php";

class ECategoria
{
    //Attributi e metodi privati.

    /**
     * @var string
     */
    private $nome="";

    /**
     * @var string
     */
    private $descrizione="";

    /**
     * @var array
     */
    private $listaServizi=array();

    /**
     * Riceve in input una stringa e restituisce il servizio trovato.
     * La formattazione della stringa non è case-sensitive.
     * @param $nomeServizio
     * @return mixed|null
     */
    private function ricercaServizio($nomeServizio){
        foreach ($this->listaServizi as $item){
            if (strtolower($item->getNome())==strtolower($nomeServizio)){
                return $item;
            }
        }
        return NULL;
    }

    //Metodi pubblici.

    /**
     * @param $nome
     * @param $descrizione
     */

    function CreaNuova($nome, $descrizione)
    {
        $this->nome=$nome;
        $this->descrizione=$descrizione;
    }

//Tutti i GET.

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
     * @param EServizio $servizio
     */
    public function aggiungiServizio(EServizio $servizio){
        $this->listaServizi[] = $servizio;
    }

    /**
     * @param $nomeServizio
     * @return EServizio|null
     */
    public function ottieniServizio($nomeServizio){
        $item = $this->ricercaServizio($nomeServizio);
        if ( !is_null($item) )
            return new EServizio($item->getNome(), $item->getDescrizione(), $item->getPrezzo(), $item->getDurata(), $item->getCodice());
        else
            return NULL;
    }

    /**
     * @param $nomeServizio
     * @return int (Successo=0, Fallimento=-1)
     */
    public function eliminaServizio($nomeServizio){
        $item = $this->ricercaServizio($nomeServizio);
        if ( !is_null($item) ){
            unset($this->listaServizi[array_search($item, $this->listaServizi)]);
            return 0;
        }else{
            return -1;
        }
    }
}