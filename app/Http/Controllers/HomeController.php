<?php

namespace App\Http\Controllers;

use Ezegyfa\LaravelHelperMethods\DynamicTemplateMethods;
use Ezegyfa\LaravelHelperMethods\WebshopController;

class HomeController extends Controller
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

    public function contact() {
        $template = (object) [
            'type' => 'dynamic-template',
            'data' => (object) [
                'template_type_name' => 'ecom_contact_page',
                'params' => (object) [],
            ]
        ];
        return view('layouts.dynamicPage', compact('template'));
    }

    public function info() {
        $template = (object) [
            'type' => 'dynamic-template',
            'data' => (object) [
                'template_type_name' => 'ecom_info_page',
                'params' => (object) [],
            ]
        ];
        return view('layouts.dynamicPage', compact('template'));
    }
}
