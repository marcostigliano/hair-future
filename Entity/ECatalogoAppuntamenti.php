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
        $result = $db->search("CURRENT_DATE");
        foreach ($result as $row){
            $appuntamento = new EAppuntamento();
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
            if($appuntamento->getUtente()->getEmail() == $utente)
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
            $result = $result. $appuntamento->__toString() . "\n";
        }
        return $result;
    }

    public function prenotaAppuntamento($email, $listaServizi, $data, $ora)
    {
        $appuntamento = new EAppuntamento();
        $appuntamento->sceltaServizi($email, $listaServizi);
        $appuntamento->addAppuntamento($data, $ora);
    }

    public function modificaAppuntamento($id, $data, $ora, $email)
    {
        $appuntamenti = $this->searchAppuntamentoByUtente($email);
        foreach ($appuntamenti as $appuntamento)
        {
            if ($appuntamento->getCodice() == $id)
            {
                $appuntamento->updateAppuntamento($data, $ora);
                return 0;
            }
        }
        return -1;
    }

    public function cancellaAppuntamento($id, $email)
    {
        $appuntamenti = $this->searchAppuntamentoByUtente($email);
        foreach ($appuntamenti as $appuntamento) {
            if ($appuntamento->getCodice() == $id)
                $appuntamento->deleteAppuntamento();
        }
    }

    /**
     * @param $data
     * @param $ora
     * @param $listaServizi
     * @return int
     *
     * metodo che riceve una data in formato 'Y-m-d', e l'ora in formato 'H:i:s'
     */
    public function controllaPossibilitàPrenotazione($data, $ora, $listaServizi)
    {
        $startTime = strtotime($data." ".$ora);
        $durata = 0;
        foreach ($listaServizi as $servizio)
        {
            $durata += $servizio->getDurata();
        }

        $endTime = $startTime + (($durata)*60);
        $listaAppuntamenti = $this->searchAppuntamentoByData($data);
        foreach ($listaAppuntamenti as $appuntamento)
        {
            $oraInizioTemp = strtotime($data." ".$appuntamento->getOraInizio());
            $oraFineTemp = strtotime($data." ".$appuntamento->getOraFine());

            print "".$oraInizioTemp." ".$oraFineTemp."    ".$startTime." ".$endTime."\n";

            if (((($startTime <= $oraInizioTemp) && ($endTime >= $oraFineTemp)) ||
                (($startTime <= $oraInizioTemp) && (($endTime <= $oraFineTemp) && ($endTime >= $oraInizioTemp))) ||
                ((($startTime >= $oraInizioTemp) && ($startTime <= $oraFineTemp)) && ($endTime >= $oraFineTemp)) ||
                (($startTime >= $oraInizioTemp) && ($endTime <= $oraFineTemp))))
            {
                return -1;
            }
        }
        return 0;
    }
}