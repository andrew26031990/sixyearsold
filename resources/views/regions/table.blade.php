<div class="table-responsive">
    <table class="table" id="regions-table">
        <thead>
            <tr>
                <th>Country</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($regions as $regions)
            <tr>
                <td>{{ $regions->c_name }}</td>
            <td>{{ $regions->name }}</td>
                <td>
                    {!! Form::open(['route' => ['regions.destroy', $regions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('regions.show', [$regions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('regions.edit', [$regions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
