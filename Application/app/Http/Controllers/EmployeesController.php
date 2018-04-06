<?php

namespace App\Http\Controllers;

use App\DocumentSpace;
use App\Faculty;
use App\Hr;
use App\Lecture;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->type === 'HR'){
            //list all of an HR's employees
            $hr = Hr::find(auth()->user()->id);
            $employees = Faculty::whereEmployerIs(auth()->user()->id)->paginate(5);

            $context = [
                'key' => 0,
                'employees' => $employees,
            ];

            return view('employee.employee-index')->with($context);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ideally the screen where you can confirm an applicant as the official employee
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $faculty = $request->input('faculty_id');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile($faculty_id)
    {
        $hr_id = auth()->user()->id;
        $hr = Hr::find($hr_id);
        $is_employee = $hr->is_employee($faculty_id)->get()->isNotEmpty();
        if($is_employee){
            $faculty = User::find($faculty_id);
            $profile = $faculty->profile;

            $context = [
                'user' => $faculty,
                'profile' => $profile,
            ];

            return view('employee.employee-profile')->with($context);
        }else{
            return redirect('/employees');
        }
    }

    public function lectures($faculty_id)
    {
        $hr_id = auth()->user()->id;
        $hr = Hr::find($hr_id);
        $is_employee = $hr->is_employee($faculty_id)->get()->isNotEmpty();
        if($is_employee){
            $lecture = $hr->user->lectures->where('faculty_id',$faculty_id);

            $context = [
                'lectures' => $lecture,
            ];

            return view('employee.lectures.employee-assigned-lectures')->with($context);
        }else{
            return redirect('/employees');
        }
    }

    public function lectureDetails($faculty_id, $lecture_id){
        $hr_id = auth()->user()->id;
        $hr = Hr::find($hr_id);
        $is_employee = $hr->is_employee($faculty_id)->get()->isNotEmpty();
        if($is_employee){
            $lecture = Lecture::find($lecture_id);

            $context = [
                'lecture' => $lecture,
            ];

            return view('employee.lectures.employee-assigned-lecture-details')->with($context);
        }else{
            return redirect('/employees');
        }
    }

    public function lectureFiles($faculty_id, $lecture_id){
        $hr_id = auth()->user()->id;
        $hr = Hr::find($hr_id);
        $is_employee = $hr->is_employee($faculty_id)->get()->isNotEmpty();
        if($is_employee){
            $lecture = Lecture::find($lecture_id);

            $fileExts = [];
            foreach ($lecture->files as $file)
            {
                preg_match("/\.(\w+)(?!.*\.(\w+))/", $file->name, $ext);
                preg_match("/([^\/]+)(?=\.\w+$)/", $file->name, $name);
                $fileExts[] = array($name[0], strtolower($ext[1]));
            }

            $image = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
            $video = ['mp4', 'flv', 'wmv', '3gp'];
            $audio = ['mp3', 'm4a', 'm4p', 'ogg', 'wav'];
            $word = ['doc', 'docx'];
            $excel = ['xls', 'xlsx'];
            $ppt = ['ppt', 'pptx'];
            $pdf = ['pdf'];

            $context = array(
                'lecture' => $lecture,
                'files' => $lecture->files,
                'fileExts' => $fileExts,
                'image' => $image,
                'video' => $video,
                'audio' => $audio,
                'word' => $word,
                'excel' => $excel,
                'ppt' => $ppt,
                'pdf' => $pdf,
            );
            return view('employee.lectures.employee-assigned-lecture-files')->with($context);
        }else{
            return redirect('/employees');
        }
    }

    public function documentSpaces($faculty_id){
        if (!auth()->user())
        {
            return redirect()->route('login');
        } elseif (auth()->user()->hr)
        {
            //$documentSpaces=auth()->user()->faculty->documentSpaces;

            /*$documentSpaces = Cache::remember('documentSpaces',20,function()
            {
                return auth()->user()->faculty->documentSpaces;
            });*/

            $faculty = Faculty::find($faculty_id);
            $documentSpaces = $faculty->documentSpaces;

            $context = array(
                'faculty_id' => $faculty_id,
                'documentSpaces' => $documentSpaces,
            );
            return view('employee.documentspaces.employee-document-spaces')->with($context);
        }
    }

    public function showDocumentSpaces($faculty_id, $document_space_id){

        $faculty = Faculty::find($faculty_id);
        $documentSpace = DocumentSpace::find($document_space_id);
        $documents = $documentSpace->documents;

        $fileExts = [];
        foreach ($documentSpace->documents as $file)
        {
            preg_match("/\.(\w+)(?!.*\.(\w+))/", $file->name, $ext);
            preg_match("/([^\/]+)(?=\.\w+$)/", $file->name, $name);
            $fileExts[] = array($name[0], strtolower($ext[1]));
        }

        $image = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
        $video = ['mp4', 'flv', 'wmv', '3gp'];
        $audio = ['mp3', 'm4a', 'm4p', 'ogg', 'wav'];
        $word = ['doc', 'docx'];
        $excel = ['xls', 'xlsx'];
        $ppt = ['ppt', 'pptx'];
        $pdf = ['pdf'];

        $context = array
        (
            'faculty' => $faculty,
            'documentSpace' => $documentSpace,
            'documents' => $documents,
            'fileExts' => $fileExts,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'word' => $word,
            'excel' => $excel,
            'ppt' => $ppt,
            'pdf' => $pdf,
        );

        return view('employee.documentspaces.employee-document-space-show')->with($context);
    }
}
