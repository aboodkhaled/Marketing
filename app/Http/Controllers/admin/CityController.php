<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\cuontry;
use  App\model\city;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;



class CityController extends Controller
{
    public function index(){
      
        $citys = city::orderBy('id')->paginate(PAGINATION_COUNT);
        $cuontrys = cuontry::get();
        return view('admin.city.index',compact('citys','cuontrys'));
    }

    public function create(){
        $cuontrys = cuontry::get();
        return view('admin.city.create',compact('cuontrys'));
    }
     
    public function store(Request $request){
        
        $List_Classes = $request->List_Classes;
       

        try {
            foreach ($List_Classes as $List_Class) {

                $citys = new city();

                $citys->name = ['en' => $List_Class['name_city_en'], 'ar' => $List_Class['name']];

                $citys->cuontry_id = $List_Class['cuontry_id'];

                $citys->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('admin.cities.index');
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

        $citys = city::findOrFail($request->id);

        $citys->update([

            $citys->name = ['ar' => $request->name, 'en' => $request->name_en],
            $citys->cuontry_id = $request->cuontry_id,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('admin.cities.index');
    }

    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


 }

 public function destroy(Request $request){
    $citys = city::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('admin.cities.index');


    }
}
