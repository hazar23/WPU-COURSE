<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesMenu;
use App\Models\Menu;
use App\Models\Role;
use Yajra\DataTables\DataTables;

class AksesMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('email')) {
            $data['title'] = "Kelola Akses Menu";                
            $data['menu']= Menu::get();
            $data['role']= Role::get();
            return view('admin.AksesMenu', $data);
        }else{
            return redirect('/login');
        }        
    }

    public function datatable()
    {
        $data = AksesMenu::get();
            
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
        $role_id = $request->role_id;
        $menu_id = $request->menu_id;
         
        if (empty($menu_id)||empty($role_id )){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
                $data = [
                    "menu_id" => $menu_id,
                    "role_id" => $role_id                                    
                ]; 

                $insert = AksesMenu::create($data);
                                 

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
        
        $getData = AksesMenu::findOrFail($id);
        
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
        $role_id = $request->role_id;
        $menu_id = $request->menu_id;
         
        if (empty($menu_id)||empty($role_id )){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{            
            
            $data = [
                    "menu_id" => $menu_id,
                    "role_id" => $role_id                                    
            ]; 
        
            $update = AksesMenu::findOrFail($id)->update($data);

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

        $delete = AksesMenu::findOrFail($id)->delete();

        if ($delete) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dihapus']);
        }
    }
}
