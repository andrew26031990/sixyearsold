<div class="box-body table-responsive no-padding">
    <table class="table table-hover" id="teachers-table">
        <thead>
            <tr>
                <th>@lang('message.full_name')</th>
                <th>@lang('message.birthday')</th>
        <th>@lang('message.education_degree')</th>
        <th>@lang('message.specialization')</th>
        <th>@lang('message.education_document_name')</th>
        <th>@lang('message.education_document_file')</th>
        <th>@lang('message.education_document_number')</th>
        <th>@lang('message.education_document_date')</th>
        <th>@lang('message.district')</th>
        <th>@lang('message.region')</th>
        <th>@lang('message.institution')</th>
                <th colspan="3">@lang('message.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->full_name }}</td>
                <td>{{ $teacher->birthday }}</td>
                <td>{{ $teacher->ed_name }}</td>
                <td>{{ $teacher->specialization }}</td>
                <td>{{ $teacher->education_document_name }}</td>
                <td><a href="{{url('uploads/teachers/education_document').'/'.$teacher->education_document_file }}" download>{{ $teacher->education_document_file }}</a></td>
                <td>{{ $teacher->education_document_number }}</td>
                <td>{{ $teacher->education_document_date }}</td>
                <td>{{ $teacher->d_name }}</td>
                <td>{{ $teacher->r_name }}</td>
                <td>{{ $teacher->i_name }}</td>
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
            <li><a href="/teachers?page={{$teachers->lastPage()}}">lastpage</a></li>
            <li><a>Total: {{$teachers->total()}}</a></li>
        </ul>
    </div>
</div>
