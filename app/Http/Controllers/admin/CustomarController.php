<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\customar;
use  App\model\item;
use  App\model\city;
use App\Http\Requests\CustomarRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use App\Repository\CustomarRepositoryInterface;
use Hash;
use Auth;
use App\model\customar_attach;
use App\model\customar_item;
use App\model\customar_detail;
use PDF;

use App\Image;
class CustomarController extends Controller
{

protected $customar;
public function __construct(CustomarRepositoryInterface $customar){
    $this->customar = $customar;
}

    public function index(){
      
        $customars = customar::orderBy('id')->paginate(PAGINATION_COUNT);
        
        return view('admin.customar.index',compact('customars'));
    }

    public function create_item(){
     return   $this->customar->create_item();
    }

    public function create(){
        return   $this->customar->create_customar();
       }
     
    public function store(CustomarRequest $request){

        return $this->customar->store_customar($request);
}

public function show($id){
    return $this->customar->show_customar($id);
 }

 public function upload(Request $request){
    return $this->customar->upload_customar($request);
 }

 public function upitem(Request $request){
    return $this->customar->upitem_customar($request);
 }

 public function oke(Request $request){
   return $this->customar->oke($request);
}
 public function download( $name_file){
    return $this->customar->download_customar($name_file);
 }

 public function deletee_customar( Request $request){
    return $this->customar->deletee_customar($request);
 }

 public function deletee_item( Request $request){
    return $this->customar->deletee_item($request);
 }


 public function edit($id){
    return $this->customar->upload_customar($request);
 }

 public function update(Request $request){
    
    return $this->customar->update_customar($request);

 }

 public function destroy(Request $request){
    return $this->customar->delete_customar($request);


    }
}
