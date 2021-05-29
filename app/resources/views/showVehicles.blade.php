<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Veículos') }}
        </h2>
        <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    </x-slot>

    <div class="py-12 flex items-center"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                <ul class="list-group">
  <li class="list-group-item  list-group-item-info"><b> Veículos cadastrados</b> </li>
  @foreach($vehicles as $vehicle)
  <li class="list-group-item">
                <div class="card "  style="width: 30rem;">
                <x-car class="w-10 h-10 fill-current text-gray-500" />
                
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Modelo:</b> {{ $vehicle->model}}</li>
                    <li class="list-group-item"><b>Marca:</b>  {{ $vehicle->brand}}</li>
                    <li class="list-group-item"><b>Versão:</b> {{ $vehicle->version}}</li>
                    <li class="list-group-item"><b>Cor:</b> {{ $vehicle->color}}</li>
                   
                </ul>
                <div class="card-body">
                    <a href="/dashboard/vehicle/delete/{{$vehicle->id}}" class="card-link">Deletar</a>
                </div>
                </div>
  
   </li>
   <br>
   @endforeach
  
   @if(count($vehicles)<1 )
   <li class="list-group-item">
   Nenhuma veículo cadastrado...
   </li>
   @endif
  
 
</ul>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('site/bootstrap.js')}}"></script>
        <script src="{{asset('site/jquery.js')}}"></script>
</x-app-layout>
