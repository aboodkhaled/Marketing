@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students_trans.Student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students_trans.Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row"   style="background-color: ; margin-top: 90px;">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                    
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">تفاصيل بيانات العميل</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">المرفقات</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-03-tab" data-toggle="tab" href="#profile-03"
                                       role="tab" aria-controls="profile-03"
                                       aria-selected="false">ألاصناف</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                     <div class="form-group">
                                                <div class="text-center">
                                                    <img style="width: 190px; height: 160px;"
                                                        src="{{$customar -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة ألطبيب  ">
                                                </div>
                                            </div>
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">أسم المالك</th>
                                            <td>{{$customar->name  }}</td>
                                            <th scope="row">أسم المنشاة</th>
                                            <td>{{$customar->name_com}}</td>
                                            <th scope="row">رقم البطاقة </th>
                                            <td>{{$customar->num_pt}}</td>
                                            <th scope="row">تاريخ الاصدار</th>
                                            <td>{{$customar->edate}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">رقم السجل التجاري</th>
                                            <td>{{$customar->num_se }}</td>
                                            <th scope="row">الرقم الضريبي</th>
                                            <td>{{$customar->num_ta}}</td>
                                            <th scope="row">رقم البطاقة الزكوية</th>
                                            <td>{{$customar->num_pz}}</td>
                                            <th scope="row">الائميل</th>
                                            <td>{{$customar->email}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">رقم الهاتف</th>
                                            <td>{{ $customar->mobile}}</td>
                                            <th scope="row">المحافظة</th>
                                            <td>{{ $customar->city->name }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>



                                
                                <div class="tab-pane fade" id="profile-03" role="tabpanel"
                                     aria-labelledby="profile-03-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('admin.customars.upitem' ) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                    <div class="col-md-8">
                                <div class="form-group">
                                    <label for="gender">أظافة صنف جديد للعميل : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="item_id">
                                        <option selected disabled>اختر ألصنف...</option>
                                        @foreach($items as $item)
                                            <option  value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                                        <input type="hidden" name="name" value="{{$customar->name}}">
                                                        <input type="hidden" name="customar_id" value="{{$customar->id }}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       تاكيد
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                
                                                <th scope="col">أسم ألصنف</th>
                                                <th scope="col">تاريخ ألاظافة</th>
                                                <th scope="col">ألعمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customar->customar_item as $customar_item)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$customar_item->item->name}}</td>
                                                 
                                                    <td>{{$customar_item->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_item{{ $customar_item->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">حذف ألصنف
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('admin.customar.Delete_item')
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                          
                                                  

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('admin.customars.upload' ) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">أظافة مرفق جديد
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept=".pdf, .jpg, .png"  name="name_file"  required>
                                                        <input type="hidden" name="name" value="{{$customar->name}}">
                                                        <input type="hidden" name="customar_id" value="{{$customar->id }}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       تاكيد
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                
                                                <th scope="col">أسم ألملف</th>
                                                <th scope="col">تاريخ ألاظافة</th>
                                                <th scope="col">ألعمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customar->customar_attach as $customar_attach)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$customar_attach->name_file}}</td>
                                                 
                                                    <td>{{$customar_attach->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{ route('admin.customars.download', '$customar_attach->name_file') }}/{{$customar_attach->name_file}}"
                                                           role="button"><i class="fas fa-download"></i>&nbsp; تحميل</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $customar_attach->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">حذف ألمرفق
                                                        </button>

                                                    </td>
                                                </tr>
                                              @include('admin.customar.Delete_img')
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                     <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                أظافة ألاسقف للاعتماد
            </button>
                                     
                                    <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"
                                          >
                                        <thead>
                                        <tr>
                                        <th scope="col">ألصنف </th>
                                                <th scope="col">ألكمية ألسنوية\طن</th>
                                                <th scope="col">ألكمية ألشهرية\طن</th>
                                                <th scope="col">ألكمية ألمسموحة لكل تصريح\طن</th>
                                                <th scope="col">ألاشهر ألمسموح فيها</th>
                                                <th scope="col">ألعمليات</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($customar->customar_detail as $customar_detail)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$customar_detail->item->name}}</td>
                                                    <td>{{$customar_detail->year_q}}</td>
                                                    <td>{{$customar_detail->month_q}}</td>
                                                    <td>{{$customar_detail->tasreh_q}}</td>
                                                    <td>من -> {{$customar_detail->months}} -> الى -> {{$customar_detail->monthe}}</td>
                                                    
                                                 
                                                    
                                                    <td colspan="2">
                                                        

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_item{{ $customar_detail->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">حذف ألصنف
                                                        </button>

                                                    </td>
                                                </tr>
                                               
                                            @endforeach

                                        
                                        </tbody>
                                    </table>
                                </div>

                                               
<!-- add_modal_class -->
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

                <form class=" row mb-30" action="{{ route('admin.customars.oke') }}" method="POST">
                    @csrf
                    <div class="card-body">
                   
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                <div class="col-md-12">
                                        <input type="text" name="name" value="{{$customar->name}}">
                                                        <input type="text" name="customar_id" value="{{$customar->id }}">
                                        </div>
                                        <br><br>
                                    <div class="row">

                                        
<br>
                                        <div class="row col-md-12">
                                        <div class="col-md-3">
                                            <label for="year_q"
                                                class="mr-sm-2">
                                                ألكمية ألسنوية \ طن :</label>
                                            <input class="form-control" type="number" name="year_q" />
                                        </div>

                                        <div class="col-md-3">
                                            <label for="month_q"
                                                class="mr-sm-2">
                                                ألكمية ألشهرية \ طن  :</label>
                                            <input class="form-control" type="number" name="month_q" />
                                        </div>

                                        
                                        <div class="col-md-4">
                                            <label for="tasreh_q"
                                                class="mr-sm-2">
                                                ألكمية ألمسموحة لكل تصريح \ طن :</label>
                                            <input class="form-control" type="number" name="tasreh_q" />
                                        </div>
                                        </div>

                                        <div class="col-md-3">
                                <div class="form-group">
                                    <label>بداية ألاشهر  ألمسموحة بها  :</label>
                                    <input  type="date" name="months" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نهاية ألاشهر  ألمسموحة بها   :</label>
                                    <input  type="date" name="monthe" class="form-control" data-date-format="yyyy-mm-dd" >
                                </div>
                            </div>



                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">أسم الصنف
                                                :</label>

                                            <div class="box">
                                            <select class="fancyselect" name="item_id">
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
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

 
            </div>

            <!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
