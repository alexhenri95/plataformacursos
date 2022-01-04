<x-app-layout>
	<div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
		<h1 class="font-semibold text-xl mb-2 text-gray-600">Detalle del pedido</h1>
		<div class="card">
			<div class="card-body">
				<article class="flex items-center text-gray-600">
					<img class="h-12 w-12 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
					<h1 class="ml-2">{{$course->title}}</h1>
					<p class="text-lg font-bold ml-auto">{{$course->price->value}} US$</p>
				</article>
				<div class="flex justify-end mt-2 mb-4">
					<a href="{{route('payment.pay', $course)}}" class="btn btn-primary btn-sm">Comprar curso</a>
				</div>
				<hr>
				<p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sunt quas blanditiis, eius accusamus dolor mollitia accusantium voluptatum dicta temporibus, velit, ipsam officiis. Animi iure rerum repudiandae vero quod perspiciatis? <a href="" class="text-red-500">Terminos y condiciones</a></p>
			</div>
		</div>
	</div>
</x-app-layout>