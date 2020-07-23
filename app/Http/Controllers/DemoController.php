<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Demo;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use Gate;
use Carbon\Carbon;
use Auth;
use Image;

class DemoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    //All Data
    public function All(){


        if(request()->ajax())
        {
            $data = Demo::where('delete_temp', 0)->latest();


            return DataTables::of($data)


            ->addColumn('imageSrc', function($data){
                $button = '';
                $url1=asset("$data->image_small");
                $button .= '<img src='.$url1.' width="150" height="100" class="img-thumbnail mr-1" />';

                if(empty($button)){
                    return 'No data';
                }

                return $button;
            })

             ->addColumn('details', function($data){
                $button = '';
                $button .='<p class="mb-0"><b>Title : </b>'.$data->title.' </p>';
                $button .='<p class="mb-0"><b>Details: </b>'.$data->details.' </p> ';
                $button .='<p class="mb-0"><b>Register: </b>'. date("F j, Y, g:i a", strtotime($data->created_at)) .'</p>';



                if(empty($button)){
                    return 'No data';
                }
                return $button;
            })

            ->addColumn('action', function($data){

                $button = '';

                if( Gate::allows('publish') ){
                    if($data->status == 1){
                        $button .= '<button type="button" id="'.$data->id.'" makeValue="0"  class="status btn btn-info btn-sm mr-1"><i class="fa fa-check"></i> Active</button>';
                    }
                    else{
                        $button .= '<button type="button" id="'.$data->id.'" makeValue="1"  class="status btn btn-warning btn-sm mr-1"><i class="fa fa-times"></i> Inactive</button>';
                    }
                }

                if( Gate::allows('edit') ){
                    $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit</button>';
                }

                if( Gate::allows('delete') ){
                    $button .= '<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Delete</button>';
                }

                if(empty($button)){
                    return '<span class="text-danger" >  No Access</span>';
                }

                return $button;
            })



            ->rawColumns(['imageSrc', 'details', 'action'])
            ->make(true);
        }


        return view('admin.demo.all');
    }


    //insert
    public function Store(Request $request)
    {
        if(Gate::denies(['insert'])){
             return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $rules = array(
            'title'      =>  'required|unique:demos|max:50',
            'image'      =>  'required|image|mimes:jpeg,png,jpg|max:1000',
            'details'    =>  'required|max:20000',

        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else{

            $data = new Demo();

            // image load one with original image
            $image = $request->file('image'); //take data from view
            if ($image) {
                $image_name         = Str::random(5);  //random data create
                $ext                = strtolower($image->getClientOriginalExtension());
                $image_full_name    = $image_name . '.' . $ext;
                $upload_path_sm     = 'public/images/demo/small/';
                $image_url_sm       = $upload_path_sm . $image_full_name;

                // image resize from here

                $resize_image       = Image::make($image->getRealPath());
                $resize_image->resize(150, 150, function($constraint){
                    $constraint->aspectRatio();
                })->save($upload_path_sm . $image_full_name);

                // end image resize

                // upload original image
                $upload_path        = 'public/images/demo/original/';
                $image_url          = $upload_path . $image_full_name;

                Image::make($image)->save($image_url);
                //end upload original image

                // data insert from here
                $data->image_small  = $image_url_sm;
                $data->image        = $image_url;

            }
            //end   image load one with original image


            $data->title         = $request->title;
            $data->details       = $request->details;
            $data->created_by    = Auth::user()->id;

            $success = $data->save();


            if($success){
                return response()->json(['success' => 'Successfully Inserted', 'icon' => 'success'], 201);
            }else{
                return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 304);
            }
        }



    }


    //Edit
    public function Edit($id){

        if(request()->ajax())
        {
            $data = Demo::findOrFail($id);
            return response()->json($data, 200);
        }
    }


    //Update
    public function Update(Request $request){

        if(Gate::denies('edit')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $id = $request->hidden_id;

        $rules = array(
            'title'      =>  'required|unique:demos,title,'.$id,
            'image'      =>  'nullable|image|mimes:jpeg,png,jpg|max:1000',
            'details'    =>  'required|max:20000',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else
        {


            $data = Demo::findOrFail($id);


            // image load one with original image
            $image = $request->file('image'); //take data from view
            if ($image) {

                //delete image
                if(file_exists($data->image)){

                    $imgPath =$data->image;
                    $delImg = unlink($imgPath);
                }

                if(file_exists($data->image_small)){
                    $imgPath =$data->image_small;
                    $delImg = unlink($imgPath);
                }
                // end delete image process


                $image_name         = Str::random(5);  //random data create
                $ext                = strtolower($image->getClientOriginalExtension());
                $image_full_name    = $image_name . '.' . $ext;
                $upload_path_sm     = 'public/images/demo/small/';
                $image_url_sm       = $upload_path_sm . $image_full_name;

                // image resize from here

                $resize_image       = Image::make($image->getRealPath());
                $resize_image->resize(150, 150, function($constraint){
                    $constraint->aspectRatio();
                })->save($upload_path_sm . $image_full_name);

                // end image resize

                // upload original image
                $upload_path        = 'public/images/demo/original/';
                $image_url          = $upload_path . $image_full_name;

                Image::make($image)->save($image_url);
                //end upload original image

                // data insert from here
                $data->image_small  = $image_url_sm;
                $data->image        = $image_url;

            }
            //end   image load one with original image




            $data->title         = $request->title;
            $data->details       = $request->details;
            $data->created_by    = Auth::user()->id;
            $data->updated_at    = Carbon::now();
            $success             = $data->save();


            if($success){
                return response()->json(['success' => 'Successfully Updated', 'icon' => 'success'], 201);
            }else{
                return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 304);
            }

        }



    }



    //Delete
    public function Delete($id){

        if(Gate::denies('delete')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $data               = Demo::findOrFail($id);
        $data->delete_temp  = 1;
        $data->delete_by    = Auth::user()->id;
        $data->updated_at   = Carbon::now();
        $success            = $data->save();

        if($success){
            return response()->json(['success' => 'Successfully Deleted', 'icon' => 'success'], 200);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 500);
        }
    }


    //All Delete Data
    public function Deleted(){

        if(request()->ajax())
        {
            $data = Demo::with('del_by')->where('delete_temp', 1)->get();

            return DataTables::of($data)

                    ->addColumn('details', function($data){
                        $button = '';
                        $button .= '<img src='.asset($data->image_small).' width="100" height="100" class="img-thumbnail" /><br>';
                        $button .= '<p class="mb-0">  <b>Title: </b>'.$data->title.' </p>';
                        if(empty($button)){
                            return 'No data';
                        }
                        return $button;
                    })

                    ->addColumn('deleteInfo', function($data){
                        $button ='';

                        if($data->del_by){
                            $button .= '<button type="button" id="'.$data->delete_by.'" class="userInfoDetail btn"><img src='.asset($data->del_by->image_small).' width="100" height="100" class="img-thumbnail" /></button>';

                            $button .='<button type="button" id="'.$data->delete_by.'" class="userInfoDetail btn btn-secondary"> <i class="fa fa-eye" ></i> '.$data->del_by->name.'</button><br>';
                        }


                        $button .='Deleted Time: '. date("F j, Y, g:i a", strtotime($data->updated_at)) .'<br>';

                        return $button;
                    })



                    ->addColumn('action', function($data){

                        $button = '';

                        $button .= '<button id="'.$data->id.'" class="delete btn btn-danger btn-sm mr-1" ><i class="fa fa-trash" ></i> Delete </button>';

                        $button .= '<button id="'.$data->id.'" class="restore btn btn-success btn-sm" ><i class="fa fa-share-square-o" ></i> Restore </button>';


                        return $button;
                    })


                    ->rawColumns(['details','deleteInfo','action'])
                    ->make(true);
        }



        return view('admin.demo.deleted');
    }


    //Restore
    public function Restore($id){

        if(Gate::denies('administration')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $data = Demo::findOrFail($id);
        $data->delete_temp  = 0;
        $data->delete_by    = Auth::user()->id;
        $data->updated_at   = Carbon::now();
        $success            = $data->save();

        if($success){
            return response()->json(['success' => 'Successfully Restore', 'icon' => 'success'], 200);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 500);
        }
    }


    //Delete Permanent
    public function DeletePermanent($id){

        if(Gate::denies('administration')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $data = Demo::findOrFail($id);

        $imgName1 =$data->image;
        $imgName1_small =$data->image_small;


        //check this image have or  not in data base

        if(file_exists($imgName1)){
            unlink($imgName1);
        }

        if(file_exists($imgName1_small)){
            unlink($imgName1_small);
        }


        $success = $data->delete();

        if($success){
            return response()->json(['success' => 'Successfully Deleted', 'icon' => 'success'], 200);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 500);
        }
    }


    //Status
    public function Status(){

        if(Gate::denies('publish')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        if(request()->ajax()){
            $id             = request()->id;
            $value          = request()->makeValue;

            $data             = Demo::find($id);
            $data->status     = $value;
            $data->updated_at = Carbon::now();
            $success          = $data->save();

            if($success){
                return response()->json('ok', 201);
            }else{
                return response()->json('error', 304);
            }

        }

    }




}
