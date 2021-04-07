@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Communities
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($communities, ['route' => ['communities.update', $communities->id], 'method' => 'patch']) !!}

                        @include('communities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection