@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('cuontry_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('cuontry_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row"  >


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif



<div class="col-xl-12 mb-30"  style="background-color: ; margin-top: 90px;">
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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('cuontry_trans.add_cuontry') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>{{ trans('cuontry_trans.number') }}</th>
                            <th>{{ trans('cuontry_trans.Name') }}</th>
                            
                            <th>{{ trans('cuontry_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($cuontrys as $cuontry)
                        <?php $i++; ?>
                            <tr>
                                
                                <td>{{ $i }}</td>
                                <td>{{$cuontry -> name  }}</td>
                                
                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$cuontry -> id }}"
                                        title="{{ trans('cuontry_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$cuontry -> id   }}"
                                        title="{{ trans('cuontry_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $cuontry -> id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('cuontry_trans.edit_cuontry') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('admin.cuontries.update') }}" method="post">
                                                
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                            class="mr-sm-2">{{ trans('cuontry_trans.cuontry_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $cuontry -> getTranslation('name', 'ar') }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $cuontry->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ trans('cuontry_trans.cuontry_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $cuontry ->getTranslation('name', 'en') }}"
                                                            name="name_en" required>
                                                    </div>
                                                </div>
                                                
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('cuontry_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('cuontry_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $cuontry->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('cuontry_trans.delete_cuontry') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.cuontries.delete') }}" method="post">
                                            
                                                @csrf
                                                {{ trans('cuontry_trans.Warning_cuontry') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $cuontry->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('cuontry_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('cuontry_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('cuontry_trans.add_cuontry') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('admin.cuontries.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('cuontry_trans.cuontry_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('cuontry_trans.cuontry_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('cuontry_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('cuontry_trans.submit') }}</button>
            </div>
            </form>

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
