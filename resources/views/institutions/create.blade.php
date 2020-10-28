@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Institutions
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'institutions.store']) !!}

                        @include('institutions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
