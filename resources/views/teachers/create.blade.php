@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Teachers
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'teachers.store', 'method'=>'post', 'files'=>true]) !!}

                        @include('teachers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
