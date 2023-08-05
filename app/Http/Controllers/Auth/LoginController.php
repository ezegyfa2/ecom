<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Session;

use App\Models\User;
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
        $input = $request->all();
        $request->validate([
            'name' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['name'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }
        else 
        {
            # Login Hiba
            return 'Email-Address And Password Are Wrong!';
            # return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}