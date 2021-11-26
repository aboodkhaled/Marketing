<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\cuontry;
use App\Http\Requests\CuontryRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class CuontryController extends Controller
{
    public function index(){
      
        $cuontrys = cuontry::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.cuontry.cuontry',compact('cuontrys'));
    }

    public function create(){
        return view('admin.country.cuontry');
    }
     
    public function store(CuontryRequest $request){
        

        $validated = $request->validated;
            $cuontry = new cuontry();
            $cuontry->name =['en'=> $request->name_en,'ar'=>$request->name];
           
            $cuontry->save();
            toastr()->success(trans('messages.success'));

        return redirect()->route('admin.cuontries.index');

    
}

 public function edit($id){
  

 }

 public function update(CuontryRequest $request){
    
        $validated = $request->validated;
    $cuontrys =  cuontry::findOrFail($request->id);
    
    $cuontrys -> update([

        $cuontrys ->name =['en'=> $request->name_en,'ar'=>$request->name],
    ]);
    toastr()->success(trans('messages.Update'));

    return redirect()->route('admin.cuontries.index');

  
   
  
  
  
  
 }

 public function destroy(Request $request){
   
        $cuontry = cuontry::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('admin.cuontries.index');
    }

        
}
