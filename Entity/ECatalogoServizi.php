<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 21/06/17
 * Time: 19.23
 */
class ECatalogoServizi
{
    /**
     * @var array
     */
    private $listaCategorie = array();

    /**
     * @param $nomeCategoria
     * @return mixed|null
     */
    private function &ricercaCategoria($nomeCategoria)
    {
        foreach ($this->listaCategorie as $categoria)
        {
            if ($categoria->getNome()==$nomeCategoria)
            {
                return $categoria;
            }
        }
        return null;
    }

    /**
     * ECatalogoServizi constructor.
     */
    public function __construct()
    {
        $Caronte = new FCategoria();
        $risultati = $Caronte->searchAll();
        foreach ($risultati as $dati)
        {
            $Categoria = new ECategoria();
            $Categoria->loadByID($dati);
            $this->listaCategorie[] = $Categoria;
        }
    }

    /**
     * @param $nome
     * @param $descrizione
     * @param $prezzo
     * @param $durata
     * @param $categoriaInCuiAllocarlo
     * @return 0: successo, -1:fallimento
     */
    public function aggiungiNuovoServizio($nome, $descrizione, $prezzo, $durata, $categoriaInCuiAllocarlo)
    {
        $categoria = $this->ricercaCategoria($categoriaInCuiAllocarlo);
        if (!is_null($categoria))
        {
            $categoria->aggiungiNuovoServizio($nome, $descrizione, $prezzo, $durata);
            return 0;
        }
        else
            return -1;
    }

    /**
     * @param $nome
     * @param $descrizione
     */
    public function aggiungiNuovaCategoria($nome, $descrizione)
    {
        $categoria = new ECategoria();
        $categoria->creaNuova($nome, $descrizione);
    }

    /**
     * @param $nome
     * @param $prezzo
     * @return 0: successo, -1:fallimento
     */
    public function rimuoviServizio($nome, $prezzo)
    {
        foreach ($this->listaCategorie as $item)
        {
            $controllo = $item->eliminaServizio($nome, $prezzo);
            if ($controllo!=-1)
            {
                return 0;
            }
        }
        return -1;
    }

    /**
     * @param $nome
     * @return int 0: successo, -1:fallimento
     */
    public function rimuoviCategoria($nome)
    {
        $categoria = $this->ricercaCategoria($nome);
        if ($categoria!=null)
        {
            $categoria->rimuoviDefinitivamente();
            return 0;
        }
        else
            return -1;
    }

    /**
     * @param $nome
     * @param $prezzo
     * @return SServizioUpdater: successo, null:fallimento
     */
    public function ottieniServizioUpdater($nome, $prezzo)
    {
        foreach ($this->listaCategorie as $item)
        {
            $servizio = $item->ottieniServizio($nome, $prezzo);
            if ($servizio!=null)
            {
                return new SServizioUpdater($servizio);
            }
        }
        return null;
    }

    /**
     * @param $nome
     * @return SCategoriaUpdater: successo, null: fallimento
     */
    public function ottieniCategoriaUpdater($nome)
    {
        return new SCategoriaUpdater($this->ricercaCategoria($nome));
    }

    /**
     * @param $nome
     * @param $prezzo
     * @return EServizio|null
     */
    public function ottieniServizio($nome, $prezzo)
    {
        foreach ($this->listaCategorie as $item)
        {
            $servizio = $item->ottieniServizio($nome, $prezzo);
            if ($servizio!=null)
            {
                $copia = new EServizio();
                $copia->loadByID(array('codice'=>$servizio->getCodice(), 'nome'=>$servizio->getNome(),
                    'descrizione'=>$servizio->getDescrizione(), 'prezzo'=>$servizio->getPrezzo(),
                    'durata'=>$servizio->getDurata()));
                return $copia;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return EServizio|null
     */
    public function ottieniServizioByCodice($id)
    {
        foreach ($this->listaCategorie as $item)
        {
            $servizio = $item->ottieniServizioByCodice($id);
            if ($servizio!=null)
            {
                $copia = new EServizio();
                $copia->loadByID(array('codice'=>$servizio->getCodice(), 'nome'=>$servizio->getNome(),
                    'descrizione'=>$servizio->getDescrizione(), 'prezzo'=>$servizio->getPrezzo(),
                    'durata'=>$servizio->getDurata()));
                return $copia;
            }
        }
        return null;
    }
}