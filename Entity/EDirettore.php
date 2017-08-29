<?php

/**
 * Created by PhpStorm.
 * User: loren
 * Date: 02/06/2017
 * Time: 17:12
 */

/**
 * Class EDirettore
 */

class EDirettore extends Eutente
{

    public function getTipo()
    {
        return "Direttore";
    }

    public function creaCategoria($nome, $descrizione)
    {
        $cs=new ECatalogoServizi();
        $cs->aggiungiNuovaCategoria($nome, $descrizione);
    }
    public function creaServizio($nome, $descrizione, $prezzo, $durata, $categoria)
    {
        $cs=new ECatalogoServizi();
        $cs->aggiungiNuovoServizio($nome, $descrizione, $prezzo, $durata, $categoria);
    }
    public function rimuoviServizio($nome,$prezzo) //perché serve anche il prezzo??
    {
        $cs=new ECatalogoServizi();
        $cs->rimuoviServizio($nome,$prezzo);
    }
    public function rimuoviCategoria($nome)
    {
        $cs=new ECatalogoServizi();
        $cs->rimuoviCategoria($nome);
    }

}