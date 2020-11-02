<div class="table-responsive">
    <table class="table" id="groups-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Country</th>
        <th>Region</th>
        <th>District</th>
        <th>Institution</th>
        <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
            <td>{{ $group->c_name }}</td>
            <td>{{ $group->r_name }}</td>
            <td>{{ $group->d_name }}</td>
            <td>{{ $group->i_name }}</td>
            <td>{{ $group->address }}</td>
                <td>
                    {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('groups.show', [$group->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('groups.edit', [$group->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$groups->previousPageUrl()}}">«</a></li>
            <li><a href="{{$groups->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$groups->total()}}</a></li>
        </ul>
    </div>
</div>
