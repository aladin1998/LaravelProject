@extends('layouts.app2')

@section('content')
<div class="container">
<div class="alert alert-success" role="alert">
@if($source=='rejet')
  <h4 class="alert-heading">Le represantant a été rejeté avec succés !</h4>
  <p>Ce étudiant n'a pas le droit d'importer les fichiers</p>
  <hr>
  <p class="mb-0"></p>
  @else
  <h4 class="alert-heading">La sélection du represantant s'est déroulé avec succés!</h4>
  <p>ce represtant a maintenant le droit d'importer des documents afin que les etudiants  peuvent telecharger et visualiser</p>
  <hr>
  <p class="mb-0"></p>
  @endif
</div>

</div>
@endsection