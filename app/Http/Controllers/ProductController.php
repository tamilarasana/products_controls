<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller
{
    public function products(Request $request){

        $validation = $request -> validate([
            'pid'        =>     'required',
            'pcode'      =>     'required',
            'pcategory'  =>     'required',
            'punit'      =>     'required',
            'pprice'     =>     'required'

        ],

            [
                'pid.required'        =>     'Product ID Pequired',
                'pcode.required'      =>     'Product ID Pequired',
                'pcategory.required'  =>     'Product ID Pequired',
                'punit.required'      =>     'Product ID Pequired',
                'pprice.required'     =>     'Product ID Pequired'

           ]

    );

         /* print_r($validation);*/


            $product = new Product;
            $product->pid = $request->pid;
            $product->pcode = $request->pcode;
            $product->pcategory = $request->pcategory;
            $product->punit = $request->punit;
            $product->pprice = $request->pprice;

            if($product->save()){

                return redirect('products')->with('message','Data added Successfully');
            }
                   /* echo "Insert Successfully";
                }else{
                    echo "failled";
                }*/

    }

    public function getData(){
           $data['data']=DB::table('product')->get();
           $data['category'] = DB::table('category')->get();
           $data['unit'] = DB::table('unit')->get();


                if (count($data)>0){
                return view('products',$data);
                }
                else
                {
                    return view('products',$data);
                }

    }



    public function edit($id){
        $data = Product::find($id);
        return view('new.prod_edit', compact('data','id'));
        }


    public function update(Request $request, $id){
            $this->validate($request, [
            'pid'         =>      'required',
            'pcode'       =>      'required',
            'pcategory'   =>      'required',
            'punit'       =>      'required',
            'pprice'     =>       'required'
            ]);

            $data = Product::find($id);
            $data->pid = $request->get('pid');
            $data->pcode = $request->get('pcode');
            $data->pcategory = $request->get('pcategory');
            $data->punit = $request->get('punit');
            $data->pprice = $request->get('pprice');
            $data->save();
            return redirect('products')->with('success', 'Data Updated');
    }


    public function destroy(Request $request, $id){
            $data = Product::find($id);
            $data->delete();
            return redirect('products')->with('success', 'Data deleted');

    }
}
