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

class EDirettore extends EUtente
{

    function getTipo()
    {
        return "Direttore";
    }

    public function creaServizio($nome, $descrizione, $prezzo, $durata, $categoriaInCuiAllocarlo)
    {
        $catalogoServizi = new ECatalogoServizi();
        $catalogoServizi->aggiungiNuovoServizio($nome, $descrizione, $prezzo, $durata, $categoriaInCuiAllocarlo);
    }

    public function modificaServizio($id, $nome, $descrizione, $prezzo, $durata)
    {
        $catalogoServizi = new ECatalogoServizi();
        $servizio = $catalogoServizi->ottieniServizioByCodice($id);
        $servizio->modificaAttributi($nome, $descrizione, $prezzo, $durata);
    }

    public function eliminaServizio($id)
    {
        $catalogoServizi = new ECatalogoServizi();
        $catalogoServizi->rimuoviServizio($id);
    }

    public function creaCategoria($nome, $descrizione)
    {
        $catalogoServizi = new ECatalogoServizi();
        $catalogoServizi->aggiungiNuovaCategoria($nome, $descrizione);
    }

    public function modificaCategoria($vecchioNome, $nuovoNome, $nuovaDescrizione)
    {
        $catalogoServizi = new ECatalogoServizi();
        $categoria = $catalogoServizi->ottieniCategoria($vecchioNome);
        $categoria->modificaAttributi($nuovoNome, $nuovaDescrizione);
    }

    public function eliminaCategoria($nome)
    {
        $catalogoServizi = new ECatalogoServizi();
        $catalogoServizi->rimuoviCategoria($nome);
    }

    //fatti per conto di un cliente
    public function prenotaAppuntamento($email, $listaServizi, $data, $ora)
    {
        parent::prenotaAppuntamento($email, $listaServizi, $data, $ora);
    }

    public function modificaAppuntamento($id, $data, $ora, $email)
    {
        return parent::modificaAppuntamento($id, $data, $ora, $email);
    }

    public function cancellaAppuntamento($id, $email)
    {
        parent::cancellaAppuntamento($id, $email);
    }
}