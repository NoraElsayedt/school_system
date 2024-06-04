   <!--اضافة قسم جديد -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalLabel"
   aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                  id="exampleModalLabel">
                  {{ trans('Sections.add_section') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

              <form action="{{ route('Sections.store') }}" method="POST">
                 @csrf
                  <div class="row">
                      <div class="col">
                          <input type="text" name="Name_Section_Ar" class="form-control"
                                 placeholder="{{ trans('Sections.Section_name_ar') }}">
                      </div>

                      <div class="col">
                          <input type="text" name="Name_Section_En" class="form-control"
                                 placeholder="{{ trans('Sections.Section_name_en') }}">
                      </div>

                  </div>
                  <br>


                  <div class="col">
                    <label for="inputName" class="control-label">{{ trans('Sections.Name_Grade') }}</label>
                    <select name="Grade_id" class="custom-select" onchange="getClasses(this.value)">
                        <!--placeholder-->
                        <option value="" selected disabled>{{ trans('Sections.Select_Grade') }}</option>
                        @foreach ($list_Grades as $list_Grade)
                            <option value="{{ $list_Grade->id }}">{{ $list_Grade->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <br>




                  <div class="col">
                    <label for="inputName" class="control-label">{{ trans('Sections.Name_Class') }}</label>
                    <select name="Class_id" class="custom-select">
                        <option value="" selected disabled>{{ trans('Sections.Select_class') }}</option>
                    </select>
                </div>

                <div class="col">
                    <label for="inputName" class="control-label">{{ trans('Teacher.Name_Teacher') }}</label>
                    <select multiple name="Teacher_id[]" class="custom-select" >
                        <!--placeholder-->
                        <option value="" selected disabled>{{ trans('Teacher.Select_teacher') }}</option>
                        @foreach ($Teacher as $Teachers)
                            <option value="{{ $Teachers->id }}">{{ $Teachers->Name }}</option>
                        @endforeach
                    </select>
                </div>
                  <br>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
                      data-dismiss="modal">{{ trans('Sections.Close') }}</button>
              <button type="submit"
                      class="btn btn-danger">{{ trans('Sections.submit') }}</button>
          </div>
          </form>
      </div>
  </div>
</div>

</div>
</div>
</div>
