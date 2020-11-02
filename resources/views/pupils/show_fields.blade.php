<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $pupils->full_name }}</p>
</div>

<!-- Birthday Field -->
<div class="form-group">
    {!! Form::label('birthday', 'Birthday:') !!}
    <p>{{ $pupils->birthday }}</p>
</div>

<!-- Birth Certificate Number Field -->
<div class="form-group">
    {!! Form::label('birth_certificate_number', 'Birth Certificate Number:') !!}
    <p>{{ $pupils->birth_certificate_number }}</p>
</div>

<!-- Birth Certificate Date Field -->
<div class="form-group">
    {!! Form::label('birth_certificate_date', 'Birth Certificate Date:') !!}
    <p>{{ $pupils->birth_certificate_date }}</p>
</div>

<!-- Birth Certificate File Field -->
<div class="form-group">
    {!! Form::label('birth_certificate_file', 'Birth Certificate File:') !!}
    <p><img style="width: 300px; height: 300px;" src="{{url('uploads/pupils/birth_certificate').'/'.$pupils->birth_certificate_file}}" /></p>
</div>

<!-- Has Certificate Field -->
<div class="form-group">
    {!! Form::label('has_certificate', 'Has Certificate:') !!}
    <p>{{ $pupils->has_certificate == 1 ? 'yes' : 'no' }}</p>
</div>

