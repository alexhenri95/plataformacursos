<x-app-layout>

	{{-- Imagen y buscador --}}
	<section class="bg-cover" style="background-image: url({{asset('img/courses/course.jpg')}});">

		<div class="container py-40">
			<div class="w-full md:w-3/4 lg:w-1/2">
				<h1 class="text-white font-bold text-4xl">Los mejores cursos de programación ¡GRATIS!.</h1>
				<p class="text-white text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso.</p>

				@livewire('search')
			</div>
		</div>
	</section>

	@livewire('courses-index')

</x-app-layout>