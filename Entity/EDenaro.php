<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/05/17
 * Time: 19.33
 */
class EDenaro
{
    private $valuta="";
    private $valore=0.0;

    function __construct($valore, $valuta)
    {
        $this->valuta=$valuta;
        $this->valore=$valore;
    }

    /**
     * @return string
     */
    public function getValuta()
    {
        return $this->valuta;
    }

    /**
     * @return float
     */
    public function getValore()
    {
        return $this->valore;
    }

    /**
     * @param string $valuta
     */
    public function setValuta($valuta)
    {
        $this->valuta = $valuta;
    }

    /**
     * @param float $valore
     */
    public function setValore($valore)
    {
        $this->valore = $valore;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->valore." ".$this->valuta;
    }

    /**
     * @param EDenaro $denaro
     */
    public function Somma(EDenaro $denaro){
        if ($denaro->getValuta()==$this->valuta){
            $this->valore+=$denaro->getValore();
        }
    }

    /**
     * @param EDenaro $denaro
     */
    public function Differenza(EDenaro $denaro){
        $this->Somma(new EDenaro($denaro->getValuta(), -$denaro->getValore()));
    }
}