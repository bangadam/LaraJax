<?php

namespace App\Http\Controllers;

use App\Crud;
use Validator, Response, Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function crud(){
      $data['crud'] = Crud::all();
      return view('crud.index', $data)->withTitle('Crud');
    }

    public function edit($id){
      $crud = Crud::find($id);
      return Response::json($crud);
    }

    public function store(Request $request){
      $rules = array(
        'first_name' => 'required|min:3',
        'last_name'  => 'required|min:3',
        'address'    => 'required',
        'email'      => 'required|email|unique:crud,email'
      );

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'succes'  => false,
          'errors'  =>  $validator->errors()->toArray()
        ]);
      }
      $crud = Crud::create($request->all());

      return response()->json([
        'success'  =>  true,
        'data'    =>  $crud
      ]);
    }

    public function update(Request $request, $id){
      $rules = array(
        'first_name'  =>  'required|min:3',
        'last_name'   =>  'required|min:3',
        'address'     =>  'required',
        'email'       =>  'required|email|unique:crud,email, '. $id .', id'
      );

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'success'   =>  false,
          'errors'    =>  $validator->errors()->toArray()
        ]);
      }

      $crud = Crud::findOrFail($id);
      $crud->update($request->all());

      return response()->json([
        'success'   =>  true,
        'data'      =>  $crud
      ]);
    }

    public function destroy($id){
      Crud::destroy($id);
      return response()->json([
        'success' => true,
      ]);
    }
}
