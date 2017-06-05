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
    private $listaServizi;

    /**
     * EAppuntamento constructor.
     */
    public function __construct(){
        $this->durata = 0;
        $this->costo = 0;
    }

    /**
     * @param array $load
     * @return EAppuntamento
     */
    public function loadByValori($load){
        $this->codice = $load['codice'];
        $this->data = $load['data'];
        $this->ora = $load['ora'];
        $this->durata = $load['durata'];
        $this->costo = $load['costo'];
        $this->utente = $load['utente'];
        $service = new EServizio();
        foreach (explode(',', $load['listaServizi']) as $servizio) {
            $this->listaServizi = $service->loadByID($servizio);
        }
        return $this;
    }

    /**
     * @param array $values
     * @return int
     */
    public function sceltaServizi($values){
        $this->utente = $values[0];
        $service = new EServizio();
        foreach ($values[1] as $servizio){
            $this->listaServizi = $service->loadByID($servizio);
            $this->durata += $service->getDurata();
            $this->costo += $service->getPrezzo();
        }
        return $this->durata;
    }

    /**
     * @return array
     */
    private function prepare(){
        $load[0] = $this->data;
        $load[1] = $this->ora;
        $load[2] = $this->durata;
        $load[3] = $this->costo;
        $load[4] = $this->utente;
        $load[5] = implode(',', $this->listaServizi['codice']);
        return $load;
    }

    /**
     *
     */
    public function addAppuntamento($data, $ora){
        $this->data = $data;
        $this->ora = $ora;
        $db = new FAppuntamento();
        return $db->insert($this->prepare());
    }

    /**
     *
     */
    public function updateAppuntamento($data, $ora){
        $this->data = $data;
        $this->ora = $ora;
        $load = $this->prepare();
        $load[6] = $this->codice;
        $db = new FAppuntamento();
        return $db->update($load);
    }

    /**
     *
     */
    public function deleteAppuntamento(){
        $db = new FAppuntamento();
        return $db->delete($this->codice);
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