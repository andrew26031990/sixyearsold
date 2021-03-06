<div class="table-responsive">
    <table class="table" id="districts-table">
        <thead>
            <tr>
                <th>{{__('message.region')}}</th>
        <th>{{__('message.district')}}</th>
                <th colspan="3">{{__('message.action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($districts as $district)
            <tr>
                <td>{{ $district->r_name }}</td>
            <td>{{ $district->name }}</td>
                <td>
                    {!! Form::open(['route' => ['districts.destroy', $district->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('districts.show', [$district->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('districts.edit', [$district->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$districts->previousPageUrl()}}">«</a></li>
            <li><a href="{{$districts->nextPageUrl()}}">»</a></li>
            <li><a href="">Total: {{$districts->total()}}</a></li>
        </ul>
    </div>
</div>
