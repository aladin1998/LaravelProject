@extends('layouts.app2')

@section('content')
@auth
<div class="container w-100 ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">le choix de cours</div>
                    <div class="card-body row justify-content-center ">
                   
           <form style="margin-bottom:30px;" method="GET" action="{{ url('rep/downloadFile/modules/{id}') }}">
			<div class="row">
				<div class="col-md-10 col-8" >
					<input  type="text" name="search" class="form-control" placeholder="Titre du cours" value="{{ old('search') }}">
				</div>
				<div class="col-md-1 col-2">
					<button class="btn btn-success">Chercher</button>  
				</div>
			</div>
		</form>

                    <div class="list-group col-md-12 text-center">
                    <table classe="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">   <a href="#" class="list-group-item list-group-item-action active">titre  </a></th>

   
                    <th><a href="#" class="list-group-item list-group-item-action active">  Cours </a></th>
                    @if(auth()->user()->is_represantant == 1)
                    <th><a href="#" class="list-group-item list-group-item-action active">  modifier </a></th>
                    <th><a href="#" class="list-group-item list-group-item-action active">  supprimer </a></th>
                    @endif
                   
                    <th><a href="#" class="list-group-item list-group-item-action active">TDs  </a></th>

                    <th><a href="#" class="list-group-item list-group-item-action active">TPs  </a></th>
                  
                   @if(auth()->user()->is_represantant == 1)
                    <th><a href="#" class="list-group-item list-group-item-action active"><img width="30" height="20php artisan make:migration add_paid_to_users_table --table=users" src="{{ URL::asset('images/see.png')}}" alt="">  </a></th>
                  @endif
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach($cours as $cour)
                    <tr>
                    <td>  <a href="#" class="list-group-item list-group-item-action">
    {{$cour->titre}} <p class="card-text"></p>
  </a></td>
  
                    
                   
                    <td  ><a style="width:100px; padding:5px;"  href="{{url('rep/downloadFile/cours/'.$cour->id)}}" type="button" ><img width="45" height="45" src="{{URL::asset(\App\Http\Controllers\downloadFileController::imagePathCour($cour))}}" alt=""></a> </td>
                    @if(auth()->user()->is_represantant == 1)
                    <form action="{{ url('rep/editeFile/cours/'.$cour->id)}}" method="GET">
                    @csrf
                   
                   <td width="80"> <button style="background:none;border:none;" type="submit"><img  width="30" height="30" src="{{ URL::asset('images/modifier.png')}}" alt=""></button></td>
                   </form>
                   
                    <form action="{{ url('rep/deleteFile/cours/'.$cour->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td width="80"><button style="background:none;border:none;" type="submit"><img width="35" height="35" src="{{ URL::asset('images/delete.png')}}" alt=""></button> </form></td>
                    </td>
                    @endif
                    <td><a href="{{url('rep/downloadFile/cours/'.$cour->id.'/TDs')}}" type="button" class="list-group-item-action btn btn-warning">TDs <span class="badge badge-secondary badge-pill">{{$cour->tds->count()}}</span></a></td>
                    <td><a href="{{url('rep/downloadFile/cours/'.$cour->id.'/TPs')}}" type="button" class="list-group-item-action btn btn-danger">TPs <span class="badge badge-secondary badge-pill">{{$cour->tps->count()}}</span></a></td>
                    @if(auth()->user()->is_represantant == 1)
                    <td >{{$cour->downloadCount}}</td>
                    @endif
                    </tr>
                    
                    @endforeach
                   
                    </tbody>
                    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endauth

@endsection