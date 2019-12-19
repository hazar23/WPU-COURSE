<?php

namespace App\Http\Controllers;
use App\Models\Path;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {        
        $data['matakuliah']= Subject::paginate(4,['*'],'page_2s');    
        $data['jalur']= Path::paginate(4,['*'],'page_1s');        
        $data['level']= Level::get();                
        return view('siswa/belajar', $data);
    }
    
    public function all(Request $request)
    {                           
        $data['title']= "Semua Materi";
        $data['list']= Course::with('tags')->where('published',1)->paginate(12);                                
        return view('siswa/listMateri', $data);
    }

    public function matakuliah(Request $request)
    {                   
        $matkul = Subject::where('slug',$request->slug)->first();
        $data['title']= $matkul->title;
        $data['list']= Course::where('subject_id',$matkul->id)->where('published',1)->paginate(8);                        
        return view('siswa/listMateri', $data);
    }
    
    public function jalur(Request $request)
    {           
        $jalur = Path::where('slug',$request->slug)->first();
        $data['title']= $jalur->title;
        $data['list']= Course::where('path_id',$jalur->id)->where('published',1)->paginate(8);                
        return view('siswa/listMateri', $data);
    }

    public function level(Request $request)
    {   
        $level = Level::where('slug',$request->slug)->first();
        $data['title']= $level->title;
        $data['list']= Course::where('level_id',$level->id)->where('published',1)->paginate(8);                
        return view('siswa/listMateri', $data);
    }

    public function materi(Request $request)
{   
        $id = $request->id;        
        if ($request->session()->has('email')) {
        
        $course = Course::with('tags')->where('id',$id)->first();            
        
        $data['materi']= Lesson::where('course_id',$course->id)->where('published',1)->first();                        
        $data['list']= Lesson::where('course_id',$course->id)->where('published',1)->get();                       
        
            return response()->json(['status' => 202,'msg' => 'berhasil','list'=>$data]);
        }else{
            return response()->json(['status' => 404,'msg' => 'Harus Login terlebih dahulu']);
        }        
    }
    public function viewMateri(Request $request,$id)
    {   
            $id = $request->id;
            $course = Course::where('id',$id)->first();            
            
            $data['materi']= Lesson::where('course_id',$course->id)->where('published',1)->first();                        
            $data['list']= Lesson::where('course_id',$course->id)->where('published',1)->get();                       
                        
            return view('siswa/materi',$data);
            
        }
    public function materi2(Request $request){

        $lesson = Lesson::where('slug',$request->slug)->first();                                                
        $data['materi']= Lesson::where('slug',$request->slug)->where('published',1)->first();                        
        $data['list']= Lesson::where('course_id',$lesson->course_id)->where('published',1)->get();               

        return view('siswa/materi',$data);
    }
    public function download(Request $request){
        
        $file = $request->all();
        var_dump($file);die;
        //PDF file is stored under project/public/download/info.pdf
        $alamat= public_path('file').$file;

        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, 'filename.pdf', $headers);
    }
}

