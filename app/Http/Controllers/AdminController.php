<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use Gate;
use Carbon\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //All Data
    public function All(){

        $roleData = Role::orderBy('name')->get();

        if(request()->ajax())
        {
            $data = User::with('roles')->latest();


            return DataTables::of($data)

                ->addColumn('ImgSrc', function($data){
                    $url=asset($data->image_small);
                    $button = '<button type="button" id="'.$data->id.'" class="userInfoDetail btn"><img src='.$url.' width="100" height="100" class="img-thumbnail" /></button>';
                    return $button;
                })


                ->addColumn('details', function($data){
                    $details = '';
                    $details .= '<b>Name :</b> '.$data->name.'<br>';
                    $details .= '<b>Email :</b> '.$data->email.'<br>';
                    $details .= '<b>Updated : </b>'. date("F j, Y, g:i a", strtotime($data->updated_at)).'<br>';
                    $details .= '<b>Register : </b>'. date("F j, Y, g:i a", strtotime($data->created_at));

                    return $details;

                })

                ->addColumn('roles', function($data){
                    $button = '';
                    $roleData = implode(', ', $data->roles()->pluck('name')->toArray());

                    if(empty($roleData)){
                        $button .= '<span class="text-danger" > No Role Define</span>';
                    }else{
                        $button .= $roleData;
                    }

                    return $button;

                })


                ->addColumn('action', function($data){

                    $button = '';

                    if( Gate::allows('edit') ){
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm ml-1" ><i class="fas fa-edit"></i> Edit</button>';
                    }

                    if( Gate::allows('delete') ){
                        $button .= '<button type="button" name="Delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-1"><i class="fa fa-trash" ></i> Delete</button>';
                    }

                    if(empty($button)){
                        return '<span class="text-danger" >  No Access</span>';
                    }

                    return $button;
                })

                ->rawColumns(['ImgSrc', 'details', 'roles', 'action'])
                ->make(true);
        }


        return view('admin.admin.all', compact('roleData'));
    }


    //insert
    public function Store(Request $request)
    {
        if(Gate::denies(['insert'])){
             return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $rules = array(
            'email'    =>  'required|unique:users|max:50',
            'name'     =>  'required|max:30',
            'password' =>  'required|max:30',
            'image'    => 'required|max:500|mimes:jpg,jpeg,png',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else{

            $pingType = $request->pingType;



            $data = new User();


            $image = $request->file('image');
            if ($image) {
                $image_name           = Str::random(5);
                $ext                  = strtolower($image->getClientOriginalExtension());
                $image_full_name      = str_replace(' ', '_', $request->name)."_".$image_name . '.' . $ext;
                //Small ImageUpload Path
                $upload_path_small    = 'public/images/users/small/';
                $image_url_small      = $upload_path_small . $image_full_name;

                //Image Resize
                $resize_image         = Image::make($image->getRealPath());
                 $resize_image->resize(150, 150, function($constraint){
                     $constraint->aspectRatio();
                })->save($upload_path_small . '/' . $image_full_name);

                //Original Image Upload Path
                $upload_path_original = 'public/images/users/original/';
                $image_url_original   = $upload_path_original . $image_full_name;

                Image::make($image)->save($image_url_original);

                //Data Store In DB Object
                $data->image_small    = $image_url_small;
                $data->image          = $image_url_original;

            }



            $data->email      = $request->email;
            $data->name       = $request->name;
            $data->password   = Hash::make($request->password);
            $success          = $data->save();

            //Role Data Sync
            $roleData         = $request->roles;
            $roleSuccess      = $data->roles()->sync($roleData);



            if($success){
                return response()->json(['success' => 'Successfully Inserted', 'icon' => 'success'], 201);
            }else{
                return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 306);
            }
        }



    }


    //Edit
    public function Edit($id){

        if(request()->ajax())
        {
            $data = User::findOrFail($id);

            $rolesData = Role::get();

            foreach ($rolesData as $role){

                 $check = '';
                 //Check role id and user id
                 if($data->roles->pluck('id')->contains($role->id)){
                     $check .= "checked";
                 }

                 $roles []=['

                     <input type="checkbox" class="custom-control-input" id="ch_e'.$role->id.'"  value="'.$role->id.'" name="roles[]" '. $check.'><label class="custom-control-label" for="ch_e'.$role->id.'">'.$role->name.' </label>
                 '];

            }

            return response()->json([ 'data' => $data, 'roles' => $roles], 200);
        }
    }


    //Update
    public function Update(Request $request){

        if(Gate::denies('edit')){
            return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $id = $request->hidden_id_2;

        $rules = array(
            'email'    =>  'required|unique:users,email,'.$id,
            'name'     =>  'required|max:30',
            'password' =>  'nullable|max:30',
            'image'    =>  'nullable|max:500|mimes:jpg,jpeg,png',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else
        {

            $data = User::findOrFail($id);

            $image = $request->file('image');
            if ($image) {

                //Delete Image
                $image_path           = $data->image;
                if(!empty($image_path)){
                    //unlink(public_path($image_path));
                    unlink($image_path);
                }
                //Delete Small Image
                $image_small_path     = $data->image_small;
                if(!empty($image_small_path)){
                    unlink($image_small_path);
                }

                $image_name           = Str::random(5);
                $ext                  = strtolower($image->getClientOriginalExtension());
                $image_full_name      = str_replace(' ', '_', $request->name)."_".$image_name . '.' . $ext;
                //Small ImageUpload Path
                $upload_path_small    = 'public/images/users/small/';
                $image_url_small      = $upload_path_small . $image_full_name;

                //Image Resize
                $resize_image         = Image::make($image->getRealPath());
                 $resize_image->resize(150, 150, function($constraint){
                     $constraint->aspectRatio();
                })->save($upload_path_small . '/' . $image_full_name);

                //Original Image Upload Path
                $upload_path_original = 'public/images/users/original/';
                $image_url_original   = $upload_path_original . $image_full_name;

                Image::make($image)->save($image_url_original);

                //Data Store In DB Object
                $data->image_small    = $image_url_small;
                $data->image          = $image_url_original;

            }

            if($request->password){
                $data->password   = Hash::make($request->password);
            }

            $data->email      = $request->email;
            $data->name       = $request->name;
            $data->updated_at = Carbon::now();
            $success          = $data->save();

            //Role Data Sync
            $roleData         = $request->roles;
            $roleSuccess      = $data->roles()->sync($roleData);



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

        $data       = User::findOrFail($id);
        //Delete User All Roles
        $data->roles()->sync(null);


        //Delete Image
        $image_path           = $data->image;
        if(!empty($image_path)){
            //unlink(public_path($image_path));
            unlink($image_path);
        }
        //Delete Small Image
        $image_small_path     = $data->image_small;
        if(!empty($image_small_path)){
            unlink($image_small_path);
        }

        $success    = $data->delete();

        if($success){
            return response()->json(['success' => 'Successfully Deleted', 'icon' => 'success'], 202);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 304);
        }
    }



}

