{{ csrf_field() }}
<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('message.country')) !!}
    <select class="form-control" name="country_id">
        @if(isset($groups[0]->c_id))
            <option value="-1">Выберите страну</option>
            <option value="{{$groups[0]->c_id}}" selected>{{$groups[0]->c_name}}</option>
        @else
            <option value="-1">Выберите страну</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" {{ isset($groups->c_id) && $groups->c_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
            @endforeach
        @endif
    </select>
</div>
<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('message.region')) !!}
    <select class="form-control" name="region_id" disabled>
        @if(isset($groups[0]->r_id))
            <option value="{{$groups[0]->r_id}}">{{$groups[0]->r_name}}</option>
        @else
            <option value="-1">Выберите регион</option>
        @endif
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('message.district')) !!}
    <select class="form-control" name="district_id" disabled>
        @if(isset($groups[0]->d_id))
            <option value="{{$groups[0]->d_id}}">{{$groups[0]->d_name}}</option>
        @else
            <option value="-1">Выберите район</option>
        @endif
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <select class="form-control" name="institution_id" disabled>
        @if(isset($groups[0]->i_id))
            <option value="{{$groups[0]->i_id}}">{{$groups[0]->i_name}}</option>
        @else
            <option value="-1">Выберите учреждение</option>
        @endif
    </select>
</div>

<!-- Group Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', __('message.group')) !!}
    <select class="form-control" name="group_id" required readonly>
        @if(isset($groups[0]->g_id))
            <option value="{{$groups[0]->g_id}}">{{$groups[0]->g_name}}</option>
        @else
            <option value="">Выберите группу</option>
        @endif
    </select>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', __('message.full_name')) !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', __('message.birthday')) !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday', 'required' => 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthday').datetimepicker({
            format: 'DD-MM-YYYY',
            minDate: new Date(new Date().getFullYear() - 5, 1-1, 1),
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_number', __('message.birth_certificate_number')) !!}
    {!! Form::text('birth_certificate_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>

<!-- Birth Certificate Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_date', __('message.birth_certificate_date')) !!}
    {!! Form::text('birth_certificate_date', null, ['class' => 'form-control','id'=>'birth_certificate_date', 'required' => 'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('sex', 'Пол') !!}
    <select class="form-control" name="sex" required>
        @if(isset($pupils))
            <option value="1" {{($pupils->sex == 1) ? 'selected' : ''}}>Мужской</option>
            <option value="0" {{($pupils->sex == 0) ? 'selected' : ''}}>Женский</option>
        @else
            <option value="1">Мужской</option>
            <option value="0">Женский</option>
        @endif
    </select>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_certificate_date').datetimepicker({
            format: 'DD-MM-YYYY',
            minDate: new Date(new Date().getFullYear() - 5, 1-1, 1),
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Birth Certificate File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate_file', __('message.birth_certificate_file')) !!}
    {!! Form::file('birth_certificate_file', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>


<!-- Has Certificate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_certificate', __('message.has_certificate')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_certificate', 0) !!}
        {!! Form::checkbox('has_certificate', '1', null, array('style'=>'margin:-6px 0 0')) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pupils.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('select[name="region_id"]').on('change', function() {
                $('select[name="institution_id"]').attr('disabled', 'disabled');
                $('select[name="group_id"]').attr('readonly', 'readonly');
                $('select[name="institution_id"]').html('<option value="-1">Выберите учреждение</option>');
            });
            $('select[name="country_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="region_id"]').html('');
                $.ajax({
                    url: '/getRegions/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="region_id"]').removeAttr('disabled');
                        $('select[name="region_id"]').append(response);
                    }
                });
            });
            $('select[name="region_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="district_id"]').html('');
                $.ajax({
                    url: '/getDistricts/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="district_id"]').removeAttr('disabled');
                        $('select[name="district_id"]').append(response);
                    }
                });
            });
            $('select[name="district_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="institution_id"]').html('');
                $.ajax({
                    url: '/getInstitutions/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="institution_id"]').removeAttr('disabled');
                        $('select[name="institution_id"]').append(response);
                    }
                });
            });
            $('select[name="institution_id"]').on('change', function() {
                let id = $(this).val();
                if(id == -1){
                    return;
                }
                $('select[name="group_id"]').html('');
                $.ajax({
                    url: '/getGroups/{id}',
                    type: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        $('select[name="group_id"]').removeAttr('readonly');
                        $('select[name="group_id"]').append(response);
                    }
                });
            });
        });
    </script>
@endpush
