@props(['course'])

<article class="card flex flex-col">
	<img class="h-40 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">

	<div class="card-body flex-1 flex flex-col">
		<h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
		<p class="text-gray-800 text-sm mb-2 mt-auto">Prof: {{$course->teacher->name}}</p>

		<div class="flex">
			<ul class="flex text-sm">
				<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow':'gray' }}-400"></i></li>
				<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow':'gray' }}-400"></i></li>
				<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow':'gray' }}-400"></i></li>
				<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow':'gray' }}-400"></i></li>
				<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 5 ? 'yellow':'gray' }}-400"></i></li>
			</ul>

			<p class="text-sm text-gray-600 ml-auto"><i class="fas fa-users mr-2"></i>{{ $course->students_count }}</p>
		</div>

		@if($course->price->value == 0)
			<p class="mt-2 text-gray-700 font-bold">Gratis</p>
		@else
			<p class="mt-2 text-gray-700 font-bold">{{$course->price->value}} US$</p>
		@endif

		<a href="{{ route('courses.show', $course) }}" class="btn btn-primary mt-2 btn-block">
			Ver Curso
		</a>
	</div>
</article>