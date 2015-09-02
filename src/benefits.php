<?php

/**
 * This script is for testing purposes. Do not use it in a production page 
*/

require __DIR__.'/../vendor/autoload.php';

use SCAN\Src\BenefitsReader;

$reader = new BenefitsReader(__DIR__.'/../data/Benefits.xlsx');
$map = $reader->getBenefitsMap();
