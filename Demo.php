<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 01/09/17
 * Time: 17.55
 */

require_once 'includes/autoload.inc.php';
require_once 'includes/config.inc.php';
require_once 'DemoFiles/DemoUtenti.php';
require_once 'DemoFiles/DemoServizi.php';
require_once 'DemoFiles/DemoAppuntamenti.php';

DemoUtenti::creaUtenti();

DemoUtenti::modificaUtenti();

DemoUtenti::cancellaUtenti();

DemoServizi::creaServizi();

DemoServizi::modificaServizi();

DemoServizi::eliminaServizi();

DemoAppuntamenti::creaAppuntamenti();
