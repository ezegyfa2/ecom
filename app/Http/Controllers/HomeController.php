<?php

namespace App\Http\Controllers;

use Ezegyfa\LaravelHelperMethods\DynamicTemplateMethods;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function welcome() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_welcome', [], 'app');
    }

    public function products() {
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_products', [], 'app');
    }

    public function products() {
        $template = (object) [
            'type' => 'dynamic-template',
            'data' => (object) [
                'template_type_name' => 'ecom_products_page',
                'params' => (object) [],
            ]
        ];
        return view('layouts.dynamicPage', compact('template'));
    }
}
