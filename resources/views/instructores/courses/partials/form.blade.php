{!! Form::hidden('user_id', auth()->user()->id) !!}

<div class="mb-4">
	{!! Form::label('title', 'Título del curso:', ['class'=>'font-bold']) !!}
	{!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 rounded'. ($errors->has('title') ? ' border-red-600' : '')]) !!}

	@error('title')
	<div class="bg-red-200 border-l-4 border-red-500 p-2 mt-1">
		<p class="text-sm text-red-500 font-bold">(*) {{$message}}</p>
	</div>	
	@enderror
</div>

<div class="mb-4">
	{!! Form::label('slug', 'URL amigable:', ['class'=>'font-bold']) !!}
	{!! Form::text('slug', null, ['readonly'=>'readonly', 'class' => 'form-input block w-full mt-1 rounded'. ($errors->has('slug') ? ' border-red-600' : '')]) !!}

	@error('slug')
	<div class="bg-red-200 border-l-4 border-red-500 p-2 mt-1">
		<p class="text-sm text-red-500 font-bold">(*) {{$message}}</p>
	</div>
	@enderror
</div>

<div class="mb-4">
	{!! Form::label('subtitle', 'Subtítulo del curso:', ['class'=>'font-bold']) !!}
	{!! Form::text('subtitle', null, [ 'class' => 'form-input block w-full mt-1 rounded'. ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

	@error('subtitle')
	<div class="bg-red-200 border-l-4 border-red-500 p-2 mt-1">
		<p class="text-sm text-red-500 font-bold">(*) {{$message}}</p>
	</div>
	@enderror
</div>

<div class="mb-4">
	{!! Form::label('description', 'Descripción del curso:', ['class'=>'font-bold']) !!}
	{!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1 rounded'. ($errors->has('description') ? ' border-red-600' : '')]) !!}

	@error('description')
	<div class="bg-red-200 border-l-4 border-red-500 p-2 mt-1">
		<p class="text-sm text-red-500 font-bold">(*) {{$message}}</p>
	</div>
	@enderror
</div>

<div class="grid grid-cols-3 gap-4">
	<div>
		{!! Form::label('category_id', 'Categorías:', ['class'=>'font-bold']) !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 rounded']) !!}
	</div>
	<div>
		{!! Form::label('level_id', 'Niveles:', ['class'=>'font-bold']) !!}
		{!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 rounded']) !!}
	</div>
	<div>
		{!! Form::label('price_id', 'Precios:', ['class'=>'font-bold']) !!}
		{!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 rounded']) !!}
	</div>
</div>

<h1 class="text-xl font-bold mb-2 mt-6">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
	<figure>
		@isset($course->image)
			<img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
		@else
			<img id="picture" class="w-full h-64 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/02/18/19/25/pc-1207886_960_720.jpg" alt="">
		@endisset
	</figure>
	<div>
		<p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Reprehenderit, ex! Nesciunt excepturi repudiandae, iste enim commodi ab beatae, libero obcaecati repellat. Odio nostrum eius iure, voluptatem odit similique, est aperiam.</p>

		{!! Form::file('file', ['class' => 'form-input w-full border p-2 mt-4 rounded' . ($errors->has('file') ? ' border-red-600' : ''),'id'=>'file','accept' => 'image/*']) !!}

		@error('file')
			<div class="bg-red-200 border-l-4 border-red-500 p-2 mt-1">
				<p class="text-sm text-red-500 font-bold">(*) {{$message}}</p>
			</div>	
		@enderror
	</div>
</div>