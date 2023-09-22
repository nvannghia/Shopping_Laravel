<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
trait StorageImageTrait{
    /** CAUSE THIS FUNCTION IS USED TO FOR MUTILE CLASS, SO 'DRY'
     * $fileName : the name arrtribute inside input element
     * $folderName : the name of storage folder
     * return []
     * 
     * 
     * *Idea function
        * $file = $request->feature_image_path;
        * $fileNameOrigin = $file->getClientOriginalName(); 
        * $fileNameHash = Str::random(20). "." . $file->getClientOriginalExtension(); * this name for insert into db
        * $filePath = $request->file('feature_image_path')->storeAs(
        *     'public/product/'.auth()->id(), $fileNameHash
        * ); 
        * $data = [
        *     'file_name' => $fileNameOrigin,
        *     'file_path' =>Storage::url($filePath)
        * ];
     */
    public function storageTraitUpload($request, $fileName, $folderName)
    {
        if($request->hasFile($fileName))
        {
            $file = $request->$fileName; 
            $fileNameOrigin = $file->getClientOriginalName(); 
            $fileNameHash = Str::random(20). "." . $file->getClientOriginalExtension(); // this name for insert into db
            
            $filePath = $request->file($fileName)->storeAs(
                'public/'.$folderName."/".auth()->id(), $fileNameHash
            ); 
    
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' =>Storage::url($filePath)
            ];
    
            return $dataUploadTrait;
        }
        return null;
    }

        /**
         * This function is useful for upload multiple file
         * $file : is an file object (have full properties of file object, dd to see)
         * $folerName : the name of storage folder
         * return []
         * 
         * NOTED: $request->file($fileName) <=> $request->$fileName
         */
    public function storageTraitUploadMutilple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension(); // this name for insert into db

        $filePath = $file->storeAs(
            'public/' . $folderName . "/" . auth()->id(),
            $fileNameHash
        );

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];

        return $dataUploadTrait;
    }
}


?>
