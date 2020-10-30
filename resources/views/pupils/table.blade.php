<div class="table-responsive">
    <table class="table" id="pupils-table">
        <thead>
            <tr>
        <th>Full Name</th>
        <th>Birthday</th>
        <th>Birth Certificate Number</th>
        <th>Birth Certificate Date</th>
        <th>Birth Certificate File</th>
        <th>Has Certificate</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pupils as $pupil)
            <tr>
            <td>{{ $pupil->full_name }}</td>
            <td>{{ $pupil->birthday }}</td>
            <td>{{ $pupil->birth_certificate_number }}</td>
            <td>{{ $pupil->birth_certificate_date }}</td>
            <td>{{ $pupil->birth_certificate_file }}</td>
            <td>{{ $pupil->has_certificate }}</td>
                <td>
                    {!! Form::open(['route' => ['pupils.destroy', $pupil->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pupils.show', [$pupil->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pupils.edit', [$pupil->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="{{$pupils->previousPageUrl()}}">«</a></li>
            <li><a href="{{$pupils->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$pupils->total()}}</a></li>
        </ul>
    </div>
</div>
