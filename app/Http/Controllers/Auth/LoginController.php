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
            $rememberMe = $request->has('remember_me');
            if (auth()->attempt($loginData, $rememberMe)) {
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
        $formItemSections = $tableInfos->getFormInfos('auth');
        array_push($formItemSections, (object) [
            'type' => 'checkbox-input',
            'data' => (object) [
                'name' => 'remember_me',
                'label' => __('auth.label.remember_me')
            ]
        ]);
        $templateParams = (object) [
            'form_item_sections' => $formItemSections
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