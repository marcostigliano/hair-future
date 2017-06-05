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


}