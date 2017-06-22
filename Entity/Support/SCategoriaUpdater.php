<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 22/06/17
 * Time: 10.21
 */
class SCategoriaUpdater
{
    private $categoria;

    public function __construct(&$categoria)
    {
        $this->categoria = $categoria;
    }

    public function setNome($nome)
    {
        $this->categoria->setNome($nome);
    }

    public function setDescrizione($descrizione)
    {
        $this->categoria->setDescrizione($descrizione);
    }
}