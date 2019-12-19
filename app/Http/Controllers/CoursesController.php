<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\Path;
use App\Models\Level;
use Yajra\DataTables\DataTables;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->session()->has('email')) {
            $data['title'] = "Kelola Course";
            $data['tag'] = Tag::get();
            $data['subject'] = Subject::get();
            $data['path'] = Path::get();
            $data['level'] = Level::get();        
    
            return view('admin.course', $data);
        }else{
            return redirect('/login');
        }        
    }
    public function datatable()
    {
        $data = Course::get();
            
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
        //
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
        $subject_id = $request->subject;        
        $path_id = $request->path;                
        $level_id = $request->level;
        $tag = $request->tag;        
        $published = $request->checked;
        
        if (empty($title) || empty($description) || $image == null){
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else{
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            if ($subject_id == 0) {
                $subject_id = null;                
            }
            if ($path_id == 0) {
                $path_id = null;
            }            
            $data = [
                "image" => $imageName,
                "title" => $title,
                "slug" => $slug,
                "description" => $description,
                "subject_id" => $subject_id,
                "path_id" => $path_id,
                "level_id" => $level_id,
                "published" => $published
            ];
        
        $insert = Course::create($data);
        $insert2 = $insert->tags()->attach($tag);
        
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
        
        $getData = Course::with('tags')->findOrFail($id);
        
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
        $subject_id = $request->subject;
        $path_id = $request->path;
        $level_id = $request->level; 
        $tag = $request->tag;          
        $published = $request->checked;

        $course = Course::where('id',$id)->first();
        $temp = $course->image;
        
        if (empty($title)|| empty($description)) {
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          }

        if ($subject_id == 0) {
            $subject_id = null;                
        }
        if ($path_id == 0) {
            $path_id = null;
        }

        if ($image != null) {

            File::delete('images/' . $temp);           
        
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);            

            $data = [
                "image" => $imageName,
                "title" => $title,
                "slug" => $slug,
                "description" => $description,
                "subject_id" => $subject_id,
                "path_id" => $path_id,
                "level_id" => $level_id,
                "published" => $published
            ];                    

        } else{
            $data = [                
                "title" => $title,
                "slug" => $slug,
                "description" => $description,
                "subject_id" => $subject_id,
                "path_id" => $path_id,
                "level_id" => $level_id,
                "published" => $published
            ];                                
        }
        $update = Course::findOrFail($id)->update($data);
        $update2 = Course::findOrFail($id)->tags()->sync($tag);
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

        $delete = Course::findOrFail($id)->delete();

        if ($delete) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dihapus']);
        }
    }
}
