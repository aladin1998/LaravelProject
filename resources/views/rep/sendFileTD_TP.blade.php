@extends('layouts.app2')
@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Importer un {{$content}}</div>
                    <div class="card-body">
     
             <form action="{{ route('rep.store'.$content)}}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                 @csrf
                 
                 <div class="form-group">
    <label for="exampleInputPassword1">&nbsp Cours</label>
    <select name="cours" placeholder="niveau" class="form-control">
                <option value="">--choisir le cours--</option>
                @foreach($fillier->modules as $module)
                @foreach($module->cours as $cour)
                 <option value="{{$cour->id}}">{{$cour->titre}}</option>
                 @endforeach
                 @endforeach
              
     </select>
     

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">&nbsp Type</label>
    <select name="type" placeholder="niveau" class="form-control">
                <option value="">--énoncé ou correction--</option>
                <option value="enonce">énoncé</option>   
                <option value="correction">correction</option>         
     </select>
  </div>
  <div class="form_group">
  <label for="exampleInputPassword1">&nbsp Numéro de TD</label>
  <input type="number" class="form-control" name="numero">
  </div><br>
        
 
          <div class="form-group">
                 <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" name="file" lang="fr">
  <label class="custom-file-label" for="customFileLang">importer le fichier </label>
</div>
</div>

<div class="text-center"><input type="submit" class="btn btn-success"/></div>
                </form> 


                </div></div></div></div></div>


@endsection