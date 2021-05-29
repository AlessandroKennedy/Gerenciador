<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Novo Veículo') }}
        </h2>
        <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div>
                <form id="formVehicles" name="formVehicles" method="post" action="{{url('dashboard/vehicle/new')}}" class="form-group  col-md-12">
                @csrf
                <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="brand"><b>Marca</b></label>
                        <input name="brand" type="text" class="form-control" id="brand" placeholder="Marca do Veículo" >
                        </div>
                        <div class="form-group col-md-6">
                        <label for="model"> <b>Modelo</b> </label>
                        <input name="model" type="text" class="form-control" id="model" placeholder="Modelo do Veículo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="version"><b>Versão</b> </label>
                        <input name="version" type="text" class="form-control" id="version" placeholder="Versão do veículo">
                    </div>
                    <div class="form-group">
                        <label for="color"><b>Cor</b> </label>
                        <input name="color" type="text" class="form-control" id="color" placeholder="Cor do Veículo" >
                    </div>
                    
                    @if(isset($errors) && count($errors) > 0)
    
                        <div class="text-center mt-4 mb-4 p-2 alert-danger">
                            {{$errors->all()[0]}}
                        </div>

                    @endif
                    <button type="submit" class="btn btn-primary"><b>Cadastrar Veículo</b> </button>
                    <a type="button" href="{{url('dashboard/vehicle/show')}}" class="btn btn-link">Veículos Cadastrados</a>
                </form>
                
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('site/bootstrap.js')}}"></script>
        <script src="{{asset('site/jquery.js')}}"></script>
</x-app-layout>