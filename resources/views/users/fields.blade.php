<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('message.user')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('message.email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'autocomplete'=>false]) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('message.password')) !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'autocomplete'=>false]) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', __('message.role')) !!}
    <select class="form-control" name="role" required>
        <option value="admin" {{(isset($users) && $users->role == 'admin') ? 'selected' : ''}}>Админ</option>
        <option value="user" {{(isset($users) && $users->role == 'user') ? 'selected' : ''}}>Пользователь</option>
    </select>
</div>
{{--<!-- Language Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Language') !!}
    <select class="form-control" name="lang" required>
        <option value="no">Выберите язык интерфейса для пользователя</option>
        <option value="ru">Русский</option>
        <option value="uz">Узбекский</option>
    </select>
</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('message.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">{{__('message.cancel')}}</a>
</div>
