<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('email')) {
            $data['title'] = "Kelola User";                        
            $data['role']= Role::get();
            return view('admin.user', $data);
        }else{
            return redirect('/login');
        }
        
    }

    public function datatable()
    {
        $data = User::get();
            
        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);        
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $name = $request->name;
        $email = $request->email;
        $password = "wpu123";
        $image = "titikkoma.png";
        $role = $request->role;              

        $cek_email = User::where('email', $email)->first();        
        if (!empty($cek_email)) {
            return response()->json(['status' => 400, 'msg' => "Maaf, Email sudah di gunakan."]);
        }
        if (empty($name)||empty($role) || empty($email)){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
            $data = [
                "name" => $name,
                "email" => $email,
                "image" => $image,
                "password" =>Crypt::encryptString($password)
            ]; 

            $insert = User::create($data);
            $insert2 = $insert->roles()->attach($role);
                                 

        if ($insert) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil ditambahkan']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal ditambahkan']);
        }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;        
        
        $getData = User::with('roles')->findOrFail($id);
        
        return response()->json(['status' => 202,'list' => $getData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;        
        $name = $request->name;
        $email = $request->email;        
        $role = $request->role;              

        if (empty($name)||empty($role) || empty($email)){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
            $data = [
                "name" => $name,
                "email" => $email                
            ]; 

            $update = User::findOrFail($id)->update($data);
            $update2 = User::findOrFail($id)->roles()->sync($role);
                                    

            if ($update) {
                return response()->json(['status' => 202,'msg' => 'Data berhasil diubah']);
            } else {
                return response()->json(['status' => 449,'msg' => 'Data gagal diubah']);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $delete = User::findOrFail($id)->delete();

        if ($delete) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dihapus']);
        }
    }
}
