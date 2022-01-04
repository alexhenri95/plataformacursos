@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h4><strong>Observaciones del curso: </strong>{{$course->title}}</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del curso:') !!}
                    {!! Form::textarea('body', null) !!}

                    @error('body')
                    <strong class="text-danger small font-weight-bold">(*) {{$message}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection