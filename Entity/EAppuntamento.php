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
     * @return integer
     */
    public function getCodice(){    return $this->codice;  }

    /**
     * @return integer
     */
    public function getDurata(){    return $this->durata;  }
}
?>