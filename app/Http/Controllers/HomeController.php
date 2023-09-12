<?php

namespace App\Http\Controllers;

use Ezegyfa\LaravelHelperMethods\DynamicTemplateMethods;
use Ezegyfa\LaravelHelperMethods\WebshopController;
use Ezegyfa\LaravelHelperMethods\Database\FormGenerating\DatabaseInfos;
use Ezegyfa\LaravelHelperMethods\Database\DataStructureMethods;

class HomeController extends WebshopController
{
    protected $tableName = 'products';

    public function welcome() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_welcome', [], 'app');
    }

    public function products() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_products', [], 'app');
    }

    public function login() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_login', [], 'app');
    }

    public function registration() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_registration', [], 'app');
    }

    public function contact() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_contact', [], 'app');
    }

    public function info() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_info', [], 'app');
    }

    public function getData() {
        $tableInfos = DatabaseInfos::getTableInfos()[$this->tableName];
        return $tableInfos->getRequestDataResponse('products');
    }

    public function admin() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_admin', [], 'app');
        $data = DataStructureMethods::getRelationReplacedRows($data, $this->tableName, 'image_id');
        return response()->json($data);
    }
}
