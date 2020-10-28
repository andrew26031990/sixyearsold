<div class="table-responsive">
    <table class="table" id="institutions-table">
        <thead>
            <tr>
                <th>Country Id</th>
        <th>Region Id</th>
        <th>District Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Code</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($institutions as $institution)
            <tr>
                <td>{{ $institution->country_id }}</td>
            <td>{{ $institution->region_id }}</td>
            <td>{{ $institution->district_id }}</td>
            <td>{{ $institution->name }}</td>
            <td>{{ $institution->address }}</td>
            <td>{{ $institution->code }}</td>
                <td>
                    {!! Form::open(['route' => ['institutions.destroy', $institution->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('institutions.show', [$institution->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('institutions.edit', [$institution->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$institutions->previousPageUrl()}}">«</a></li>
            <li><a href="{{$institutions->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$institutions->total()}}</a></li>
        </ul>
    </div>
</div>
