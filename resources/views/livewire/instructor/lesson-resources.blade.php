<div class="card" x-data="{open: false}">
    <div class="card-body bg-gray-100">
        <header class="cursor-pointer" x-on:click="open = !open">
            <h1 class="cursor-pointer text-sm font-bold">Recursos</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if($lesson->resource)

                <div class="flex justify-between items-center">
                    <p class="text-gray-500 text-sm font-bold"><i class="fas fa-download mr-2 cursor-pointer" wire:click="download"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form class="w-full" wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input text-sm flex-1">
                        <button type="submit" class="text-sm bg-indigo-500 py-1 px-4 rounded text-white">Guardar</button>
                    </div>

                    <div class="text-blue-500 font-bold text-sm" wire:loading wire:target="file">
                        Cargando...
                    </div>

                    @error('file')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                    @enderror
                </form>
            @endif
            
        </div>
    </div>
</div>
