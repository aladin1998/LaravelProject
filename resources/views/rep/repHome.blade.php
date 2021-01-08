@extends('layouts.app3')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Accueil</div>
                    <div class="card-body">
                Bonjour {{$user->name}}
                       <div class="container text-center">
                          <div class="row mx-auto d-flex justify-content-center" >
                            <div class="col col-md-4 rounded ">
                        <a href="sendFile/content" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/upload.png')}}" alt=""><br/>
                        Importer un fichier
                        </a>
                              </div>
                              <div class="col col-md-4 rounded ">
                        <a href="downloadFile/modules" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/download.png')}}" alt=""><br/>
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
</div>                
@endsection