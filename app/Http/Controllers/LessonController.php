<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Lesson;
use App\Models\Course;
use Yajra\DataTables\DataTables;

class LessonController extends Controller
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
            // typehead course
            $course = Course::get();                
            $set_course = [];
            foreach ($course as $co) {
                $tampung = '{"name":"'.$co->title.'"},';            
                $pemikat = substr($tampung,0,-1);
                $set_course[] = $pemikat;
            }   
            $cover_string = implode(',',$set_course);         
            $data['course'] =$cover_string;
            return view('admin.lesson', $data);
        }else{
            return redirect('/login');
        }        
    }

    public function datatable()
    {
        $data = Lesson::with('course')->get();        
            
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

        $course_title = $request->course_title;
        $title = $request->title;
        $slug = str_slug($title, "-");
        $video_link = $request->video_link;
        $materi = $request->materi;
        $source_code = $request->source_code;
        $content = $request->content;        
        $published = $request->checked;        
        
        
        if ($course_title == null || $title == null || $content == null) {
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else if ($materi != null) {
            
            $course = Course::where('title',$course_title)->first();
            $lesson = Lesson::where('course_id',$course->id)->max('position');        
            $position = $lesson + 1;
            
            $materiName =time().'.'.$materi->getClientOriginalExtension();
            $materi->move(public_path('file'), $materiName);

            $scodeName =time().'.'.$source_code->getClientOriginalExtension();
            $source_code->move(public_path('file'), $scodeName);
            
            $data = [
                "course_id" => $course->id,
                "title" => $title,
                "slug" => $slug,
                "video_link" => $video_link,
                "content" => $content,
                "position" => $position,
                "materi" => $materiName,
                "source_code" => $scodeName,
                "published" => $published   
            ];
            
        }else{
            $course = Course::where('title',$course_title)->first();
            $lesson = Lesson::where('course_id',$course->id)->max('position');        
            $position = $lesson + 1;            
            
            $data = [
                "course_id" => $course->id,
                "title" => $title,
                "slug" => $slug,
                "video_link" => $video_link,
                "content" => $content,
                "position" => $position,                
                "published" => $published   
            ];
        }
        $insert = Lesson::create($data);
        
        if ($insert) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil ditambahkan']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal ditambahkan']);
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
        $lesson = Lesson::findOrFail($id);
        $temp = $lesson->course_id;        
        $course = Course::where('id', $temp)->first();
        
        $getData = [
            'course' => $course->title,
            'id' => $lesson->id,
            'title' => $lesson->title,
            'position' => $lesson->position,
            'video_link' => $lesson->video_link,
            'content' => $lesson->content,
            'materi' => $lesson->materi,
            'source_code' => $lesson->source_code,
            'published' => $lesson->published
        ];
        
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
        $course_title = $request->course_title;
        $title = $request->title;
        $slug = str_slug($title, "-");
        $video_link = $request->video_link;
        $position = $request->position;
        $materi = $request->materi;
        $source_code = $request->source_code;
        $content = $request->content;
        $published = $request->checked;        
                
        
        if ($course_title == null || $title == null || $content == null) {
            return response()->json(['status' => 400, 'msg' => "Maaf, inputan tidak boleh kosong."]);
          
        }else if ($materi != null) {

            $course = Course::where('title',$course_title)->first();
            $lesson = Lesson::where('id',$id)->first();
            $temp = $lesson->file;

            File::delete('file/' . $temp);
            
            $fileName =time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('file'), $fileName);
            
            $data = [
                "course_id" => $course->id,
                "title" => $title,
                "slug" => $slug,
                "video_link" => $video_link,
                "content" => $content,
                "position" => $position,
                "materi" => $fileName,
                "published" => $published   
            ];
            
        }else{                   
            
            $course = Course::where('title',$course_title)->first();   
            $data = [
                "course_id" => $course->id,
                "title" => $title,
                "slug" => $slug,
                "video_link" => $video_link,
                "content" => $content,
                "position" => $position,                
                "published" => $published   
            ];
        }
        $update = Lesson::findOrFail($id)->update($data);
        
        if ($update) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dirubah']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dirubah']);
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

        $delete = Lesson::findOrFail($id)->delete();

        if ($delete) {
            return response()->json(['status' => 202,'msg' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 449,'msg' => 'Data gagal dihapus']);
        }
    }
}
