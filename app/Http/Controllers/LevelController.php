<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('email')) {
            $data['title'] = "Kelola Level";                
            return view('admin.level', $data);
        }else{
            return redirect('/login');
        }        
    }

    public function datatable()
    {
        $data = Level::get();
            
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
        $image = $request->image;
        $title = $request->title;
        $slug = str_slug($title, "-");
        $description = $request->description;        
        
        if (empty($title)|| empty($description) || $image == null){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            $data = [
                "image" => $imageName,
                "title" => $title,
                "slug" => $slug,
                "description" => $description                
            ];
        
        $insert = Level::create($data);
        
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
        
        $getData = Level::findOrFail($id);
        
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
        $image = $request->image;
        $title = $request->title;
        $slug = str_slug($title, "-");
        $description = $request->description;        

        $course = Level::where('id',$id)->first();
        $temp = $course->image;
        
        if (empty($title) || empty($description)) {
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          }

        if ($image != null) {

            File::delete('images/' . $temp);           
        
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);            

            $data = [
                "image" => $imageName,
                "title" => $title,
                "slug" => $slug,
                "description" => $description                
            ];                    

        } else{
            $data = [                
                "title" => $title,
                "slug" => $slug,
                "description" => $description                
            ];                                
        }
        $update = Level::findOrFail($id)->update($data);

            if ($update) {
                return response()->json(['status' => 202,'msg' => 'Data berhasil diubah']);
            } else {
                return response()->json(['status' => 449,'msg' => 'Data gagal diubah']);
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

        $delete = Level::findOrFail($id)->delete();

        if ($delete) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dihapus']);
        }
    }
}
