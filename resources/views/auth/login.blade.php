@extends('templates.main')

@section('titulo')

@endsection

@section('principal')

    {{-- include del form de errores para que se pueda mostrar la alerta --}}
    {{-- @include('partial.errores') --}}

    <div class="card mt-5 border-primary mr-auto ml-auto col-6">
        <div class="card-header bg-dark text-light">
            LOGIN
        </div>
        <div class="card-body">
            <form action="{{action('Auth\LoginController@login')}}" method="POST">
                @csrf

                {{-- CORREO --}}
                <div class="form-group row">
                  <label for="titulo" class="col-sm-4 col-form-label">Correo electronico</label>
                  <div>
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('correo')}}">
                    {{-- old para que te muestre lo mismo que habia antes --}}
                  </div>
                </div>

                {{-- CONTRASENYA --}}
                <div class="form-group row">
                  <label for="director" class="col-sm-4 col-form-label">Contraseña</label>
                  <div>
                    <input type="password" name="contrasenya" id="contrasenya" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('contrasenya')}}">
                  </div>
                </div>

                {{-- BOTONES --}}
                <div class="form-group row">
                  <div class="col-lg-8 offset-lg-4">
                    <button type="submit" class="btn btn-primary">ACEPTAR</button>
                  <a name="" id="" class="btn btn-secondary" href="{{ url('/')}}" role="button">CANCELAR</a>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection
