<div class="box-body table-responsive no-padding">
    <table class="table table-hover" id="teachers-table">
        <thead>
            <tr>
                <th>Full Name</th>
        <th>Birthday</th>
        <th>Education Degree Id</th>
        <th>Specialization</th>
        <th>Education Document Name</th>
        <th>Education Document File</th>
        <th>Education Document Number</th>
        <th>Education Document Date</th>
        <th>District Id</th>
        <th>Region Id</th>
        <th>Institution Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->full_name }}</td>
                <td>{{ $teacher->birthday }}</td>
                <td>{{ $teacher->education_degree_id }}</td>
                <td>{{ $teacher->specialization }}</td>
                <td>{{ $teacher->education_document_name }}</td>
                <td>{{ $teacher->education_document_file }}</td>
                <td>{{ $teacher->education_document_number }}</td>
                <td>{{ $teacher->education_document_date }}</td>
                <td>{{ $teacher->district_id }}</td>
                <td>{{ $teacher->region_id }}</td>
                <td>{{ $teacher->institution_id }}</td>
                    <td>
                        {!! Form::open(['route' => ['teachers.destroy', $teacher->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('teachers.show', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('teachers.edit', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$teachers->previousPageUrl()}}">«</a></li>
            <li><a href="{{$teachers->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$teachers->total()}}</a></li>
        </ul>
    </div>
</div>
