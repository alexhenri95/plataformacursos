<di>
	{{-- Seccion de filtros --}}
    <div class="bg-gray-200 py-4">
    	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">

    		<button class="bg-white shadow h-12 px-4 rounded text-gray-700 mr-4 focus:outline-none" wire:click="resetFilter">
    			<i class="fas fa-layer-group text-sm mr-2"></i> Todos los cursos
    		</button>

			<!-- Dropdown Catgorias -->
			<div class="relative" x-data="{ open: false}">
				<button class="block bg-white shadow h-12 px-4 rounded text-gray-700 mr-4 focus:outline-none" x-on:click="open = true">
					<i class="fas fa-tags text-sm mr-2"></i> Categorías
					<i class="fas fa-angle-down text-md ml-2"></i>
				</button>
				<!-- Dropdown Body -->
				<div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false"> 

				@foreach($categories as $category)  
					<a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white cursor-pointer" wire:click="$set('category_id', {{$category->id}})" x-on:click="open= false">{{$category->name}}</a>
				@endforeach

				</div>
			</div>

			<!-- Dropdown Niveles -->
			<div class="relative" x-data="{ open: false}">
				<button class="block bg-white shadow h-12 px-4 rounded text-gray-700 mr-4 focus:outline-none" x-on:click="open = true">
					<i class="fas fa-cubes text-md mr-2"></i> Niveles
					<i class="fas fa-angle-down text-md ml-2"></i>
				</button>
				<!-- Dropdown Body -->
				<div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
				@foreach($levels as $level)  
					<a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white cursor-pointer" wire:click="$set('level_id', {{$level->id}})" x-on:click="open= false">{{$level->name}}</a>
				@endforeach
				</div>
			</div>

    	</div>
    </div>

    {{-- Ultimos cursos agregados --}}
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-8 lg:grid-cols-4 gap-x-6 gap-y-8">
		
		@foreach($courses as $course)
			<x-course-card :course="$course"/>
		@endforeach
	</div>

	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
		{{ $courses->links() }}
	</div>
</div>