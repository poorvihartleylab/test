<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;

class BannerController extends Controller
{

	    /** Example of File Upload */
	public function storebanner(Request $request){
		//single file uploaded file functionality.

		/*if($request->hasfile('fileToUpload')){
			$fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();
			$request->fileToUpload->storeAs('logos',$fileName);
			return back()
			->with('success','You have successfully upload image.');
        }*/

        //Multiple file uploaded 

       
        if($request->hasfile('fileToUpload')){
			$allowedfileExtension=['pdf','jpg','jpeg','png','docx'];
			$files = $request->file('fileToUpload');
			foreach($files as $key=>$file){
				$filename = $file->getClientOriginalName();
				$ext = $file->getClientOriginalExtension();
				$check=in_array($ext,$allowedfileExtension);
				if($check){
					$banner = new banner();
					$ext = $file->getClientOriginalExtension();
					$imgname = "filename".time();
					$imgname .= $key.".".$ext;
					$imagepath = $file->storeAs('public/logos',$imgname);
					$banner->image = $imgname;
					$banner->imagepath = $imagepath;
					$banner->save();
				}else{
					echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
			}//foreach
			return back()
			->with('success','You have successfully upload image.');
        }

	}

    public function showBanner(){
    	$banner = banner::all();
    	return view('add-banner')->with(['banners' => $banner]);
    }
}
?>