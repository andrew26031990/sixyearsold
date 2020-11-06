<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', __('message.full_name')) !!}
    <p>{{ $teachers[0]->full_name }}</p>
</div>

<!-- Birthday Field -->
<div class="form-group">
    {!! Form::label('birthday', __('message.birthday')) !!}
    <p>{{ $teachers[0]->birthday }}</p>
</div>

<!-- Education Degree Id Field -->
<div class="form-group">
    {!! Form::label('education_degree_id', __('message.education_degree')) !!}
    <p>{{ $teachers[0]->ed_name }}</p>
</div>

<!-- Specialization Field -->
<div class="form-group">
    {!! Form::label('specialization', __('message.specialization')) !!}
    <p>{{ $teachers[0]->specialization }}</p>
</div>

<!-- Education Document Name Field -->
<div class="form-group">
    {!! Form::label('education_document_name', __('message.education_document_name')) !!}
    <p>{{ $teachers[0]->education_document_name }}</p>
</div>

<!-- Education Document File Field -->
<div class="form-group">
    {!! Form::label('education_document_file', __('message.education_document_file')) !!}
    <p><img style="width: 300px; height: 300px;" src="{{url('uploads/teachers/education_document').'/'.$teachers[0]->education_document_file}}" /></p>
</div>

<!-- Education Document Number Field -->
<div class="form-group">
    {!! Form::label('education_document_number', __('message.education_document_number')) !!}
    <p>{{ $teachers[0]->education_document_number }}</p>
</div>

<!-- Education Document Date Field -->
<div class="form-group">
    {!! Form::label('education_document_date', __('message.education_document_date')) !!}
    <p>{{ $teachers[0]->education_document_date }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', __('message.district')) !!}
    <p>{{ $teachers[0]->d_name }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', __('message.region')) !!}
    <p>{{ $teachers[0]->r_name }}</p>
</div>

<!-- Institution Id Field -->
<div class="form-group">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <p>{{ $teachers[0]->i_name }}</p>
</div>

