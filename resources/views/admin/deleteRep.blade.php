@extends('layouts.app2')
@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Supprimer représantant</div>
                <div class="card-body">
               <form action="{{url('admin/deleteRep')}}" method="POST">
                @method('PUT')
                 @csrf
                <label for="formGroupExampleInput">la Filière</label>
                <select name="classe" placeholder="niveau" class="form-control">
                <option >--Choisir la Filière--</option>
                @foreach($filliers as $fil)

  <option value="{{$fil->id}}">{{$fil->libelle}}</option>
  @endforeach
</select><br/>
<label for="formGroupExampleInput">Carte National d'étudiant</label>
<input name="cne" class="form-control" type="text" placeholder="CNE"><br/>
<div class="text-center">
<button type="submit" class="btn btn-success mb-2">Envoyer</button>

</div>
                </form>
</div>
</div>
    </div>
</div>

@endsection