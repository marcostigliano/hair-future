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