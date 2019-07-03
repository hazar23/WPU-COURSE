<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index(){
        return view('auth.login');
    }
    
    public function cekLogin(Request $request){
        
        $email = $request->email;
        $password = $request->password;
        
        if($email == null || $password == null){
            return response()->json(['status' => 400, 'msg' => "Maaf, Email atau Password tidak boleh kosong."]);
        }

        $cek = User::where('email', $email)->first();        
        
        if (!empty($cek)) {
            $pass = Crypt::decryptString($cek->password);
            if ($pass == $password) {
                $request->session()->put('email', $email);
                return response()->json(['status' => 202, 'msg' => "Login, Berhasil."]);                
            }            
        }
        return response()->json(['status' => 400, 'msg' => "Maaf, Email atau Password salah."]);
       
    }
    public function logout(Request $request){
        
        $request->session()->flush();

        return redirect('/login');
    }

}
