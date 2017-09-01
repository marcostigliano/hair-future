<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 01/09/17
 * Time: 17.58
 */

class DemoUtenti
{
    public static function creaUtenti()
    {
        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Carl", "Johnson",
            "3212530891", "cj@sanandreas.com", "grovestreet4life", "Cliente");
        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Sean", "Johnson",
            "3152407845", "sweet@sanandreas.com", "grovestreet4life", "Cliente");
        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Melvin", "Harris",
            "3576892790", "bigsmoke@sanandreas.com", "greensabre", "Cliente");
        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Lance", "Wilson",
            "3230401151", "ryder@sanandreas.com", "smokeeveryday", "Cliente");

        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Macisla", "Brown",
            "3849758394", "macisla@hairfuture.com", "hairfuture", "Dipendente");
        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Gordo", "Snow",
            "3700272904", "gordo@hairfuture.com", "hairfuture", "Dipendente");

        $nuoviUtenti[] = EGestoreUtenti::creaNuovoUtente("Reece", "Old",
            "3236020450", "oldreece@hairfuture.com", "hairfuture", "Direttore");

        print "Sono stati ineriti nel db i seguenti utenti:\n";
        foreach ($nuoviUtenti as $item) {
            print $item."\n\n\n";
        }
    }

    public static function modificaUtenti()
    {
        print "Verranno modificate le password degli utenti";
        $macisla = EGestoreUtenti::ottieniUtenteByID("macisla@hairfuture.com");
        $oldreece = EGestoreUtenti::ottieniUtenteByID("oldreece@hairfuture.com");
        $bigsmoke = EGestoreUtenti::ottieniUtenteByID("bigsmoke@sanandreas.com");

        print "\n".$bigsmoke."\nModificato in: ";
        $bigsmoke->setPassword("everybodyismycousin");
        print $bigsmoke."\n";

        print "\n".$oldreece."\nModificato in: ";
        $oldreece->setPassword("imthekingofbarbers");
        print $oldreece."\n";

        print "\n".$macisla."\nModificato in: ";
        $macisla->setPassword("vamosalaplayadelseville");
        print $macisla."\n\n\n";

    }

    public static function cancellaUtenti()
    {
        $gordo = EGestoreUtenti::ottieniUtenteByID("gordo@hairfuture.com");
        print "Verrà rimosso: ".$gordo."\n\n\n";
        $gordo->rimuoviDefinitivamente();
    }
}