     <!-- delete_modal_Grade -->
     <div class="modal fade" id="delete{{$classrooms->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                       id="exampleModalLabel">
                       {{ trans('Classroom.delete_class') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="{{route('Classroom.destroy','test')}}" method="post">
                       {{method_field('Delete')}}
                       @csrf
                       {{ trans('Grade.messagedelete') }}
                       <input id="id" type="hidden" name="id" class="form-control"
                              value="{{$classrooms->id}}">
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