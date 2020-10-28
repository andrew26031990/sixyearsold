<div class="table-responsive">
    <table class="table" id="groups-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Country Id</th>
        <th>Region Id</th>
        <th>District Id</th>
        <th>Institution Id</th>
        <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groups as $groups)
            <tr>
                <td>{{ $groups->name }}</td>
            <td>{{ $groups->country_id }}</td>
            <td>{{ $groups->region_id }}</td>
            <td>{{ $groups->district_id }}</td>
            <td>{{ $groups->institution_id }}</td>
            <td>{{ $groups->address }}</td>
                <td>
                    {!! Form::open(['route' => ['groups.destroy', $groups->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('groups.show', [$groups->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('groups.edit', [$groups->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
