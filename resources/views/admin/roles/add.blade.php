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
                

                <form method="post"  action="{{ route('admin.roles.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">بيانات العميل</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>أسم ألصلاحية: <span class="text-danger">*</span></label>
                                    <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                            @foreach (config('global.permission') as $name => $value)
                                <div class="form-group">
                                <label class="checkbox-inline">
                                                                            <input type="checkbox" class="chk-box" name="permission[]" value="{{ $name }}">  {{ $value }}
                                                                        </label>
                                </div>
                                @endforeach
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
