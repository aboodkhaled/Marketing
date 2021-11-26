@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row"   style="background-color: ; margin-top: 90px; margin-left: 1100px;  width:1200px;" >
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-1100" >
                <div class="card-body" >
                    <div class="col-xl-12 mb-100" >
                        <div class="card card-statistics h-150" style=" width:1100px; margin-left: 10px;">
                            <div class="card-body scrollX "  > 
                                <a href="{{ route('admin.customars.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">أظافة عميل</a><br><br>
                                <div class="table-responsive"  style=" width:1050px; margin-left: 10px;" >
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"
                                          >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th >أسم ألمالك</th>
                                            <th>أسم ألمنشاة</th>
                                            
                                            
                                            <th  > الائميل</th>
                                            <th  > رقم الهاتف</th>
                                            <th  >المحافظة</th>
                                            <th  >الحالة</th>
                                            <th > ألعمليات</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($customars as $customar)
                                        <?php $i++; ?>
                                            <tr>
                                            <td>{{ $i }}</td>
                                            <td><img style="width: 90px; height: 60px;"
                                            class="rounded-circle"      src="{{$customar -> 	photo}}">   :   {{$customar->name}}</td>
                                            
                                            <td>{{$customar->name_com}}</td>
                                            
                                            
                                            <td>{{$customar->email}}</td>
                                            <td>{{$customar->mobile}}</td>
                                            <td>{{$customar->city->name}}</td>
                                            <td>@if ($customar -> active == 1)
                                                               <span class="badge badge-pill badge-success">{{$customar -> getActive()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$customar -> getActive()}}</span>@endif</td>
                                           
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{ route('admin.customars.show' ,$customar ->id) }}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات ألعميل</a>
                                                            <a class="dropdown-item" href="{{ route('admin.customars.edit' ,$customar ->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات ألعميل</a>

                                                            <a class="dropdown-item" data-target="#Delete_customar{{ $customar->id }}" data-toggle="modal" href="##Delete_customar{{ $customar->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات ألعميل</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @include('admin.customar.Delete')
                                        @endforeach
                                    </table>
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
