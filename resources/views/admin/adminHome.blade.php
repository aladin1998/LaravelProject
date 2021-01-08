@extends('layouts.app3')
   
@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Accueil</div>
                <div class="card-body">
                    Bonjour Admin.
                <div class="container">
                    <div class="row mx-auto d-flex justify-content-center" >
                        <div class="col col-md-4 rounded ">
                        <a href="addRep" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/add.png')}}" alt=""><br/>
                      Ajouter représentant
                        </a>
                        
                        </div>
                        <div class="col col-md-4 rounded ">
                        <a href="list" class="btn border border-primary">
                        <img width="50" height="50" src="{{ URL::asset('images/contact-list.png')}}" alt=""><br/>
                        Liste des représentants
                        </a>
                        
                        </div>
                        <div class="col col-md-4 rounded ">
                        <a href="deleteRep" class="btn border border-danger">
                        <img width="50" height="50" src="{{ URL::asset('images/people.png')}}" alt=""><br/>
                        supprimer représentant
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