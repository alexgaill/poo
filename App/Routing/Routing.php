<?php

use App\Controller\PropertyController;
use Model\DbInterface;
use Model\PropertyModel;
use Model\OptionsModel;

if ((isset($_GET["page"]) && $_GET["page"] == 'home') || !isset($_GET["page"])) {
    $controller = new PropertyController();
    $controller->home();

} elseif (isset($_GET["page"]) && $_GET["page"] == 'newProperty') { 
    $OptionsModel = new OptionsModel();
    $options = $OptionsModel->findAll(); 
    include ROOT . '/views/Property/newView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveProperty') {  
    $model = new DbInterface();
    $property = array_splice($_POST, 0, 6);
    $options = $_POST["options"];
    $model->save($property, 'property');
    $PropertyModel = new PropertyModel();
    $propertyId = $PropertyModel->findOneBy(["title" => $property["title"]]);
    $propertyId = $propertyId->id;
    foreach ($options as $option) {
        $model->save(["option_id" => $option, "property_id" => $propertyId], 'optionsProperty');
    }
    header("Location: index.php?page=home");

} elseif (isset($_GET["page"]) && $_GET["page"] == 'singleProperty') {  
    $model = new PropertyModel();
    $bien = $model->find($_GET["id"]);
    include ROOT . '/views/Property/singleView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'modifyProperty') { 
    $model = new PropertyModel();
    $bien = $model->find($_GET["id"]);
    include ROOT . '/views/Property/modifyView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveModifyProperty') { 
    $model = new DbInterface();
    $bien = $model->update('property', $_POST, $_GET["id"]);

    header("Location: index.php?page=singleProperty&id=". $_GET["id"]);

} elseif (isset($_GET["page"]) && $_GET["page"] == 'deleteProperty') { 
    $model = new DbInterface();
    $bien = $model->delete('property', $_GET["id"]);
    header("Location: index.php?page=home");
}

if ((isset($_GET["page"]) && $_GET["page"] == 'optionsList') || !isset($_GET["page"])) {
    $model = new OptionsModel();
    $options = $model->findAll();
    require ROOT . '/views/Options/indexView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'newOptions') {  
    include ROOT . '/views/Options/newView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveOptions') {  
    $model = new DbInterface();
    $model->save($_POST, 'options');
    header("Location: index.php?page=optionsList");

} elseif (isset($_GET["page"]) && $_GET["page"] == 'singleOptions') {  
    $model = new OptionsModel();
    $option = $model->find($_GET["id"]);
    include ROOT . '/views/Options/singleView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'modifyOptions') { 
    $model = new OptionsModel();
    $option = $model->find($_GET["id"]);
    include ROOT . '/views/Options/modifyView.php';

} elseif (isset($_GET["page"]) && $_GET["page"] == 'saveModifyOptions') { 
    $model = new DbInterface();
    $model->update('options', $_POST, $_GET["id"]);

    header("Location: index.php?page=singleOptions&id=". $_GET["id"]);

} elseif (isset($_GET["page"]) && $_GET["page"] == 'deleteOptions') { 
    $model = new DbInterface();
    $model->delete('options', $_GET["id"]);
    header("Location: index.php?page=optionsList");
}