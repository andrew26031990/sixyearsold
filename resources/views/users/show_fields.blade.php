<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('message.user')) !!}
    <p>{{ $users->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('message.email')) !!}
    <p>{{ $users->email }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('message.password')) !!}
    <p>{{ $users->password }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('message.role')) !!}
    <p>{{ $users->role }}</p>
</div>

<!-- Lang Field -->
<div class="form-group" style="display: inline-block">
    <label>{{__('message.lang')}}</label>
    <select class="form-control lang-user-change" onchange="changeLang(this.value, {{ $users->id }})" disabled>
        <option value="ru" {{ $users->lang == "ru" ? 'selected' : '' }}>ru</option>
        <option value="uz" {{ $users->lang == "uz" ? 'selected' : '' }}>uz</option>
    </select>
</div>


<br>


