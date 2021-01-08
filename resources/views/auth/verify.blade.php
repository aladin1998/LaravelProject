@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre boite email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="row">
				<div class="col-12" >
                {{ __('Veuillez vérifier votre boite de réception (Celle que vous avez fournie lors de l’inscription en ligne) pour compléter la procédure de réinitialisation.') }}

				</div>
                </div>
                <div class="row">
				<div class="col-12" >
         <a href="{{ route('password.request') }}">Renvoyer le code</a>
				</div>
                </div>
                 <br>
                    <form class="d-inline" method="POST" action="{{ route('reset.confirm') }}">
                        @csrf
                        <div>
                           
                                <div > <input type="number" class="form-control" name="code"></div>
                            
                        </div> <br>
                       
                        <div>
                            <div class="text-center">  <button type="submit" class="btn btn-success">Valider</button>
</div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
