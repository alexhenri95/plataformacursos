<section>
    <h1 class="text-2xl font-bold ">Audiencia del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach($course->audience as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full rounded" type="text">
                    </form>
                    @error('audience.name')
                    <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                        <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                    </div>            
                    @enderror
                @else
                    <header class="cursor-pointer flex justify-between">
                        <h1>{{$item->name}}</h1>

                        <div>
                            <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{$item}})" class="fas fa-eraser text-red-500 cursor-pointer ml-1"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full rounded" placeholder="Escriba el nombre de la audiencia">
                 @error('name')
                <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                    <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                </div>            
                @enderror
                <div class="flex justify-end mt-2">
                    {{-- <button class="text-sm bg-red-500 py-2 px-4 rounded text-white" x-on:click="open = false">Cancelar</button> --}}
                    <button class="text-sm bg-blue-500 py-1 px-4 rounded text-white ml-2">Agregar</button>
                </div>
            </form>
        </div>
    </article>
</section>

