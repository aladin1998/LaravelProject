@extends('layouts.app2')

@section('content')
@if(!empty($etudiant[0]))
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Confirmer le représentant</div>
                <div class="card-body">
                <div class="alert alert-danger" role="alert">
                Vous êtes sur le point de rejeter l'etudiant ci-dessus de la liste des représantants 
</div>
<table class="table col-md-10 mx-auto text-center">

  <tbody>
    <tr>
      <th scope="row">Nom</th>
      <td>

{{$etudiant[0]->name}}

      </td>

    </tr>
    <tr>
      <th scope="row">Prénom</th>
      <td>
      {{$etudiant[0]->prenom}}
      </td>

    </tr>
    <tr>
      <th scope="row">CNE</th>
      <td>

{{$etudiant[0]->CNE}}

      </td>

    </tr>
  </tbody>
</table>
                
<form action="{{url('admin/deleteRep/'.$etudiant[0]->id)}}" method="POST" >
@method('PUT')
@csrf

<div class="text-center">
<button type="submit" class="btn btn-danger">Rejeter</button>

</div>
</form>

                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
              @else
              <div class="container col-md-10">
              <div class="alert alert-danger" role="alert">
  étudiant n'existe pas
</div>
<div class="row d-flex justify-content-center">
<a href="{{ url()->previous() }}" class="btn border border-success mx-auto">
                        <img width="40" height="40" src="{{ URL::asset('images/try.png')}}" alt=""><br/>
                     Réessayer
                        </a></div></div>
              @endif
                @endsection

