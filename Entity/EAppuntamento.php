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
     * @AssociationType Entity.EServizio
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    private $listaServizi = array();

    /**
     * EAppuntamento constructor.
     */
    public function __construct(){

    }

    /**
     * @param string $codice
     */
    public function loadByCodice($codice){
        $db = new FAppuntamento();
        $load = $db->search($codice);
        $this->codice = $load[0]['codice'];
        $this->data = $load[0]['data'];
        $this->ora = $load[0]['ora'];
        $this->durata = $load[0]['durata'];
        $this->costo = $load[0]['costo'];
        $this->utente = $load[0]['utente'];
        $this->listaServizi = explode(',', $load[0]['listaServizi']);
    }

    /**
     * @return array
     */
    private function prepare(){
        $load[0] = $this->codice;
        $load[1] = $this->data;
        $load[2] = $this->ora;
        $load[3] = $this->durata;
        $load[4] = $this->costo;
        $load[5] = $this->utente;
        $load[6] = implode(',', $this->listaServizi);
        return $load;
    }

    /**
     *
     */
    public function aggiungiAppuntamento(){
        $load = $this->prepare();
        $db = new FAppuntamento();
        $db->insert($load);
    }

    /**
     *
     */
    public function modificaAppuntamento(){
        $load = $this->prepare();
        $load[7] = $this->codice;
        $db = new FAppuntamento();
        $db->update($load);
    }

    /**
     *
     */
    public function eliminaAppuntamento(){
        $db = new FAppuntamento();
        $db->delete($this->codice);
    }

    /**
     * @return integer
     */
    public function getCodice(){    return $this->codice;  }

    /**
     * @return integer
     */
    public function getDurata(){    return $this->durata;  }


}
?>