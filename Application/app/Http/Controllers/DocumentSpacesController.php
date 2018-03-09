<?php

namespace App\Http\Controllers;

use App\DocumentSpace;
use Illuminate\Http\Request;

class DocumentSpacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()){
            return redirect()->route('login');
        }elseif(auth()->user()->faculty){
            $documentSpaces=auth()->user()->faculty->documentSpaces;
            $context=array(
                'documentSpaces'=>$documentSpaces,
            );
            return view('faculty.manage-documents')->with($context);
        }
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
        $userId=auth()->user()->id;
        $documentSpaceName=$request->input('documentSpaceName');

        $documentSpace=new DocumentSpace();
        $documentSpace->title=$documentSpaceName;
        $documentSpace->desc='New Folder';
        $documentSpace->user_id=$userId;
        $documentSpace->save();

        return back()->with('success','Folder Created');
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
        $documentSpaceName = DocumentSpace::find($id)->title;
        DocumentSpace::find($id)->delete();

        return redirect()->back()->with('warning','Folder ' .$documentSpaceName. ' deleted');
    }
}
