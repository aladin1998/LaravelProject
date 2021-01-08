@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Accueil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bonjour cher étudiant !<br>
                     <div class="container">
                    
                     <div class="row mx-auto d-flex justify-content-center" >
                            <div class="col col-md-4 rounded ">
                        <a href="rep/downloadFile/modules" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/upload.png')}}" alt=""><br/>
                      Télécharger un fichier
                        </a>
                              </div>
                              </div>
                     </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
