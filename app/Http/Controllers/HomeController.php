<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function welcome() {
        $template = (object) [
            'type' => 'dynamic-template',
            'data' => (object) [
                'template_type_name' => 'ecom_welcome',
                'params' => (object) [],
            ]
        ];
        return view('layouts.dynamicPage', compact('template'));
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
