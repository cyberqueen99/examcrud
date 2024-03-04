<?php

namespace App\Http\Controllers;

use App\Models\ExamCrud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function form_view(){
        return view('crud.insert_form');
    }

    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ]);

        $data_insert = new ExamCrud();
        $data_insert->name=$request->name;
        $data_insert->email=$request->email;
        $data_insert->mobile=$request->mobile;
        $data_insert->save();

        return redirect()->route('form');
    }


    public function display(){
        $data=ExamCrud::all();
        return view('crud.table_display', compact('data'));
    }

    public function edit($id){
        $data=ExamCrud::find($id);
        return view('crud.edit_form', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ]);

        $data_update=ExamCrud::find($id);
        $data_update->name=$request->name;
        $data_update->email=$request->email;
        $data_update->mobile=$request->mobile;
        $data_update->save();

        return redirect()->route('display');
    }

    public function delete($id){
        $data=ExamCrud::find($id)->delete();
        return redirect()->route('display');
    }
}
