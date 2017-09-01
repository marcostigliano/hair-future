<?php

/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 13.02
 */
class EAppuntamento{
    /** @AttributeType int */
    private $codice;
    /** @AttributeType date */
    private $data;
    /** @AttributeType time */
    private $ora;
    /** @AttributeType int */
    private $durata;
    /** @AttributeType float */
    private $costo;
    /**
     * @AssociationType Entity.EUtente
     * @AssiociationMultiplicity 1
     */
    private $utente;
    /**
     * @AssociationType Entity.ECatalogoServizi
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    private $listaServizi;

    private function calcolaDurataCostoAppuntamento()
    {
        $this->durata = 0;
        $this->costo = 0;
        foreach ($this->listaServizi as $temp)
        {
            $this->durata += $temp->getDurata();
            $this->costo += $temp->getPrezzo();
        }
    }

    /**
     * EAppuntamento constructor.
     */

    public function __construct()
    {}

    /**
     * @param array $load
     * @return EAppuntamento
     * metodo che riceve un array che permette l'inizializzazione di un appuntamento
     */
    public function loadByValori($load){
        $this->durata = 0;
        $this->costo = 0;
        $this->codice = $load['codice'];
        $this->data = $load['data'];
        $this->ora = $load['ora'];
        $this->utente = EGestoreUtenti::ottieniUtenteByID($load['utente']);
        $service = new ECatalogoServizi();
        $arrayCodiciServizi = explode('|', $load['listaServizi']);
        foreach ($arrayCodiciServizi as $servizio) {
            $temp = $service->ottieniServizioByCodice($servizio);
            $this->listaServizi[] = $temp;
            $this->durata += $temp->getDurata();
            $this->costo += $temp->getPrezzo();
        }
        return $this;
    }

    /**
     * @param array $values
     * @return int
     * metodo che riceve una stringa che rappresenta l'utente (email) e una lista di servizi
     * e prepara la creazione di un nuovo appuntamento (o una sua modifica) calcolando durata e prezzo complessivi
     */
    public function sceltaServizi($utente, $servizi){
        $this->utente = EGestoreUtenti::ottieniUtenteByID($utente);
        $this->durata = 0;
        $this->costo = 0;
        foreach ($servizi as $servizio){
            $temp = $servizio;
            $this->listaServizi[] = $temp;
            $this->durata += $temp->getDurata();
            $this->costo += $temp->getPrezzo();
        }
        return $this->durata;
    }

    /**
     * @return array
     * metodo che prepara un array sulla base degli attributi di un appuntamento
     */
    private function __toArray(){
        $load[0] = $this->data;
        $load[1] = $this->ora;
        $load[2] = $this->durata;
        $load[3] = $this->costo;
        $load[4] = $this->utente->getEmail();
        $load[5] = array();
        foreach ($this->listaServizi as $servizio)
            $load[5][] = $servizio->getCodice();
        $load[5] = implode('|', $load[5]);
        return $load;
    }

    /**
     * metodo che invia una richiesta al livello foundation di aggiungere un nuovo appuntamento
     */
    public function addAppuntamento($data, $ora){
        $this->data = $data;
        $this->ora = $ora;
        $db = new FAppuntamento();
        return $db->insert($this->__toArray());
    }

    /**
     * metodo che invia una richiesta al livello foundation di modificare un appuntamento
     */
    public function updateAppuntamento($data, $ora){
        $this->data = $data;
        $this->ora = $ora;
        $load = $this->__toArray();
        $load[6] = $this->codice;
        $db = new FAppuntamento();
        return $db->update($load);
    }

    /**
     * metodo che invia una richista al livello foundation di eliminare un appuntamento
     */
    public function deleteAppuntamento(){
        $db = new FAppuntamento();
        return $db->delete($this->codice);
    }

    /**
     * @return integer
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * @return integer
     */
    public function getDurata()
    {
        return $this->durata;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @return mixed
     */
    public function getOraInizio()
    {
        return $this->ora;
    }

    /**
     * @return mixed
     */
    public function getUtente()
    {
        return $this->utente;
    }

    /**
     * @return mixed
     */
    public function getOraFine()
    {
        $selectedTime = $this->ora;
        $endTime = strtotime($selectedTime) + (($this->durata)*60);
        return date('H:i:s', $endTime);
    }

    public function __toString()
    {
        $string = "Appuntamento del: " . $this->data . ' alle ' . $this->ora .
            ' prenotato da ' . $this->utente->getEmail() . ".";
        return $string;
    }

}
?>