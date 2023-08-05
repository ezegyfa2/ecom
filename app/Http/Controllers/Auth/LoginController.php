<?php

namespace App\Http\Controllers\Auth;

use Ezegyfa\LaravelHelperMethods\Database\FormGenerating\DatabaseInfos;
use Ezegyfa\LaravelHelperMethods\DynamicTemplateMethods;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
   
class LoginController extends Controller
{
  
 #   use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function login(Request $request)
    {
        try {
            $input = $request->all();
            $validators = DatabaseInfos::getTableInfosByColumns('users', [ 'email', 'password' ])->getValidators();
            //array_push($validators, 'email in users');
            $request->validate($validators);
            $loginData = [
                'email' => $input['email'],
                'password' => $input['password']
            ];
            if (auth()->attempt($loginData)) {
                return redirect()->route('home');
            }
            else {
                return redirect()->back()->withInput(request()->all())->withErrors([ 'password' => __('auth.password') ]);
            }
        }
        catch (ValidationException $e) {
            return redirect()->back()->withInput(request()->all())->withErrors($e->errors());
        }
    }

    public function loginPage(Request $request) {
        $tableInfos = DatabaseInfos::getTableInfosByColumns('users', [ 'email', 'password' ]);
        $templateParams = (object) [
            'form_item_sections' => $tableInfos->getFormInfos()
        ];
        return DynamicTemplateMethods::getTemplateDynamicPage('ecom_login', $templateParams, 'app');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}