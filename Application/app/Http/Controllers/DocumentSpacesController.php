<?php

namespace App\Http\Controllers;

use App\DocumentSpace;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function PHPSTORM_META\type;

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
            //$documentSpaces=auth()->user()->faculty->documentSpaces;

            /*$documentSpaces = Cache::remember('documentSpaces',20,function()
            {
                return auth()->user()->faculty->documentSpaces;
            });*/

            $documentSpaces = auth()->user()->faculty->documentSpaces;

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

        //check if the chosen name has duplicates
        if(DB::table('document_space')->where('user_id',$userId)->where('title',$documentSpaceName)->exists())
        {
            return back()->with('error','A document space with the same name already exists!');
        }


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
        /*$documentSpace = DocumentSpace::find($id);
        $documents = $documentSpace->documents;*/


        /*$documentSpace = Cache::remember('documentSpace',20,function() use (&$id)
        {
            return DocumentSpace::find($id);
        });*/

        /*$documents = Cache::remember('documents',20,function() use (&$documentSpace)
        {
           return $documentSpace->documents;
        });*/

        $documentSpace = DocumentSpace::find($id);
        $documents = $documentSpace->documents;

        $fileExts=[];
        foreach($documentSpace->documents as $file){
            preg_match("/\.(\w+)(?!.*\.(\w+))/",$file->name,$ext);
            preg_match("/([^\/]+)(?=\.\w+$)/",$file->name,$name);
            $fileExts[]=array($name[0],strtolower($ext[1]));
        }

        $image=['jpg','jpeg','png','bmp','gif'];
        $video=['mp4','flv','wmv','3gp'];
        $audio=['mp3','m4a','m4p','ogg','wav'];
        $word=['doc','docx'];
        $pdf=['pdf'];


        $context = array
        (
            'documentSpace' => $documentSpace,
            'documents' => $documents,
            'fileExts'=>$fileExts,
            'image'=>$image,
            'video'=>$video,
            'audio'=>$audio,
            'word'=>$word,
            'pdf'=>$pdf,
        );

        return view('documents.documents-index')->with($context);
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
