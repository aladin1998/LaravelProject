@extends('layouts.app2')
@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Importer un Cours</div>
                    <div class="card-body">
     
             <form action="{{ route('rep.storeCour')}}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                 @csrf
                 <div class="form-group">
                 <label for="formGroupExampleInput"> &nbsp Professeur</label>
                <select name="prof" placeholder="niveau" class="form-control">
                <option value="">--choisir Professeur--</option>
                @foreach($fillier->modules as $module)
                @foreach($module->enseignants as $prof)
                 <option value="{{$prof->id}}">{{$prof->nom}} {{$prof->prenom}}</option>
                 @endforeach
                 @endforeach
                 </select> 
                 </div> 
                 <div class="form-group">
                 <label for="formGroupExampleInput"> &nbsp Module</label>
                <select name="module" placeholder="niveau" class="form-control">
                <option value="">--choisir le module--</option>
                 @foreach($fillier->modules as $module)
                 <option value="{{$module->id}}">{{$module->libelle}}</option>
                 @endforeach
                 </select>
                 </div>
                 <div class="form-group">
    <label for="exampleInputPassword1">&nbsp Titre</label>
    <input name="titre" id="titre" type="text" class="form-control" >
  </div>
                 <div class="form-group">
                 <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" name="file" lang="fr">
  <label class="custom-file-label" for="customFileLang">importer le fichier </label>
</div>
</div>
<div>
    <div class="text-center"><input type="submit" class="btn btn-success"/></div>
</div>

                </form> 


                </div></div></div></div></div>

                
@endsection