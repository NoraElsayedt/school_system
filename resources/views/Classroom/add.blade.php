
<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Classroom.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('Classroom.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('Classroom.Name_class') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name"  />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('Classroom.Name_class_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name_class_en"  />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('Classroom.Name_Grade') }}
                                                :</label>

                                            <div class="col">
                                                <select class="form-control" name="Grade_id">
                                                    <option value="">
                                                       #######
                                                    </option>
                                                    @foreach ($grade as $grades)
                                                        <option value="{{ $grades->id }}">{{ $grades->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                       
                                    </div>
                                </div>
                            </div>
                          
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Grade.close') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('Grade.submit') }}</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
</div>




