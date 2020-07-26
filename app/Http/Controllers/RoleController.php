<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use Gate;
use Carbon\Carbon;
use Auth;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //All Data
    public function All(){


        if(request()->ajax())
        {
            $data = Role::with('user')->latest();


            return DataTables::of($data)

                ->addColumn('action', function($data){

                    $button = '';

                    if( Gate::allows('edit') ){
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit</button>';
                    }

                    if( Gate::allows('delete') ){
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Delete</button>';
                    }

                    if(empty($button)){
                        return '<span class="text-danger" >  No Access</span>';
                    }

                    return $button;
                })

                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.role.all');
    }


    //insert
    public function Store(Request $request)
    {
        if(Gate::denies(['insert'])){
             return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 403);
        }


        $rules = array(
            'name'    =>  'required|unique:roles|max:50',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else{

            $data = new Role();

            $rName = ucwords(strtolower($request->name));

            $data->name         = $rName;
            $data->created_by   = Auth::user()->id;
            $success            = $data->save();


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
            $data = Role::findOrFail($id);
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
            'name'    =>  'required|unique:roles,name,'.$id,
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else
        {


            $data = Role::findOrFail($id);

            $rName = ucwords(strtolower($request->name));

            $data->name         = $rName;
            $data->created_by   = Auth::user()->id;
            $data->updated_at   = Carbon::now();
            $success            = $data->save();

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

        $data       = Role::findOrFail($id);
        $success    = $data->delete();

        if($success){
            return response()->json(['success' => 'Successfully Deleted', 'icon' => 'success'], 202);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 304);
        }
    }



}
