@extends('layouts.app2')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Liste des représantants</div>
                <div class="card-body">
                <!--table des représantants-->
                <table class="table">
  <thead>
    <tr>
      <th scope="col">CNE</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Filliére</th>
    </tr>
  </thead>
  <tbody>
  @foreach($reps as $rep)
    <tr>
      <th scope="row">{{$rep->CNE}}</th>
      <td>{{$rep->name}}</td>
      <td>{{$rep->prenom}}</td>
      <td>{{$rep->fillier['libelle']}}</td>
    </tr>
@endforeach
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection