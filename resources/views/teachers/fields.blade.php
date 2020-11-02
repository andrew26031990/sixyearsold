<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', 'Birthday:') !!}
    {!! Form::text('birthday', null, ['class' => 'form-control date','id'=>'birthday']) !!}
</div>

<!-- Education Degree Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', 'Education Degree Id:') !!}
    <select class="form-control" name="education_degree_id">
        @foreach($ed_degrees as $ed_degree)
            <option value="{{$ed_degree->id}}">{{$ed_degree->name}}</option>
        @endforeach
    </select>
</div>

<!-- Specialization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specialization', 'Specialization:') !!}
    {!! Form::text('specialization', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Education Document Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_name', 'Education Document Name:') !!}
    {!! Form::text('education_document_name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Education Document File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_file', 'Education Document File:') !!}
    {{--{!! Form::text('education_document_file', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}--}}
    {!! Form::file('education_document_file', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Education Document Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_number', 'Education Document Number:') !!}
    {!! Form::text('education_document_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Education Document Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_date', 'Education Document Date:') !!}
    {!! Form::text('education_document_date', null, ['class' => 'form-control date','id'=>'education_document_date']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', 'Education Degree Id:') !!}
    <select class="form-control" name="district_id">
        @foreach($districts as $district)
            <option value="{{$district->id}}">{{$district->name}}</option>
        @endforeach
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', 'Education Degree Id:') !!}
    <select class="form-control" name="region_id">
        @foreach($regions as $region)
            <option value="{{$region->id}}">{{$region->name}}</option>
        @endforeach
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', 'Education Degree Id:') !!}
    <select class="form-control" name="institution_id">
        @foreach($institutions as $institution)
            <option value="{{$institution->id}}">{{$institution->name}}</option>
        @endforeach
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teachers.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('.date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
