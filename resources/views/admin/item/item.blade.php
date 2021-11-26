@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('item_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('item_trans.title_page') }}
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
                {{ trans('item_trans.add_item') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>{{ trans('serve_trans.number') }}</th>
                            <th>{{ trans('item_trans.Name') }}</th>
                            <th>{{ trans('item_trans.price') }}</th>
                            <th>{{ trans('item_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($items as $item)
                        <?php $i++; ?>
                            <tr>
                                
                                <td>{{ $i }}</td>
                                <td>{{$item -> name  }}</td>
                                <td>${{$item -> price  }}</td>
                                
                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$item -> id }}"
                                        title="{{ trans('item_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$item -> id   }}"
                                        title="{{ trans('item_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $item -> id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('item_trans.edit_item') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('admin.items.update') }}" method="post">
                                                
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                            class="mr-sm-2">{{ trans('item_trans.serve_name_ar') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $item ->name}}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $item    ->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ trans('item_trans.price') }}
                                                            :</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $item -> price}}"
                                                            name="price" required>
                                                    </div>
                                                </div>
                                                
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('item_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('item_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('item_trans.delete_item') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.items.delete') }}" method="post">
                                            
                                                @csrf
                                                {{ trans('item_trans.Warning_item') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $item->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('item_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('item_trans.submit') }}</button>
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
                    {{ trans('item_trans.add_item') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('admin.items.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('item_trans.item_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="price" class="mr-sm-2">{{ trans('item_trans.price') }}
                                :</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                    </div>
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('item_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('item_trans.submit') }}</button>
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
