<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', __('message.teachers')) !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', __('message.birthday')) !!}
    {!! Form::text('birthday', null, ['class' => 'form-control date','id'=>'birthday', 'required' => 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthday').datetimepicker({
            format: 'DD-MM-YYYY',//YYYY-MM-DD
            minDate: new Date(new Date().getFullYear() - 18, 1-1, 1),
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Education Degree Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_degree_id', __('message.education_degrees')) !!}
    <select class="form-control" name="education_degree_id" required>
        <option value="">Выберите образование</option>
        @foreach($ed_degrees as $ed_degree)
            <option value="{{$ed_degree->id}}" {{ isset($teachers->education_degree_id) && $ed_degree->id == $teachers->education_degree_id ? 'selected' : ''}}>{{$ed_degree->name}}</option>
        @endforeach
    </select>
</div>

<!-- Specialization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specialization', __('message.specialization')) !!}
    {!! Form::text('specialization', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200, 'required' => 'required']) !!}
</div>

<!-- Education Document Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_name', __('message.education_document_name')) !!}
    {!! Form::text('education_document_name', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200, 'required' => 'required']) !!}
</div>

<!-- Education Document File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_file', __('message.education_document_file').' (.jpeg, .jpg, .png)( < 2 Mb)') !!}
    {{--{!! Form::text('education_document_file', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}--}}
    {!! Form::file('education_document_file', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required', 'accept' => '.jpeg,.jpg,.png']) !!}
</div>

<!-- Education Document Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_number', __('message.education_document_number')) !!}
    {!! Form::text('education_document_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'required' => 'required']) !!}
</div>

<!-- Education Document Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_document_date', __('message.education_document_date')) !!}
    {!! Form::text('education_document_date', null, ['class' => 'form-control date','id'=>'education_document_date', 'required' => 'required']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', __('message.district')) !!}
    <select class="form-control" name="district_id" required readonly>
        @if(isset($districts))
            <option value="{{$districts[0]->id}}" selected>{{$districts[0]->name}}</option>
        @else
            <option value="">{{__('message.choose_district')}}</option>
        @endif
    </select>
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('message.region')) !!}
    <select class="form-control" name="region_id" required>
        @if(isset($teachers))
            <option value="">{{__('message.choose_region')}}</option>
            @foreach($regions as $region)
                <option value="{{$region->id}}" {{($teachers->region_id == $region->id) ? 'selected' : ''}}>{{$region->name}}</option>
            @endforeach
        @else
            <option value="">{{__('message.choose_region')}}</option>
            @foreach($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
        @endif
    </select>
</div>

<!-- Institution Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_id', __('message.institution')) !!}
    <select class="form-control" name="institution_id" required readonly>

        @if(isset($institutions))
            <option value="{{$institutions[0]->id}}" selected>{{$institutions[0]->name}}</option>
        @else
            <option value="" selected>Выберите учреждение</option>
        @endif
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('message.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teachers.index') }}" class="btn btn-default">{{__('message.cancel')}}</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#education_document_date').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $(function(){
            $('select[name="region_id"]').on('change', function() {
                $('select[name="institution_id"]').attr('readonly', 'readonly');
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
                        $('select[name="district_id"]').removeAttr('readonly');
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
                        $('select[name="institution_id"]').removeAttr('readonly');
                        $('select[name="institution_id"]').append(response);
                    }
                });
            });
        });
    </script>
@endpush
