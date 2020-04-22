<?php
define ('ROOT', dirname(__DIR__));
require '../Autoloader.php';
Autoloader::register();

use Model\DbInterface;
use Model\PropertyModel;
use Database\createDatabase;


if ((isset($_GET["page"]) && $_GET["page"] == 'home') || !isset($_GET["page"])) {
    $model = new PropertyModel();
    $biens = $model->findBy(["postalCode" => "12345"]);
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
    $bien = $model->find($_GET["id"]);
    include ROOT . '/views/modifyView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveModification') { 
    $model = new DbInterface();
    $bien = $model->update('property', $_POST, $_GET["id"]);
    header("Location: index.php?page=single&id=". $_GET["id"]);

} elseif (isset($_GET["page"]) && $_GET["page"] == 'delete') { 
    $model = new DbInterface();
    $bien = $model->delete('property', $_GET["id"]);
    header("Location: index.php?page=home");

}