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
    private function ricercaServizio($nomeServizio, $prezzoServizio){
        foreach ($this->listaServizi as $item){
            if ((strtolower($item->getNome()) == strtolower($nomeServizio))
                &&
                ($item->getPrezzo() == $prezzoServizio))
            {
                return $item;
            }
        }
        return NULL;
    }

    private function ricercaServizioByCodice($id)
    {
        foreach ($this->listaServizi as $item){
            if ($item->getCodice() == $id)
            {
                return $item;
            }
        }
        return NULL;
    }

    private function update($vecchioNome)
    {
        $Caronte = new FCategoria();
        $Caronte->update($this->nome, $this->descrizione, $vecchioNome);
    }

    private function loadServizi()
    {
        $Caronte = new FServizio();
        $risultati = $Caronte->searchByCategoria($this->nome);
        foreach ($risultati as $item){
            $Servizio = new EServizio();
            $Servizio->loadByID($item);
            $this->listaServizi[] = $Servizio;
        }
    }

    //Metodi pubblici.

    /**
     * @param $nome
     * @param $descrizione
     */

    public function creaNuova($nome, $descrizione)
    {
        $Caronte = new FCategoria();
        $Caronte->insert($nome, $descrizione);
        $risultati = $Caronte->searchByNome($nome);
        $this->loadByID($risultati);
    }

    public function loadByID($risultati)
    {
        $this->nome = $risultati["nome"];
        $this->descrizione = $risultati["descrizione"];
        $this->loadServizi();
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
        $Caronte = new FServizio();
        $Caronte->updateCategoria($nome, $this->nome);
        $vecchioNome = $this->nome;
        $this->nome = $nome;
        $this->update($vecchioNome);
    }

    /**
     * @param string $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
        $this->update($this->nome);
    }
    /**
     * @param EServizio $servizio
     */
    public function aggiungiNuovoServizio($nome, $descrizione, $prezzo, $durata)
    {
        $Servizio = new EServizio();
        $Servizio->creaNuovo($nome, $descrizione, $prezzo, $durata, $this->nome);
        $this->listaServizi[] = clone $Servizio;
    }

    /**
     * @param $nomeServizio
     * @return EServizio|null
     */
    public function &ottieniServizio($nomeServizio, $prezzoServizio)
    {
        $item = $this->ricercaServizio($nomeServizio, $prezzoServizio);
        if ( !is_null($item) )
            return $item;
        else
            return NULL;
    }


    public function &ottieniServizioByCodice($id)
    {
        $item = $this->ricercaServizioByCodice($id);
        if ( !is_null($item) )
            return $item;
        else
            return NULL;
    }

    /**
     * @param $nomeServizio
     * @return int (Successo=0, Fallimento=-1)
     */
    public function eliminaServizio($nomeServizio, $prezzoServizio)
    {
        $item = $this->ricercaServizio($nomeServizio, $prezzoServizio);
        if ( !is_null($item) ){
            $daEliminare = $this->listaServizi[array_search($item, $this->listaServizi)];
            $daEliminare->rimuoviDefinitivamente();
            unset($daEliminare);
            return 0;
        }else{
            return -1;
        }
    }

    public function rimuoviDefinitivamente()
    {
        foreach ($this->listaServizi as $servizio)
        {
            $this->eliminaServizio($servizio->getNome(), $servizio->getPrezzo());
        }

        $Caronte = new FCategoria();
        $Caronte->delete($this->nome);
    }

    public function __toString()
    {
        $servizi="";
        foreach ($this->listaServizi as $item)
            $servizi=$servizi."    ".$item->__toString();
        return "Nome categoria: ".$this->nome."\nDescrizione: ".$this->descrizione."\nServizi contenuti:\n".$servizi."\n";
    }
}