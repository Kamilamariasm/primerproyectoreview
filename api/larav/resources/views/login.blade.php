@extends('layouts.main')

@section('title', 'Iniciar sesión')

@section('content')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/boostrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/resposive.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css.map') }}">
  <link rel="stylesheet" href="{{ asset('css/style.scss') }}">

<div class="login_section layout_padding" style="height: 100vh; background-image: url('{{ asset('images/nube.png') }}'); background-size: cover; background-position: center;">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h2 class="custom_heading">
                    Inicia sesión
                </h2>
                <h3 class="custom_heading mt-3">
                    Embárcate en un viaje donde se captura la esencia de cada refugio en Sonora
                </h3>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
                </div>
                <div class="d-flex justify-content-center mt-4 ">
                <button type="submit" class="btn btn-secondary">Entrar</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <p>¿No tienes una cuenta? <a href="#">Regístrate</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
