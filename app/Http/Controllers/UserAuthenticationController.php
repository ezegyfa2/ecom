<?php

namespace App\Http\Controllers;

use Ezegyfa\LaravelHelperMethods\Authentication\User\UserAuthenticationController as Controller;

class UserAuthenticationController extends Controller 
{
    protected $loginPageTemplateName = 'ecom_login';
    protected $registrationPageTemplateName = 'ecom_registration';
}