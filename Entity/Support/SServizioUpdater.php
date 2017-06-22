<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 22/06/17
 * Time: 10.33
 */
class SServizioUpdater
{
    private $servizio;

    public function __construct(&$servizio)
    {
        $this->servizio = $servizio;
    }

    public function setNome($nome)
    {
        $this->servizio->setNome($nome);
    }

    public function setDescrizione($descrizione)
    {
        $this->servizio->setDescrizione($descrizione);
    }

    public function setPrezzo($prezzo)
    {
        $this->prezzo->setPrezzo($prezzo);
    }

    public function setDurata($durata)
    {
        $this->durata->setDurata($durata);
    }
}