<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 29/05/17
 * Time: 22.57
 */
class ECatalogoAppuntamenti
{
    private $catalogo = [];

    /**
     * ECatalogoAppuntamenti constructor.
     */
    public function __construct(){
        $db = new FAppuntamento();
        $result = $db->search(date('Y-m-d'));
        $appuntamento = new EAppuntamento();
        foreach ($result as $row){
            $this->catalogo[] = $appuntamento->loadByValori($row);
        }
    }

    /**
     * @param string $utente
     * @return array
     * metodo che riceve una stringa rappresentante l'email di un utente (attributo identificativo)
     *  e restituisce tutti gli appuntamenti a lui associati
     */
    public function searchAppuntamentoByUtente($utente){
        $result = array();
        foreach ($this->catalogo as $appuntamento){
            if($appuntamento->getUtente() == $utente)
                $result[] = $appuntamento;
        }
        return $result;
    }

    /**
     * @return array
     * metodo che restituisce tutti gli appuntamenti della data corrente
     */
    public function searchAppuntamentoOdierno(){
        $result = array();
        foreach ($this->catalogo as $appuntamento) {
            if($appuntamento->getData() == date('Y-m-d'))
                $result[] = $appuntamento;
        }
        return $result;
    }


    /**
     * @param $data
     * @return array
     * metodo che riceve una data in formato 'Y-m-d' e restituisce tutti gli appuntamenti associati ad essa associati
     */
    public function searchAppuntamentoByData($data){
        $result = array();
        foreach ($this->catalogo as $appuntamento){
            if($appuntamento->getData() == $data)
                $result[] = $appuntamento;
        }
        return $result;
    }

    /**
     * @param $codice
     * @return bool|mixed
     * metodo che riceve un codice di un appuntamento e lo restituisce, se esiste
     */
    public function searchAppuntamentoByCodice($codice){
        foreach ($this->catalogo as $appuntamento){
            if($appuntamento->getCodice() == $codice)
                return $appuntamento;
        }
        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = '';
        foreach ($this->catalogo as $appuntamento){
            $result += print($appuntamento) . ".<br>";
        }
        return $result;
    }

}