<?php
define ('ROOT', dirname(__DIR__));
require '../Autoloader.php';
Autoloader::register();

use Model\Model;
use Database\createDatabase;


$db = new createDatabase();
// $db->create();
$db->createTable('options', ['id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT', 'name' => 'VARCHAR(50) NOT NULL']);
$db->createTable('property', ['id' => 'INT PRIMARY KEY NOT NULL AUTO_INCREMENT',
                                'title' => 'VARCHAR(100) NOT NULL',
                                'address' => 'VARCHAR(100) NOT NULL',
                                'postalCode' => 'VARCHAR(10) NOT NULL',
                                'surface' => 'INT NOT NULL',
                                'type' => 'INT NOT NULL',
                                'floor' => 'INT'
]);
$db->createTable('optionsProperty', 
                    ["id" => "INT PRIMARY KEY NOT NULL AUTO_INCREMENT",
                                    "option_id" => "INT NOT NULL",
                                    "property_id" => "INT NOT NULL"
                    ],
                    ['option_id' => 'options(id)',
                    'property_id' => 'property(id)']
);

if ((isset($_GET["page"]) && $_GET["page"] == 'home') || !isset($_GET["page"])) {
    $model = new Model();
    $biens = $model->getBiens();
    include ROOT . '/views/indexView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'new') {  
    include ROOT . '/views/newView.php';
} elseif (isset($_GET["page"]) && $_GET["page"] == 'save') {  
    $model = new Model();
    $biens = $model->saveBien($_POST);
    header("Location: index.php?page=home");
} elseif (isset($_GET["page"]) && $_GET["page"] == 'single') {  
    $model = new Model();
    $bien = $model->getBien($_GET["id"]);
    include ROOT . '/views/singleView.php';
} elseif (isset($_GET["page"]) && $_GET["page"] == 'modify') { 
    $model = new Model();
    $bien = $model->getBien($_GET["id"]);
    include ROOT . '/views/modifyView.php';
} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveModification') { 
    $model = new Model();
    $bien = $model->modifyBien($_POST);
    var_dump($bien);
    // header("Location: index.php?page=single&id=". $_GET["id"]);
}




