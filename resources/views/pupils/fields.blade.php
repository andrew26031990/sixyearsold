<!-- Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group Id:') !!}
    {!! Form::number('group_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', 'Birthday:') !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthday').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_number', 'Birth Certificate Number:') !!}
    {!! Form::text('birth_certificate_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Birth Certificate Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_date', 'Birth Certificate Date:') !!}
    {!! Form::text('birth_certificate_date', null, ['class' => 'form-control','id'=>'birth_certificate_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_certificate_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_file', 'Birth Certificate File:') !!}
    {!! Form::text('birth_certificate_file', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Has Certificate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_certificate', 'Has Certificate:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_certificate', 0) !!}
        {!! Form::checkbox('has_certificate', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pupils.index') }}" class="btn btn-default">Cancel</a>
</div>
