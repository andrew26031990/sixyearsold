<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $teachers[0]->full_name }}</p>
</div>

<!-- Birthday Field -->
<div class="form-group">
    {!! Form::label('birthday', 'Birthday:') !!}
    <p>{{ $teachers[0]->birthday }}</p>
</div>

<!-- Education Degree Id Field -->
<div class="form-group">
    {!! Form::label('education_degree_id', 'Education Degree:') !!}
    <p>{{ $teachers[0]->ed_name }}</p>
</div>

<!-- Specialization Field -->
<div class="form-group">
    {!! Form::label('specialization', 'Specialization:') !!}
    <p>{{ $teachers[0]->specialization }}</p>
</div>

<!-- Education Document Name Field -->
<div class="form-group">
    {!! Form::label('education_document_name', 'Education Document Name:') !!}
    <p>{{ $teachers[0]->education_document_name }}</p>
</div>

<!-- Education Document File Field -->
<div class="form-group">
    {!! Form::label('education_document_file', 'Education Document File:') !!}
    <p>{{ $teachers[0]->education_document_file }}</p>
</div>

<!-- Education Document Number Field -->
<div class="form-group">
    {!! Form::label('education_document_number', 'Education Document Number:') !!}
    <p>{{ $teachers[0]->education_document_number }}</p>
</div>

<!-- Education Document Date Field -->
<div class="form-group">
    {!! Form::label('education_document_date', 'Education Document Date:') !!}
    <p>{{ $teachers[0]->education_document_date }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p>{{ $teachers[0]->d_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region:') !!}
    <p>{{ $teachers[0]->r_name }}</p>
</div>

<!-- Institution Id Field -->
<div class="form-group">
    {!! Form::label('institution_id', 'Institution:') !!}
    <p>{{ $teachers[0]->i_name }}</p>
</div>

