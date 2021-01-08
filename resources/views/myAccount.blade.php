@extends('layouts.app2')

@section('content')
<div class="container" >
		<div class="row">
			<div style=" margin-top:10px;height: 290px;"  class="col col-lg-3 col-md-12 col-12 border border-primary text-center rounded shadow p-3 mb-5" >	
           <img onclick="customFile.click();" width="200" height="200" src="{{asset('storage/'.$fileName)}}"><br>
           <form method="POST" action="{{ route('change.photo') }}"  enctype="multipart/form-data">
           @method('PUT')
                 @csrf
<input value="modfier" type="file" onclick="submit.hidden=false;" name="file" class="custom-file-input" id="customFile"/>
<input type="submit" class="btn "  value="modifier image" id="submit" hidden/>
</form>
           
</div>
<div class="col col-lg-8">
<div class="card">
  <h5 class="card-header">Les informations personelles</h5>
  <div class="card-body">
  	<div class="row">
<div class="col-md-4 col-4 ">  		
<strong>Nom </strong>
</div>
<div class="col-8 ">
	<p>{{$user->name}}</p>
</div>
</div>
 	<div class="row">
<div class="col-4 ">  		
<strong>Prénom </strong>
</div>
<div class="col-8 ">
	<p>{{$user->prenom}}</p>
</div>
</div>
<div class="row">
<div class="col-4 ">  		
<strong>CIN </strong>
</div>
<div class="col-8 ">
	<p>{{$user->CIN}}</p>
</div>
</div>
<div class="row">
<div class="col-4 ">  		
<strong>CNE </strong>
</div>
<div class="col-8 ">
	<p>{{$user->CNE}}</p>
</div>
</div>
<div class="row">
<div class="col-4 ">  		
<strong>Email </strong>
</div>
<div class="col-4 ">
	<p>{{$user->email}}</p>
</div>
<div class="col-4 ">
	  <div id="headingTwo">
      <h2 class="mb-0">
        <a style="color:red;" class="btn btn-link btn-block collapsed " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Modifier
        </a>
      </h2>
    </div>

 
</div>
</div>
 <div class="row">
 	
<div id="collapseTwo" class="col collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
       
<form method="POST" action="{{ route('change.email') }}">
@csrf
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-3 col-form-label">Nouveau email</label>
    <div class="col-sm-9">
      <input type="email" name="new_email" class="form-control" id="colFormLabel" placeholder="email valide">
      <br>
      <div class="form-group row ">
	 	<div class=" col col-md-12 text-center">





<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
 Valider
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        vous etes sur le point de changer votre email
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>






                                 
	</div>
</div>
    </div>
  </div>

</form>      
   
</div>
</div></div>
<div class="row">

	<div class="col col-md-11">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
  
          <button  class="btn " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <i class="fas fa-key"> </i> Changer le mot de passe
  </button>

      </h2>
      @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
    </div>


      	<div class="collapse" id="collapseExample">
  <div class="card card-body">
  
  <form id="form2" method="POST" action="{{ route('change.password') }}">
                        @csrf 
   
                        
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Actuel</label>
    <div class="col-sm-10">
    <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password"  class="col-sm-2 col-form-label">Nouveau</label>
    <div class="col-sm-10">
    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
    </div>
  </div>
    <div class="form-group row">
    <label for="password"  class="col-sm-2 col-form-label">Confirmer</label>
    <div class="col-sm-10">
    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
    </div>
  </div>
  <div class="form-group row ">
	 	<div class=" col col-md-12 text-center">
     <input type="submit" class="btn btn-warning" />
	</div>
</div>
</form> 
  </div>
</div>
    
      </div>
    </div>
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
