
   <!-- edit_modal_Grade -->
   <div class="modal fade" id="edit{{ $grades->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('Grade.edit') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{route('Grade.update', $grades->id)}}" method="post">
                   {{method_field('patch')}}
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="Name"
                                  class="mr-sm-2">{{ trans('Grade.nameer') }}
                               :</label>
                           <input id="Name" type="text" name="Name"
                                  class="form-control"
                                  value="{{$grades->getTranslation('name', 'ar')}}"
                                  required>
                       
                       </div>
                       <div class="col">
                           <label for="Name_en"
                                  class="mr-sm-2">{{ trans('Grade.nameen') }}
                               :</label>
                           <input type="text" class="form-control"
                                  value="{{$grades->getTranslation('name', 'en')}}"
                                  name="Name_en" required>
                       </div>
                   </div>
                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">{{ trans('Grade.notes') }}
                           :</label>
                       <textarea class="form-control" name="Notes"
                                 id="exampleFormControlTextarea1"
                                 rows="3">{{ $grades->notes }}</textarea>
                   </div>
                   <br><br>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grade.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Grade.submit') }}</button>
                   </div>
               </form>

           </div>
       </div>
   </div>
</div>

