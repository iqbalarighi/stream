<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Testing Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-white">
               <h1 class="text-2xl font-bold underline text-center text-sky-400">
    Hello world!
  </h1>
               <div class="sm:px-8">
               	<table class="ml-8 table-auto text-center">
               		<thead>
               		<tr>
               			<th>No</th>
               			<th>Nama</th>
               			<th>email</th>
               		</tr>
               	</thead>
               	<tbody>
               		@foreach($user as $item)
               		<tr>
               			<td>{{$item->id}}</td>
               			<td>{{$item->name}}</td>
               			<td>{{$item->email}}</td>
               		</tr>
               		@endforeach
               	</tbody>
               	</table>
               </div>

            </div>
        </div>
    </div>
</x-app-layout>