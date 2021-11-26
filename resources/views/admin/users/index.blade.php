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
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">أظافة مستخدم</a><br><br>
                                <div class="table-responsive"  style=" width:1050px; margin-left: 10px;" >
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"
                                          >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>ألائميل</th>
                                                <th>الصلاحية</th>
                                                
                                            <th > ألعمليات</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @isset($users )
                                                @foreach($users as $user)
                                        <?php $i++; ?>
                                            <tr>
                                            <td>{{ $i }}</td>
                                            <td><img style="width: 90px; height: 60px;"
                                            class="rounded-circle"      src="{{$user -> 	photo}}">   :{{$user -> name}}</td>
                                            <td>{{$user -> email}}</td>
                                              <td>{{$user -> role -> name}}</td>
                                           
                                           
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                           
                                                            <a class="dropdown-item" href=""><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل ألمستخدم</a>

                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                     
                                        @endforeach
                                            @endisset

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
