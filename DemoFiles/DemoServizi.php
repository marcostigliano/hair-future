<?php
/**
 * Created by PhpStorm.
 * User: serena
 * Date: 01/09/17
 * Time: 19.26
 */

class DemoServizi
{
    public static function creaServizi()
    {
        $reece = EGestoreUtenti::ottieniUtenteByID("oldreece@hairfuture.com");
        $reece->creaCategoria("Capelli","Qui si possono travare i vari tagli di capelli che si trovano dal parrucchiere");
        $reece->creaCategoria("Barba","Qui si possono trovare i vari tagli di barba che si trovano dal barbiere");
        $reece->creaServizio("Afro","I capelli come Jimmy Hendrix", 25, 120, "Capelli");
        $reece->creaServizio("A spazzola","Finalmente un taglio normale", 20, 30, "Capelli");
        $reece->creaServizio("Scalati","Ideale per farsi qualunque acconciatura", 20, 45, "Capelli");
        $reece->creaServizio("Caschetto","Potrai andare in moto tutte le volte che vuoi", 20, 60, "Capelli");
        $reece->creaServizio("Sfoltita", "Meglio del barbiere non lo fa nessuno", 10, 30, "Barba");
        $reece->creaServizio("Pizzetto", "Il migliore taglio di barba", 10, 45, "Barba");

    }

    public static function modificaServizi()
    {
        $reece = EGestoreUtenti::ottieniUtenteByID("oldreece@hairfuture.com");
        $reece->modificaCategoria("Capelli", "Capelli",
            "Qui si possono trovare i vari tagli di capelli che si trovano dal parrucchiere"); //qui viene solo corretto un errore di ortografia ;)
        $reece->modificaServizio(1, "Afro","Se non ce li hai ricci non te li puoi fare", 25, 120, "Capelli");
    }

    public static function eliminaServizi()
    {
        $reece = EGestoreUtenti::ottieniUtenteByID("oldreece@hairfuture.com");
        $reece->eliminaServizio(1);
        $reece->eliminaCategoria("Barba");
    }
}