<?php
define ('ROOT', dirname(__DIR__));
require '../Autoloader.php';
Autoloader::register();

use Model\DbInterface;
use Model\PropertyModel;
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
    $model = new PropertyModel();
    $biens = $model->findAll();
    include ROOT . '/views/indexView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'new') {  
    include ROOT . '/views/newView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'save') {  
    $model = new DbInterface();
    $biens = $model->save($_POST, 'property');
    header("Location: index.php?page=home");

} elseif (isset($_GET["page"]) && $_GET["page"] == 'single') {  
    $model = new PropertyModel();
    $bien = $model->find($_GET["id"]);
    include ROOT . '/views/singleView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'modify') { 
    $model = new PropertyModel();
    $bien = $model->getBien($_GET["id"]);
    include ROOT . '/views/modifyView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveModification') { 
    $model = new PropertyModel();
    $bien = $model->modifyBien($_POST);
    header("Location: index.php?page=single&id=". $_GET["id"]);

} elseif (isset($_GET["page"]) && $_GET["page"] == 'delete') { 
    $model = new PropertyModel();
    $bien = $model->deleteBien($_GET["id"]);
    header("Location: index.php?page=home");

}