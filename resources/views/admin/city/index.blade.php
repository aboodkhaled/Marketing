@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('city_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('city_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row"  style="background-color: ; margin-top: px;">

<div class="col-xl-12 mb-30" style="background-color: ; margin-top: 90px;">
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
                {{ trans('city_trans.add_city') }}
            </button>

                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('city_trans.delete_checkbox') }}
                </button>


            <br><br>

                

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th>{{ trans('city_trans.number') }}</th>
                            <th>{{ trans('city_trans.city_name') }}</th>
                            <th>{{ trans('city_trans.Name_cuontry') }}</th>
                            <th>{{ trans('city_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 0; ?>

                        @foreach ($citys as $city)
                            <tr>
                                <?php $i++; ?>
                                <td><input type="checkbox"  value="{{ $city->id }}" class="box1" ></td>
                                <td>{{ $i }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->cuontry->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $city->id }}"
                                        title="{{ trans('city_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $city->id }}"
                                        title="{{ trans('city_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $city->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('city_trans.edit') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('admin.cities.update')}}" method="post">
                                               
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                               class="mr-sm-2">{{ trans('city_trans.city_name') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                               class="form-control"
                                                               value="{{ $city->getTranslation('name', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $city->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                               class="mr-sm-2">{{ trans('city_trans.city_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $city->getTranslation('name', 'en') }}"
                                                               name="Name_en" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('city_trans.Name_cuontry') }}
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="cuontry_id">
                                                        <option value="{{ $city->cuontry->id }}">
                                                            {{ $city->cuontry->name }}
                                                        </option>
                                                        @foreach ($cuontrys as $cuontry)
                                                            <option value="{{ $cuontry->id }}">
                                                                {{ $cuontry->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('city_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('city_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $city->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('My_Classes_trans.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.cities.delete') }}"
                                                  method="post">
                                               
                                                @csrf
                                                {{ trans('city_trans.Warning_city') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $city->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('city_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('city_trans.submit') }}</button>
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


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('city_trans.add_city') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('admin.cities.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('city_trans.city_name') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>


                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('city_trans.city_name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_city_en" />
                                        </div>


                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('city_trans.Name_cuontry') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="cuontry_id">
                                                    @foreach ($cuontrys as $cuontry)
                                                        <option value="{{ $cuontry->id }}">{{ $cuontry->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('city_trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('city_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('city_trans.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('city_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('city_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>



<!-- حذف مجموعة صفوف -->





<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render





@endsection
