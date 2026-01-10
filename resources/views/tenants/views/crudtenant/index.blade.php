<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ __('Inquilinos') }}
<div class="flex justify-end">
<x-btn-link class="ml-4" href="{{route('tenants.create')}}">Agregar inquilino</x-btn-link>
</div>
</h2>
</x-slot>

<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
	<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

		<div class="p-6 text-gray-900 dark:text-gray-100">
			{{ __("You're logged in!") }}
		</div>

	</div>
	</div>
</div>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900 dark:text-gray-100">
<div class="relative overflow-x-auto">
<table class="w-full text-sm text.left text-gray-500 dark:bg-gray-700 dark:text-gray-400">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
<tr>
<th scope="col" class="px-6 py-3">#</th>
<th scope="col" class="px-6 py-3">Nombre:</th>
<th scope="col" class="px-6 py-3">Dominio:</th>
<th scope="col" class="px-6 py-3">Status:</th>
<th scope="col" class="px-6 py-3">Creado el:</th>
<th scope="col" class="px-6 py-3">Acciones:</th>
</tr>
</thead>
<tbody>
@foreach($tenants as $tenant)
<tr class="bg:white border-b dark:bg-gray-800 dark:border-gray-700">
<th scope="row" class= "px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$tenant->id}}</th>
<th class="px-6 py-4">{{$tenant->name}}</th>
<th class="px-6 py-4">{{$tenant->domains->first()->domain ?? ''}}</th>
<th class="px-6 py-4">{{$tenant->status}}</th>
<th class="px-6 py-4">{{$tenant->created_at}}</th>
<th class="flex items-center px-6 py-4">
<a href="{{route('tenants.edit', $tenant)}}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
<form action="{{route('tenants.destroy', $tenant)}}" method="post">
	@csrf

	@method('DELETE')

	<button class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Delete</button>
</form>
</th>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</x-app-layout>
