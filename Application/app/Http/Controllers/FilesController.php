<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Requests\LectureUpload;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    //for lecture files
    public function lectureUpload(LectureUpload $request,$lectureId){
        $fileNameWithExt=$request->file('file')->getClientOriginalName();
        $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('file')->getClientOriginalExtension();
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //$fileNameToStore=$filename.'.'.$extension;
        //$fileNameToStore=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('public/lectures/lecture_files_'.$lectureId,$fileNameToStore);
        $file=new File;
        $file->lecture_id=$lectureId;
        $file->name=$fileNameToStore;
        $file->desc="new file";
        $file->save();
        return back()->with('success','File uploaded.');
    }
    public function deleteLectureFile($id){
        $file=File::find($id);
        $file->delete();
        return back()->with('success',$file->name.' File Deleted.');
    }
    public function downloadLectureFile($lectureId,$fileName){
        $file=public_path().'/storage/lectures/'."lecture_files_".$lectureId."/".$fileName;
        $headers = array(
            'Content-Type: application/octet-stream',
        );
        return response()->download($file,$fileName,$headers);
    }

}
