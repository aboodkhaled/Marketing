<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_img{{$customar_attach->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.customars.deletee_customar')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$customar_attach->id}}">

                    <input type="hidden" name="student_name" value="{{$customar_attach->name_file}}">
                    <input type="hidden" name="customar_id" value="{{$customar_attach->customar_id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حذف المرفق</h5>
                    <input type="text" name="name_file" readonly value="{{$customar_attach->name_file}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">غير موافق</button>
                        <button  class="btn btn-danger">موافق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
