<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 20/08/17
 * Time: 15.48
 */
class EGestoreUtenti
{
    public static function ottieniUtenteByID($email)
    {
        $Caronte = new FUtente();
        $result = $Caronte->searchById($email);
        if ($result['tipo'] == 'Cliente')
        {
            $Cliente = new ECliente();
            $Cliente->loadByID($result);
            return $Cliente;
        }
        elseif ($result['tipo'] == 'Dipendente')
        {
            $Dipendente = new EDipendente();
            $Dipendente->loadByID($result);
            return $Dipendente;
        }
        elseif ($result['tipo'] == 'Direttore')
        {
            $Direttore = new EDirettore();
            $Direttore->loadByID($result);
            return $Direttore;
        }
        else
            return -1;
    }

    public static function creaNuovoUtente($nome, $cognome, $recapito, $email, $password, $tipo)
    {
        if ($tipo == 'Cliente')
        {
            $Cliente = new ECliente();
            $Cliente->addUtente($nome, $cognome, $recapito, $email, $password);
            return $Cliente;
        }
        elseif ($tipo == 'Dipendente')
        {
            $Dipendente = new EDipendente();
            $Dipendente->addUtente($nome, $cognome, $recapito, $email, $password);
            return $Dipendente;
        }
        elseif ($tipo == 'Direttore')
        {
            $Direttore = new EDirettore();
            $Direttore->addUtente($nome, $cognome, $recapito, $email, $password);
            return $Direttore;
        }
        else
            return -1;
    }


}