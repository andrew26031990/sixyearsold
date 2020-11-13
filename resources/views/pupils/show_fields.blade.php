<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', __('message.full_name')) !!}
    <p>{{ $pupils->full_name }}</p>
</div>

<!-- Birthday Field -->
<div class="form-group">
    {!! Form::label('birthday', __('message.birthday')) !!}
    <p>{{ $pupils->birthday }}</p>
</div>

<!-- Birth Certificate Number Field -->
<div class="form-group">
    {!! Form::label('birth_certificate_number', __('message.birth_certificate_number')) !!}
    <p>{{ $pupils->birth_certificate_number }}</p>
</div>

<!-- Birth Certificate Date Field -->
<div class="form-group">
    {!! Form::label('birth_certificate_date', __('message.birth_certificate_date')) !!}
    <p>{{ $pupils->birth_certificate_date }}</p>
</div>

<!-- Birth Certificate File Field -->
@if(file_exists(url('uploads/pupils/birth_certificate').'/'.$pupils->birth_certificate_file))
    <div class="form-group">
        {!! Form::label('birth_certificate_file', __('message.birth_certificate_file')) !!}
        <p><img style="width: 300px; height: 300px;" src="{{url('uploads/pupils/birth_certificate').'/'.$pupils->birth_certificate_file}}" /></p>
    </div>
@endif


<!-- Has Certificate Field -->
<div class="form-group">
    {!! Form::label('has_certificate', __('message.has_certificate')) !!}
    <p>{{ $pupils->has_certificate == 1 ? __('message.yes') : __('message.no') }}</p>
</div>

