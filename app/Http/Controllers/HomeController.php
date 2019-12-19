<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $data['terbaru'] = Course::with('tags')->orderBy('id', 'desc')->take(4)->get();        
        return view('siswa/home',$data);
    }
    public function dashboard()
    {           
        return view('dashboard/index');
    }
    public function profileEdit(Request $request)
    {      
        $id = $request->id;        
        
        $getData = User::with('roles')->findOrFail($id);
        
        return response()->json(['status' => 202,'list' => $getData]);
    }
    public function update(Request $request)
    {
        $id = $request->id;        
        $name = $request->name;
        $email = $request->email;        
        $gender = $request->gender;  
        $contact = $request->contact;              
        $location = $request->location;        

        if (empty($name) || empty($email)){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
            $data = [
                "name" => $name,
                "email" => $email,
                "gender" => $gender,
                "contact" => $contact,
                "location" => $location
            ]; 

            $update = User::findOrFail($id)->update($data);            
                                    
            if ($update) {
                return response()->json(['status' => 202,'msg' => 'Data berhasil diubah']);
            } else {
                return response()->json(['status' => 449,'msg' => 'Data gagal diubah']);
            }
        }
        
    }
}
