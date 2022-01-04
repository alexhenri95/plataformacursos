<form  class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
	<input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Buscar..." wire:model="search">

	<button type="submit" class="btn btn-primary absolute right-0 top-0 mt-2 focus:outline-none">
		Buscar
	</button>


	@if($search)
		<ul class="absolute z-50 w-full left-0 bg-white rounded mt-1 overflow-hidden">
			@forelse($this->results as $result)
				<li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
					<a href="{{ route('courses.show', $result) }}">{{$result->title}}</a>
				</li>
			@empty
				<li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
					No hay resultados de la búsqueda.
				</li>
			@endforelse
		</ul>
	@endif	
</form >