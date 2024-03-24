    <!--تعديل قسم جديد -->
    <div class="modal fade"
    id="edit{{ $list_Sections->id }}"
    tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title"
                   style="font-family: 'Cairo', sans-serif;"
                   id="exampleModalLabel">
                   {{ trans('Sections.edit_Section') }}
               </h5>
               <button type="button" class="close"
                       data-dismiss="modal"
                       aria-label="Close">
               <span
                   aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form
                   action="{{ route('Sections.update', $list_Sections->id) }}"
                   method="POST">
                   {{ method_field('patch') }}
                   {{ csrf_field() }}
                   <div class="row">
                       <div class="col">
                           <input type="text"
                                  name="Name_Section_Ar"
                                  class="form-control"
                                  value="{{ $list_Sections->getTranslation('name_section', 'ar') }}">
                       </div>

                       <div class="col">
                           <input type="text"
                                  name="Name_Section_En"
                                  class="form-control"
                                  value="{{ $list_Sections->getTranslation('name_section', 'en') }}">
                           <input id="id"
                                  type="hidden"
                                  name="id"
                                  class="form-control"
                                  value="{{ $list_Sections->id }}">
                       </div>

                   </div>
                   <br>



                   <div class="col">
                    <label for="inputName" class="control-label">{{ trans('Sections.Name_Grade') }}</label>
                    <select name="Grade_id" class="custom-select" onchange="getClasses(this.value)">
                        <!--placeholder-->
                        <option
                        value="{{ $Grade->id }}">
                        {{ $Grade->name }}
                    </option>                        @foreach ($list_Grades as $list_Grade)
                            <option value="{{ $list_Grade->id }}">{{ $list_Grade->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <br>



                   <div class="col">
                       <label for="inputName"
                              class="control-label">{{ trans('Sections.Name_Class') }}</label>
                       <select name="Class_id"
                               class="custom-select">
                           <option
                               value="{{ $list_Sections->classrooms->id }}">
                               {{ $list_Sections->classrooms->name_class }}
                           </option>
                       </select>
                   </div>
                   <br>

                   <div class="col">
                       <div class="form-check">
                        <label
                        class="form-check-label"
                        for="exampleCheck1">{{ trans('Sections.Status') }}</label>
                           @if ($list_Sections->status === 1)
                               <input
                                   type="checkbox"
                                   checked
                                   class="form-check-input"
                                   name="Status"
                                   id="exampleCheck1">
                           @else
                               <input
                                   type="checkbox"
                                   class="form-check-input"
                                   name="Status"
                                   id="exampleCheck1">
                           @endif
                           
                       </div>
                   </div>

                   <div class="col">
                    <label for="inputName" class="control-label">{{ trans('Teacher.Name_Teacher') }}</label>
                    <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                        @foreach($list_Sections->Teacher as $teacher)
                            <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                        @endforeach

                        @foreach($Teacher as $teachers)
                            <option value="{{$teachers->id}}">{{$teachers->Name}}</option>
                        @endforeach
                    </select>
                </div>

           </div>
           <div class="modal-footer">
               <button type="button"
                       class="btn btn-secondary"
                       data-dismiss="modal">{{ trans('Sections.Close') }}</button>
               <button type="submit"
                       class="btn btn-danger">{{ trans('Sections.submit') }}</button>
           </div>
           </form>
       </div>
   </div>
</div>