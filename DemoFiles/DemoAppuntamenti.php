<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 01/09/17
 * Time: 19.30
 */

class DemoAppuntamenti
{
    public static function creaAppuntamenti()
    {
        $catalogo = new ECatalogoServizi();
        $servizi[] = $catalogo->ottieniServizioByCodice(2);
        $servizi[] = $catalogo->ottieniServizioByCodice(3);
        $macisla = EGestoreUtenti::ottieniUtenteByID("macisla@hairfuture.com");
        $macisla->prenotaAppuntamento("cj@sanandreas.com",$servizi, "2017-12-12", "09:00:00");
        $altriServizi[] = $catalogo->ottieniServizioByCodice(2);
        $cj = EGestoreUtenti::ottieniUtenteByID("cj@sanandreas.com");
        $cj->prenotaAppuntamento($altriServizi, "2017-11-12", "10:00:00");
    }

}