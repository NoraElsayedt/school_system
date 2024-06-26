<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('Myparent.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Myparent.Email') }}</th>
            <th>{{ trans('Myparent.Name_Father') }}</th>
            <th>{{ trans('Myparent.National_ID_Father') }}</th>
            <th>{{ trans('Myparent.Passport_ID_Father') }}</th>
            <th>{{ trans('Myparent.Phone_Father') }}</th>
            <th>{{ trans('Myparent.Job_Father') }}</th>
            <th>{{ trans('Myparent.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
    
        @foreach ($my_parents as $my_parent)
            <tr>
            
                <td>{{$loop->iteration}}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->name_f }}</td>
                <td>{{ $my_parent->national_id_f }}</td>
                <td>{{ $my_parent->passport_id_f }}</td>
                <td>{{ $my_parent->phone_f }}</td>
                <td>{{ $my_parent->job_f }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>