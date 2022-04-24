<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachmentLibraryTrait
{
    public function fileupload($request,$name,$folder){

        $file_name= $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('assets/images/',$folder.'/'.$file_name,'upload_attachments');


    }

//    public function deleteFile($name)
//    {
//        $exists = Storage::disk('upload_attachments')->exists('assets/images/'.$name);
//
//        if($exists)
//        {
//            Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
//        }
//    }
}
