@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('message.groups')}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'groups.store']) !!}
                        {{ csrf_field() }}
                        @include('groups.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
