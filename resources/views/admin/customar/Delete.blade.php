<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_customar{{$customar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف بيانات العميل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.customars.delete')}}" method="post">
                    @csrf
                    

                    <input type="hidden" name="id" value="{{$customar->id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حذف العميل</h5>
                    <input type="text" readonly value="{{$customar->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('city_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('city_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
