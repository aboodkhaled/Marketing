<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\serve;
use  App\model\serve_p;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class ServePController extends Controller
{
    public function index(){
      
        $serve_ps = serve_p::orderBy('id')->paginate(PAGINATION_COUNT);
        $serves = serve::get();
        return view('admin.serve_p.index',compact('serve_ps','serves'));
    }

    public function create(){
        $cuontrys = cuontry::get();
        return view('admin.city.create',compact('cuontrys'));
    }
     
    public function store(Request $request){
        
        $List_Classes = $request->List_Classes;
       

        try {
            foreach ($List_Classes as $List_Class) {

                $serve_ps = new serve_p();

                $serve_ps->name = ['en' => $List_Class['name_servep_en'], 'ar' => $List_Class['name']];

                $serve_ps->serve_id = $List_Class['serve_id'];

                $serve_ps->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('admin.serve_ps.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

}

 public function edit($city_id){
  $city =  city::find($city_id);
  if(!$city)
  return redirect()->route('admin.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  $cuontry = cuontry::get();
   return view('admin.city.edit',compact('city','cuontry'));

 }

 public function update(Request $request){
    try {

        $serve_ps = serve_p::findOrFail($request->id);

        $serve_ps->update([

            $serve_ps->name = ['ar' => $request->name, 'en' => $request->name_en],
            $serve_ps->serve_id = $request->serve_id,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('admin.serve_ps.index');
    }

    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


 }

 public function destroy(Request $request){
    $serve_ps = serve_p::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('admin.serve_ps.index');


    }
}
