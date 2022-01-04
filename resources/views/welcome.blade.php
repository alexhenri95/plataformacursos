<x-app-layout>

	{{-- Imagen y buscador --}}
	<section class="bg-cover" style="background-image: url({{asset('img/home/home.jpg')}});">

		<div class="container py-40">
			<div class="w-full md:w-3/4 lg:w-1/2">
				<h1 class="text-white font-bold text-4xl">Domina las tecnologías actuales del desarrollo web</h1>
				<p class="text-white text-lg mt-2 mb-4">En nuestra página encontrarás cursos para tu buen desarrollo en el área laboral o académico con maestros de larga experiencia en el mundo de la programación.</p>

				@livewire('search')
			</div>
		</div>
	</section>

	{{-- Sección de contenido GRID --}}
	<section class="mt-24">
		<h1 class="text-gray-800 text-center text-3xl">CONTENIDO</h1>

		<div class="container pt-6 pb-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
			<article>
				<figure>
					<img class="rounded-md h-40 w-full object-cover" src="{{ asset('img/home/content1.jpg') }}" alt="">
				</figure>

				<header class="my-3">
					<h1 class="text-center text-xl text-gray-700">Cursos y Proyectos</h1>
				</header>

				<p class="text-sm text-gray-600 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Velit, cumque nihil. </p>
			</article>

			<article>
				<figure>
					<img class="rounded-md h-40 w-full object-cover" src="{{ asset('img/home/content2.jpg') }}" alt="">
				</figure>

				<header class="my-3">
					<h1 class="text-center text-xl text-gray-700">Backend</h1>
				</header>

				<p class="text-sm text-gray-600 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Velit, cumque nihil. </p>
			</article>

			<article>
				<figure>
					<img class="rounded-md h-40 w-full object-cover" src="{{ asset('img/home/content3.jpg') }}" alt="">
				</figure>

				<header class="my-3">
					<h1 class="text-center text-xl text-gray-700">Fronted</h1>
				</header>

				<p class="text-sm text-gray-600 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Velit, cumque nihil. </p>
			</article>

			<article>
				<figure>
					<img class="rounded-md h-40 w-full object-cover" src="{{ asset('img/home/content4.jpg') }}" alt="">
				</figure>

				<header class="my-3">
					<h1 class="text-center text-xl text-gray-700">Manuales</h1>
				</header>

				<p class="text-sm text-gray-600 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Velit, cumque nihil. </p>
			</article>
		</div>
	</section>

	{{-- Section de Link catalogo de cursos --}}
	<section class="mt-24 bg-gray-700 py-12 ">
		<h1 class="text-center text-white text-3xl">¿No sabes qué curso comprar?</h1>
		<p class="text-center text-white">Dirígete al catálogo de nuestros cursos y fíltralos por categoría o nivel.</p>

		<div class="flex justify-center mt-4">
			<a href="{{ route('courses.index') }}" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
				Catálago de cursos
			</a>			
		</div>
	</section>

	{{-- Ultimos cursos agregados --}}
	<section class="mt-24">
		<h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
		<p class="text-center text-gray-500 text-sm ">Mira los últimos cursos que hemos subido.</p>

		<div class="container pt-6 pb-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
			
			@foreach($courses as $course)
				<x-course-card :course="$course"/>
			@endforeach

		</div>
	</section>
</x-app-layout>