<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hosting;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use Gate;
use Carbon\Carbon;
use Auth;

class HostingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //All Data
    public function All(){


        if(request()->ajax())
        {
            $data = Hosting::latest();


            return DataTables::of($data)

                ->addColumn('pirce', function($data){
                    $button = '';

                    if($data->old_price){
                        $button .= 'Old : <del>'.$data->old_price.'</del><br>';
                    }

                    if($data->final_price){
                        $button .= 'New : <b>'.$data->final_price.'</b>';
                    }

                    return $button;
                })

                ->addColumn('action', function($data){

                    $button = '';
                    if( Gate::allows('publish') ){

                        if($data->status == 1){
                            $button .= '<button type="button" id="'.$data->id.'" makeValue="0" class="status btn btn-success btn-sm ml-1"><i class="fa fa-check"></i> Active</button>';
                        }
                        else{
                            $button .= '<button type="button" id="'.$data->id.'" makeValue="1" class="status btn btn-warning btn-sm ml-1"><i class="fa fa-times"></i> Inactive</button>';
                        }
                    }

                    if( Gate::allows('edit') ){
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm mr-1" ><i class="fas fa-edit"></i> Edit</button>';
                    }

                    if( Gate::allows('delete') ){
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Delete</button>';
                    }

                    if(empty($button)){
                        return '<span class="text-danger" >  No Access</span>';
                    }

                    return $button;
                })

                ->rawColumns(['pirce', 'action'])
                ->make(true);
        }


        return view('admin.hosting.all');
    }


    //insert
    public function Store(Request $request)
    {
        if(Gate::denies(['insert'])){
             return response()->json(['success' => 'Sorry !! You have no access.', 'icon' => 'error'], 401);
        }

        $rules = array(
            'plan_name'         =>  'required|unique:hostings|max:100',
            'storage'           =>  'required|max:100',
            'monthly_transfer'  =>  'required|max:100',
            'control_panel'     =>  'required|max:100',
            'domain'            =>  'required|max:100',
            'subdomain'         =>  'required|max:100',
            'email_account'     =>  'required|max:100',
            'database'          =>  'required|max:100',
            'old_price'         =>  'required',
            'final_price'       =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else{

            $data = new Hosting();

            $data->plan_name        = $request->plan_name;
            $data->storage          = $request->storage;
            $data->monthly_transfer = $request->monthly_transfer;
            $data->control_panel    = $request->control_panel;
            $data->domain           = $request->domain;
            $data->subdomain        = $request->subdomain;
            $data->email_account    = $request->email_account;
            $data->database         = $request->database;
            $data->old_price        = $request->old_price;
            $data->final_price      = $request->final_price;
            $data->created_by       = Auth::user()->id;
            $success                = $data->save();


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
            $data = Hosting::findOrFail($id);
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
            'plan_name'         =>  'required|unique:hostings,plan_name,'.$id,
            'storage'           =>  'required|max:100',
            'monthly_transfer'  =>  'required|max:100',
            'control_panel'     =>  'required|max:100',
            'domain'            =>  'required|max:100',
            'subdomain'         =>  'required|max:100',
            'email_account'     =>  'required|max:100',
            'database'          =>  'required|max:100',
            'old_price'         =>  'required',
            'final_price'       =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()], 406);
        }
        else
        {


            $data = Hosting::findOrFail($id);

            $data->plan_name        = $request->plan_name;
            $data->storage          = $request->storage;
            $data->monthly_transfer = $request->monthly_transfer;
            $data->control_panel    = $request->control_panel;
            $data->domain           = $request->domain;
            $data->subdomain        = $request->subdomain;
            $data->email_account    = $request->email_account;
            $data->database         = $request->database;
            $data->old_price        = $request->old_price;
            $data->final_price      = $request->final_price;
            $data->created_by       = Auth::user()->id;
            $data->updated_at       = Carbon::now();
            $success                = $data->save();

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

        $data       = Hosting::findOrFail($id);
        $success    = $data->delete();

        if($success){
            return response()->json(['success' => 'Successfully Deleted', 'icon' => 'success'], 202);
        }else{
            return response()->json(['success' => 'Something going wrong !!', 'icon' => 'error'], 304);
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

            $data             = Hosting::find($id);
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
