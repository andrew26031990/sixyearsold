<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>{{__('message.user')}}</th>
        <th>{{__('message.email')}}</th>
        <th>{{__('message.role')}}</th>
                <th>{{__('message.lang')}}</th>
                <th colspan="3">{{__('message.action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->lang }}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$users->previousPageUrl()}}">«</a></li>
            <li><a href="{{$users->nextPageUrl()}}">»</a></li>
            <li><a href="/users?page={{$users->lastPage()}}">lastpage</a></li>
            <li><a>Total: {{$users->total()}}</a></li>
        </ul>
    </div>
</div>
