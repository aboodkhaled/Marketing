@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row"   style="background-color: ; margin-top: 90px;">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                

                <form method="post"  action="{{ route('admin.users.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">بيانات </h6><br>
                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ألصورة : </label>
                                    <input type="file"  name="photo" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم ألمستخدم: <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  ألائميل   :</label>
                                    <input  type="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <div class="row  col-md-12">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>كلمة السر     :</label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاكيد كلمة السر     :</label>
                                    <input  type="password" name="password_confirmation" class="form-control" >
                                </div>
                            </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">الصلاحية : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="role_id">
                                        <option selected disabled>اختر الصلاحية...</option>
                                        @if($roles && $roles -> count() > 0)
                                                                        @foreach($roles as $role)
                                            <option  value="{{$role -> id }}">{{$role -> name}}</option>
                                            @endforeach
                                                                    @endif
                                    </select>
                                </div>
                            </div>
                            

                            </div>
                        </div>

                                

                           

                                        


                                        

                                  
                            
                            <div class="col-md-12"> 
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('city_trans.submit')}}</button>
                </form>

            </div>
                        </div>

                           
                            
                        </div>

                    
                
                            
                            
                      
                    

            
            </div>
        </div>
    </div>
</div>
</div>





</div>
</div>


<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
