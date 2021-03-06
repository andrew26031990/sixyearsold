@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('message.teachers')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'teachers.store', 'method'=>'post', 'files'=>true]) !!}
                        {{ csrf_field() }}
                        @include('teachers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
