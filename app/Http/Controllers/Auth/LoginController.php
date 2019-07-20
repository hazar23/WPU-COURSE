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
            }else{
                return response()->json(['status' => 400, 'msg' => "Maaf, Email atau Password salah."]);
            }         
        }
        return response()->json(['status' => 400, 'msg' => "Maaf, Email atau Password salah."]);
       
    }
    public function daftar(Request $request){
        $name = $request->username;
        $email = $request->email;
        $password = $request->password;
        $image = "titikkoma.png";        
        
        $cek_email = User::where('email', $email)->first();        
        if (!empty($cek_email)) {
            return response()->json(['status' => 400, 'msg' => "Maaf, Email sudah di gunakan."]);
        }
        if (empty($name)||empty($password) || empty($email)){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
            $data = [
                "name" => $name,
                "email" => $email,
                "image" => $image,
                "password" =>Crypt::encryptString($password)
            ]; 

            $insert = User::create($data);
                                 

        if ($insert) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil ditambahkan']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal ditambahkan']);
        }
            
        }


    }
    public function logout(Request $request){
        
        $request->session()->flush();

        return redirect('/login');
    }

    public function keluar(Request $request){
        
        $request->session()->flush();        

        return redirect('/');
    }

}
