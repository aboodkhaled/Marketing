<?php

namespace App\Repository;
use App\model\city;
use App\model\item;
use App\model\customar;
use Illuminate\Support\Facades\Notification;
use App\model\customar_attach;
use App\model\customar_item;
use App\model\admin;
use Hash;
use Auth;
use App\Image;
use PDF;
use DB;
use App\model\customar_detail;

class CustomarRepository implements CustomarRepositoryInterface{
    public function create_customar(){
        $data['citys'] = city::get();
        $data['items'] = item::get();
        return view('admin.customar.add',$data);
    }

    public function create_item(){
        $data['items'] = item::get();
        return view('admin.customar.show',$data);
    }

    public function store_customar($request){
       
        if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $filepath = "";
            if($request->has('photo')){
                $filepath = uploadImage('customar', $request->photo);}
               
               
                $customars = new customar();
                $customars->name =$request->name;
                $customars->photo =$filepath;
                $customars->name_com =$request->name_com;
                $customars->num_pt =$request->num_pt;
                $customars->edate =$request->edate;
                $customars->num_se =$request->num_se;
                $customars->num_ta =$request->num_ta;
                $customars->num_pz =$request->num_pz;
                $customars->email =$request->email;
                $customars->mobile =$request->mobile;
                $customars->password =bcrypt($request->password);
                $customars->city_id =$request->city_id;
                $customars->item_id = $request->item_id;
                $customars->active =$request->active;
               
                
                $customars->save();
                
                $filepatht = "";
                if($request->has('name_file')){
                
                    $filepatht = uploadImage('customar', $request->name_file);
                 
                $customar_id = customar::latest()->first()->id;
                $customar_attachs = new customar_attach();
                $customar_attachs-> name_file = $filepatht;
                $customar_attachs->customar_id = $customar_id;
                
                $customar_attachs->save();}
                $customar_e = customar::latest()->first()->item_id;
                $customar_id = customar::latest()->first()->id;
                $customar_items = new customar_item();
                $customar_items->item_id = $customar_e;
                $customar_items->customar_id = $customar_id;
                $customar_items->save();

               
            toastr()->success(trans('messages.success'));
            return redirect()->route('admin.customars.index');


    }

    public function show_customar($id){
        $customar = customar::findOrFail($id);
        $items = item::get();
        return view('admin.customar.show',compact('customar','items'));
    }

    public function upload_customar($request){
        $filepatht="";
        if($request->has('name_file')){
                
            $filepatht = uploadImage('customar', $request->name_file);
        $customar_attachs = new customar_attach();
        $customar_attachs->name_file=$filepatht; 
        $customar_attachs->customar_id=$request->customar_id; 
        
        $customar_attachs->save();
       }

       toastr()->success(trans('messages.success'));
       return redirect()->route('admin.customars.show',$request->customar_id);


    }

    public function upitem_customar($request){
        $customar_items = new customar_item();
        $customar_items->item_id=$request->item_id;  
        $customar_items->customar_id=$request->customar_id; 
        
        $customar_items->save();
      
        $admin = admin::get();
        $customar = customar::latest()->first();
       // $admin->notify(new \App\Notifications\Add_customar($customar));
       Notification::send($admin, new \App\Notifications\Add_customar($customar));
       toastr()->success(trans('messages.success'));
       return redirect()->route('admin.customars.show',$request->customar_id);

    }
    public function oke($request){
        $List_Classes = $request->List_Classes;
       

        
            foreach ($List_Classes as $List_Class) {

                $customar_details = new customar_detail();

                $customar_details->year_q = $List_Class['year_q'];
                $customar_details->month_q = $List_Class['month_q'];
                $customar_details->tasreh_q = $List_Class['tasreh_q'];
                $customar_details->months = $List_Class['months'];
                $customar_details->monthe = $List_Class['monthe'];
                $customar_details->customar_id = $List_Class['customar_id'];

                $customar_details->item_id = $List_Class['item_id'];

                $customar_details->save();}

                toastr()->success(trans('messages.success'));
       return redirect()->route('admin.customars.show',$List_Class['customar_id']);

            
    }

    public function download_customar( $name_file){

        return response()->download(public_path('assets/images/customar/'.$name_file));
    }


    public function deletee_customar($request){
        $customar_attach = customar_attach::where('id',$request->id)->where('name_file',$request->name_file)->delete();
        toastr()->error(trans('messages.Delete'));
            return redirect()->route('admin.customars.show',$request->customar_id);
    }

    public function deletee_item($request){
        $customar_item = customar_item::where('id',$request->id)->where('item_id',$request->item_id)->delete();
        toastr()->error(trans('messages.Delete'));
            return redirect()->route('admin.customars.show',$request->customar_id);
    }

    public function edit_customar($id){
        $data['citys'] = city::get();
        $data['items'] = item::get();
        $customars = customar::findOrFail($id);
        return view('admin.customar.edit',$data,compact('customars'));
    }

    public function update_customar($request){
        DB::beginTransaction();
        if(!$request->has('active'))
        $request->request->add(['active' => 0]);
        else
        $request->request->add(['active' => 1]);
        $filepath = "";
        if($request->has('photo')){
            $filepath = uploadImage('customar', $request->photo);}
            $filepatht = "";
            if($request->has('name_file')){
                $filepatht = uploadImage('customar', $request->name_file);}
            $customars = customar::findOrFail($request->id);
           
            
            $customars->update($request -> except('_token','id','photo'));

            DB::commit();
           
        toastr()->success(trans('messages.Update'));
        return redirect()->route('admin.customars.index');
    }

    public function delete_customar($request){
        
            $customars = customar::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('admin.customars.index');
        
        
    }
}
