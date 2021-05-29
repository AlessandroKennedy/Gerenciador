<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Nova Manutenção') }}
        </h2>
        <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div>
                <form  id="formMaintenance" name="formMaintenance" method="post" action="{{url('dashboard/maintenance/new')}}"class="form-group  col-md-12">
                @csrf
                <br>
                    
                      

                <div class="form-group  col-md-6"> 
                       <label for="vehicleId"> <b>Veículo</b> </label>
                        <select class="custom-select mr-sm-2" name="vehicleId" id="vehicle">
                            @if(isset($vehicles) && count($vehicles) > 0)
                           
                            
                            @foreach($vehicles as $vehicle)
                            <option id="vehicle" name="vehicle" value={{$vehicle->id}} >{{$vehicle->model}}  versão {{$vehicle->version}} </option>
                            @endforeach

                            @else
                            <option selected>Nenhuym veículo cadastrado...</option>
                           
                           

                            @endif
                            
                        </select>    
                   
                 
                        <label for="descriptionProblem"><b>Descrição do problema</b></label>
                        <textarea class="form-control" name="descriptionProblem" id="descriptionProblem" rows="3"></textarea>
                     
                    
                        
                    
                        <label for="conclusionDate" > <b>Data para retirada do Veículo</b></label>
                       
                            <input min="{{$today}}" class="form-control" type="date" value="{{$today}}" name="conclusionDate" id="conclusionDate">
                        </div>
                   
                        @if(isset($errors) && count($errors) > 0)
    
                            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                                {{$errors->all()[0]}}
                            </div>

                        @endif

                          @if(isset($msg))
                            
                            <div class="text-center mt-4 mb-4 p-2 alert-success">
                                {{$msg}}
                            </div>

                        @endif
                    
                    <button type="submit" class="btn btn-primary"><b>Cadastrar Manutenção</b> </button>
                   
                </form>
                
                
            </div>
        </div>
    </div>
    <script src="{{asset('site/bootstrap.js')}}"></script>
        <script src="{{asset('site/jquery.js')}}"></script>
</x-app-layout>