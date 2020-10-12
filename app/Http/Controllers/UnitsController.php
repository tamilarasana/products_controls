<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Unit;

class UnitsController extends Controller
{
    public function units(Request $request){
        $validation = $request->validate([
        /*$this->validate($request, [*/

            'uid'       =>      'required',
            'uname'     =>       'required'
        ],

        [
             'uid.required'     =>     'Unit ID Required',
             'uname.required'   =>     'Unit Name Required'
        ]
       );

            /* print_r($validation);*/

		$unit = new Unit;
        $unit->uid = $request->uid;
    	$unit->uname = $request->uname;


    	if($unit->save()){
            return redirect('units')->with('success','Data added Successfully');
        }
    		/*echo "Insert Successfully";
    	}else{
    		echo "failled";
    	}*/

    }



    public function getData(){

        $data['data']=DB::table('unit')->get();
        if (count($data)>0)
        {
            return view('units',$data);

        }
        else
        {
            return view('units');
        }


    }

    public function edit($id){

        $data = Unit::find($id);
        return view('new.unit_edit', compact('data','id'));
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'uid'       =>      'required',
            'uname'     =>       'required'
        ]);

        $data = Unit::find($id);
        $data->uid = $request->get('uid');
        $data->uname = $request->get('uname');
        $data->save();
        return redirect('units')->with('success', 'Data Updated');
    }


    public function destroy(Request $request, $id){
        $data = Unit::find($id);
        $data->delete();
        return redirect('units')->with('success', 'Data deleted');

    }



}
