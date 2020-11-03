<div class="table-responsive">
    <table class="table" id="educationDegrees-table">
        <thead>
            <tr>
                <th>Education degree</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($educationDegrees as $educationDegrees)
            <tr>
                <td>{{ $educationDegrees->name }}</td>
                <td>
                    {!! Form::open(['route' => ['educationDegrees.destroy', $educationDegrees->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('educationDegrees.show', [$educationDegrees->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('educationDegrees.edit', [$educationDegrees->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
