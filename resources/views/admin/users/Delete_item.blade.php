<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_item{{$customar_item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.customars.deletee_item')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$customar_item->id}}">

                    <input type="hidden" name="item_id" value="{{$customar_item->item_id}}">
                    <input type="hidden" name="customar_id" value="{{$customar_item->customar_id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حذف ألصنف</h5>
                    <input type="text" name="item_id" readonly value="{{$customar_item->item_id}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">غير موافق</button>
                        <button  class="btn btn-danger">موافق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
