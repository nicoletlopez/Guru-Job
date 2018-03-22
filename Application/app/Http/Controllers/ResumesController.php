<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResume;
use App\Resume;
use App\Section;
use Illuminate\Http\Request;

class ResumesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes=auth()->user()->faculty->resumes;

        $context=[
            'resumes'=>$resumes,
        ];
        return view('faculty.manage-resumes')->with($context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resumes.resume-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateResume $request)
    {
        $faculty=auth()->user()->id;
        $template=$request->input('templates');
        $education=$request->input('education');
        $experience=$request->input('experience');
        $skill=$request->input('skill');

        $resume=new Resume();
        $resume->faculty_id=$faculty;
        $resume->template=(int)$template[0];
        $resume->save();
        $resume_id=$resume->id;



        $contents=[
            'Education'=>$education,
            'Work Experience'=>$experience,
            'Skills'=>$skill
        ];

        foreach($contents as $title=>$content){
            $section=new Section();
            $section->title=$title;
            $section->content=$content;
            $section->resume_id=$resume_id;
            $section->save();
        }

        return redirect()->route('resumes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$template)
    {
        $resume=Resume::find($id);
        $sections=$resume->sections;
        $context=[
            'resume'=>$resume,
            'education'=>$sections[0]->content,
            'experience'=>$sections[1]->content,
            'skill'=>$sections[2]->content,
        ];

        return view('resumes.templates.resume'.$template)->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume=Resume::find($id);
        $template=$resume->template;
        $sections=$resume->sections;

        $context=[
            'resume'=>$resume,
            'template'=>$template,
            'education'=>$sections[0]->content,
            'experience'=>$sections[1]->content,
            'skill'=>$sections[2]->content,
        ];
        return view('resumes.resume-edit')->with($context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateResume $request, $id)
    {
        $template=$request->input('templates');
        $education=$request->input('education');
        $experience=$request->input('experience');
        $skill=$request->input('skill');

        $resume=Resume::find($id);
        $resume->template=(int)$template[0];
        $resume->save();
        $resume_id=$resume->id;

        $contents=[
            'Education'=>$education,
            'Work Experience'=>$experience,
            'Skills'=>$skill,
        ];

        foreach($contents as $title=>$content){
            $section=Section::where('resume_id',$resume_id);
            $section->where('title',$title)->update(['content'=>$content]);
        }

        return redirect()->route('resumes.index')->with('success','Resume Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume=Resume::find($id);
        $resume->sections()->delete();
        $resume->delete();
        return back()->with('warning','Resume deleted');
    }
}
