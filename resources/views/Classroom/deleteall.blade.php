<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Classroom.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('deleteall')}}" method="POST">
                @csrf
                <div class="modal-body">
                    {{ trans('Classroom.Warning_class') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" >
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grade.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('Grade.submit') }}</button>
                   </div>
            </form>
        </div>
    </div>
</div>