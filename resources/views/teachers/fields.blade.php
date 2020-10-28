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

<!-- Education Degree Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', 'Education Degree Id:') !!}
    {!! Form::number('education_degree_id', null, ['class' => 'form-control']) !!}
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
    {!! Form::text('education_document_file', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Education Document Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_number', 'Education Document Number:') !!}
    {!! Form::text('education_document_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Education Document Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_date', 'Education Document Date:') !!}
    {!! Form::text('education_document_date', null, ['class' => 'form-control','id'=>'education_document_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#education_document_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    {!! Form::number('district_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region Id:') !!}
    {!! Form::number('region_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', 'Institution Id:') !!}
    {!! Form::number('institution_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teachers.index') }}" class="btn btn-default">Cancel</a>
</div>
