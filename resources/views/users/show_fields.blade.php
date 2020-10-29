<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $users->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $users->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $users->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $users->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $users->remember_token }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', 'Role:') !!}
    <p>{{ $users->role }}</p>
</div>

<!-- Lang Field -->
<label>Prefer site language</label>
<div class="form-group" style="display: inline-block">

    <select class="form-control lang-user-change" onchange="changeLang(this.value, {{ $users->id }})">
        <option value="ru" {{ $users->lang == "ru" ? 'selected' : '' }}>ru</option>
        <option value="uz" {{ $users->lang == "uz" ? 'selected' : '' }}>uz</option>
    </select>
</div>


<br>


