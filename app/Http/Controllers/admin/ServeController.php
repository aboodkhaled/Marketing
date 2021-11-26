<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\serve;
use App\Http\Requests\ServeRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;


class ServeController extends Controller
{
    public function index(){
      
        $serves = serve::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.serve.serve',compact('serves'));
    }

    public function create(){
        return view('admin.country.cuontry');
    }
     
    public function store(ServeRequest $request){
        

        $validated = $request->validated;
            $serve = new serve();
            $serve->name =['en'=> $request->name_en,'ar'=>$request->name];
           
            $serve->save();
            toastr()->success(trans('messages.success'));

        return redirect()->route('admin.serves.index');

    
}

 public function edit($cuontry_id){
  $cuontry =  cuontry::find($cuontry_id);
  if(!$cuontry)
  return redirect()->route('admin.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('admin.country.cuontry',compact('cuontry'));

 }

 public function update(ServeRequest $request){
    
        $validated = $request->validated;
    $serves =  serve::findOrFail($request->id);
    
    $serves -> update([

        $serves ->name =['en'=> $request->name_en,'ar'=>$request->name],
    ]);
    toastr()->success(trans('messages.Update'));

    return redirect()->route('admin.serves.index');

  
   
  
  
  
  
 }

 public function destroy(Request $request){
   
        $serve = serve::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('admin.serves.index');
    }

        
}
