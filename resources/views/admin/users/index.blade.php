@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Lista De Usuarios</h1>
@stop

@section('content')
	@livewire('admin.users-index')
@stop