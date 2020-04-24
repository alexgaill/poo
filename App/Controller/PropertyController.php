<?php

namespace App\Controller;

use App\Model\PropertyModel;
use Core\Controller\Controller;

class PropertyController extends Controller{

    public function home(){
        $PropertyModel = new PropertyModel();
        $biens = $PropertyModel->findAll();
        return $this->render("Property/indexView", [
            'biens' => $biens,
            ]);
    }
}