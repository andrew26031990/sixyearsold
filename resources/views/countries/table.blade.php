<div class="table-responsive">
    <table class="table" id="countries-table">
        <thead>
            <tr>
                <th>{{__('message.country')}}</th>
                <th colspan="3">{{__('message.action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countries as $countries)
            <tr>
                <td>{{ $countries->name }}</td>
                <td>
                    {!! Form::open(['route' => ['countries.destroy', $countries->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('countries.show', [$countries->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('countries.edit', [$countries->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
