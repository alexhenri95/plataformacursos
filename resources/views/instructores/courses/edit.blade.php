<x-instructor-layout :course="$course">
	
	<h1 class="text-2xl font-bold ">Información del curso</h1>
    <hr class="mt-2 mb-6">
    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method'=> 'put','files' => true]) !!}

        @include('instructores.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary cursor-pointer']) !!}
        </div>

    {!! Form::close() !!}

	<x-slot name="js">
		<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
		<script src="{{ asset('js/instructor/course/form.js') }}"></script>	
	</x-slot>	
</x-instructor-layout>