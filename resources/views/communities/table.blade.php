<div class="table-responsive">
    <table class="table" id="communities-table">
        <thead>
            <tr>
                <th>District</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($communities as $community)
            <tr>
                <td>{{ $community->d_name }}</td>
            <td>{{ $community->name }}</td>
                <td>
                    {!! Form::open(['route' => ['communities.destroy', $community->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('communities.show', [$community->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('communities.edit', [$community->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$communities->previousPageUrl()}}">«</a></li>
            <li><a href="{{$communities->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$communities->total()}}</a></li>
        </ul>
    </div>
</div>
