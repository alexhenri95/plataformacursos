<div>
    <h1 class="text-2xl font-bold ">Lecciones del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach($course->sections as $item)
        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">
                @if($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" type="text" class="form-input w-full rounded" placeholder="Ingrese el nombre de la sección">
                        @error('section.name')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer" x-on:click="open=!open"><strong>Sección:</strong> {{ $item->name }}</h1>
                        
                        <div>
                            <i class="fas fa-edit text-blue-500 cursor-pointer" wire:click="edit({{$item}})"></i>
                            <i class="fas fa-eraser text-red-500 cursor-pointer" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            <strong>Agregar nueva sección</strong>
        </a>

        <article class="card mt-2" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-lg font-bold mb-2">Agregar sección</h1>
                <div>
                    <input wire:model="name" type="text" class="form-input w-full rounded" placeholder="Escriba el nombre de la sección">

                    @error('name')
                    <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                        <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                    </div>            
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="text-sm bg-red-500 py-2 px-4 rounded text-white" x-on:click="open = false">Cancelar</button>
                    <button class="text-sm bg-blue-500 py-1 px-4 rounded text-white ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
