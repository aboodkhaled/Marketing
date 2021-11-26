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
                

                <form method="post"  action="{{ route('admin.customars.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">بيانات العميل</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم ألمالك: <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم المنشاة: <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_com" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ألصورة : </label>
                                    <input type="file"  name="photo" class="form-control" >
                                </div>
                            </div>

                            


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم البطاقة  :</label>
                                    <input  type="number" name="num_pt" class="form-control" >
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ  ألاصدار  :</label>
                                    <input  type="date" name="edate" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم   السجل التجاري  :</label>
                                    <input  type="number" name="num_se" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ألرقم ألضريبي  :</label>
                                    <input  type="number" name="num_ta" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم البطاقة الزكوية   :</label>
                                    <input  type="number" name="num_pz" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم ألهاتف    :</label>
                                    <input  type="number" name="mobile" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  ألائميل   :</label>
                                    <input  type="email" name="email" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>كلمة السر     :</label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاكيد كلمة السر     :</label>
                                    <input  type="password" name="password_confirmation" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">ألمحافظة} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="city_id">
                                        <option selected disabled>اختر المحافظة...</option>
                                        @foreach($citys as $city)
                                            <option  value="{{ $city->id }}">{{ $city->name }}</option>
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
                                            <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>  ألحالة  :</label>
                                    <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                            <div class="repeater">
                            
                                    <div class="row">

                                        <div class="col">
                                            <label for="name_file"
                                                class="mr-sm-2">{{ trans('servep_trans.servep_name') }}
                                                :</label>
                                            <input class="form-control" type="file" name="name_file" accept=".pdf, .jpg, .png" />
                                        </div>


                                        


                                        

                                       
                                    </div>
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




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('servep_trans.add_servep') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list>
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('servep_trans.servep_name') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>


                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('servep_trans.servep_name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_servep_en" />
                                        </div>


                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('servep_trans.Name_serve') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="">
                                                   
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('servep_trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('servep_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('servep_trans.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('servep_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('servep_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
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
