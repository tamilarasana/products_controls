<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller{



    public function cate(Request $request){

        $this->validate($request, [
            'cid'       =>      'required',
            'cname'     =>       'required'
        ],
        
            [
                'cid.required'  =>     'Category ID Required',
                'cname.required'   =>     'Category Name Required'
           ]
        
    );

        $category = new Category;
        $category->cid = $request->cid;
        $category->cname = $request->cname;

        if($category->save()){

            return redirect('category')->with('message','Data added Successfully');

        }
            /*echo "Insert Successfully";

        }else{
            echo "failled";
        }*/

    }


    public function getData(){

        $data['data']=DB::table('category')->get();
        if (count($data)>0)
        {
            return view('category',$data);

        }
        else
        {
            return view('category', $data);
        }

    }

    public function edit($id){

        $data = Category::find($id);
        return view('new.cate_edit', compact('data','id'));
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'cid'       =>      'required',
            'cname'     =>       'required'
        ]);

        $data = Category::find($id);
        $data->cid = $request->get('cid');
        $data->cname = $request->get('cname');
        $data->save();
        return redirect('category')->with('success', 'Data Updated');
    }

    public function destroy(Request $request, $id){
        $data = Category::find($id);
        $data->delete();
        return redirect('category')->with('success', 'Data deleted');

    }

}

