     <!-- delete_modal_Grade -->
     <div class="modal fade" id="Delete_img{{$attachment->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                       id="exampleModalLabel">
                       {{ trans('Student.delete') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="{{route('deleteImage','test')}}" method="post">
                       {{method_field('Delete')}}
                       @csrf
                             <input type="hidden" name="id" value="{{$attachment->id}}">

                       <input type="hidden" name="student_name" value="{{$Student->name}}">
                       <input type="hidden" name="student_id" value="{{$Student->id}}">
   
                       <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Student.Delete_attachment_tilte')}}</h5>
                       <input type="text" name="filename" readonly value="{{$attachment->filename}}" class="form-control">
   
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grade.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('Grade.submit') }}</button>
                               </div>
                   </form>
               </div>
           </div>
       </div>
   </div>