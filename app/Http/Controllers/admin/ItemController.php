<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class ItemController extends Controller
{
    public function index(){
      
        $items = item::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.item.item',compact('items'));
    }

    public function create(){
        return view('admin.country.cuontry');
    }
     
    public function store(ItemRequest $request){
        

        $validated = $request->validated;
            $item = new item();
            $item->name =$request['name'];
            $item->price=$request['price'];
            $item->save();
            toastr()->success(trans('messages.success'));

        return redirect()->route('admin.items.index');

    
}

 public function edit($cuontry_id){
  $cuontry =  cuontry::find($cuontry_id);
  if(!$cuontry)
  return redirect()->route('admin.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('admin.country.cuontry',compact('cuontry'));

 }

 public function update(ItemRequest $request){
    
        $validated = $request->validated;
    $items =  item::findOrFail($request->id);
    
    $items -> update([

        $items ->name =$request['name'],
        $items ->price=$request['price'],
    ]);
    toastr()->success(trans('messages.Update'));

    return redirect()->route('admin.items.index');

  
   
  
  
  
  
 }

 public function destroy(Request $request){
   
        $item = item::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('admin.items.index');
    }

        
}
