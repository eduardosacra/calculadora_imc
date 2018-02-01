<?php
/**
 * Created by PhpStorm.
 * User: edusacra
 * Date: 01/02/18
 * Time: 01:56
 */

require_once '../../vendor/autoload.php';

use Controller\Template;
use Model\Imc;

$altura = floatval(filter_input(INPUT_POST, 'altura'));
$peso = floatval(filter_input(INPUT_POST, 'peso'));


$imc = new Imc();

$data = ["RESULT" => $imc->calculaImcText($altura, $peso)];

$template = new Template("index");
echo $template->render($data);