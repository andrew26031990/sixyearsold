@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.regions')}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'regions.store']) !!}
                        {{ csrf_field() }}
                        @include('regions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
