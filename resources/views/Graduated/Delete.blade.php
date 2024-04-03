<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$Student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Student.Deleted_Student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Graduated.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{$Student->id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Student.Deleted_Student_tilte')}}</h5>
                    <input type="text" readonly value="{{$Student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Student.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Student.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>