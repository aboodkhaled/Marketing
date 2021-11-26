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

                <form method="post"  action="{{ route('admin.customars.update', $customars->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$customars -> id}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$customars -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألطبيب  ">
                                                </div>
                                            </div>
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"> :تعديل بيانات العميل : {{$customars->name}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم ألمالك: <span class="text-danger">*</span></label>
                                    <input value="{{$customars->name}}" type="text" name="name"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم المنشاة: <span class="text-danger">*</span></label>
                                    <input  value="{{$customars->name_com}}" class="form-control" name="name_com" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ألصورة : </label>
                                    <input value="{{$customars->photo}}" type="file"  name="photo" class="form-control" >
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hglvtr : </label>
                                    <input value="{{$customars->name_file}}" type="file"  name="name_file" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم البطاقة  :</label>
                                    <input value="{{$customars->num_pt}}"  type="number" name="num_pt" class="form-control" >
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ  ألاصدار  :</label>
                                    <input  value="{{$customars->edate}}" type="date" name="edate" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم   السجل التجاري  :</label>
                                    <input  value="{{$customars->num_se}}" type="number" name="num_se" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ألرقم ألضريبي  :</label>
                                    <input value="{{$customars->num_ta}}"  type="number" name="num_ta" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم البطاقة الزكوية   :</label>
                                    <input  value="{{$customars->num_pz}}" type="number" name="num_pz" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم ألهاتف    :</label>
                                    <input value="{{$customars->mobile}}"  type="number" name="mobile" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  ألائميل   :</label>
                                    <input value="{{$customars->email}}"  type="email" name="email" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>كلمة السر     :</label>
                                    <input value="{{$customars->password}}"  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاكيد كلمة السر     :</label>
                                    <input  value="{{$customars->password}}" type="password" name="password_confirmation" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">ألمحافظة} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="city_id">
                                        <option selected disabled>اختر المحافظة...</option>
                                        @foreach($citys as $city)
                                        <option
                                                                                value="{{$city -> id }}"
                                                                                @if($customars -> city_id == $city -> id) selected @endif
                                                                                {{$city -> name}}>{{$city -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">ألاصناف : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="item_id">
                                        <option selected disabled>اختر ألصنف...</option>
                                        @foreach($items as $item)
                                        <option
                                                                                value="{{$city -> id }}"
                                                                                @if($customars -> item_id == $item -> id) selected @endif
                                                                                {{$item -> name}}>{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>  ألحالة  :</label>
                                    <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($customars -> active  == 1 ) checked @endif/>
                                </div>
                            </div>
                           
                        </div>

                    
                
                            
                            

                            

                        

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="academic_year">{{trans('Students_trans.Attachments')}} : <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>



                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('city_trans.submit')}}</button>
                </form>

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
