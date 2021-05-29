<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    </x-slot>

    <div class="py-12 flex items-center"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                <ul class="list-group">
  <li class="list-group-item  list-group-item-info"><b> Manutenções agendadas da semana</b> </li>
  @foreach($maintenances as $maintenance)
  <li class="list-group-item">
                <div class="card "  style="width: 30rem;">
                <x-icon-car class="w-20 h-20 fill-current text-gray-500" />
                <div class="card-body">
                    <h5 class="card-title"><b>Modelo:</b>  {{ $maintenance->model}}</h5>
                    <p class="card-text"><b>Descrição do problema:</b>  {{$maintenance->descriptionProblem}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Marca:</b>  {{ $maintenance->brand}}</li>
                    <li class="list-group-item"><b>Versão:</b> {{ $maintenance->version}}</li>
                    <li class="list-group-item"><b>Cor:</b> {{ $maintenance->color}}</li>
                    <li class="list-group-item"><b>Data:</b> {{ $maintenance->conclusionDate}}</li>
                </ul>
                <div class="card-body">
                    <a href="dashboard/maintenance/edit/{{$maintenance->id}}" class="card-link">Editar</a>
                    <a href="dashboard/maintenance/delete/{{$maintenance->id}}" class="card-link">Deletar</a>
                </div>
                </div>
  
   </li>
   <br>
   @endforeach
  
   @if(count($maintenances)<1 )
   <li class="list-group-item">
   Nenhuma manutenção agendada para os proximos 7 dias...
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
