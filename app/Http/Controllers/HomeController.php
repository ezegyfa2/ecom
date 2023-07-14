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
}
