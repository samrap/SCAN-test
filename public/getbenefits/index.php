<?php

require __DIR__.'/../../vendor/autoload.php';

use SCAN\Src\BenefitsReader;

// Generate the map
$reader = new BenefitsReader(__DIR__.'/../../data/Benefits.xlsx');
$map = $reader->getBenefitsMap();

// Generate some default values on page load (Default Los Angeles)
$benefits = $map[90001];
$county = $benefits[0]['county'];

// Assume an AJAX call in this case; give JavaScript a nice JSON object
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['zip'])) {
    $zip = $_GET['zip'];

    if (array_key_exists($zip, $map)) {
        echo json_encode($map[$zip]);
    } else {
        echo json_encode(['invalidZip' => $zip]);
    }

// JavaScript is disabled or the user requested it via POST somehow
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['zip'])) {
    $zip = $_POST['zip'];

    if (array_key_exists($zip, $map)) {
        $benefits = $map[$zip];
        $county = $benefits[0]['county'];
    } else {
        $benefits = null;
        $county = null;
    }
}
