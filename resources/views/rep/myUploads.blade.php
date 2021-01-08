@extends('layouts.app2')

@section('content')
<div class="container w-100 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">les fichiers imortés</div>
                    <div class="card-body row justify-content-center ">
                   
                   

                    <div class="list-group col-md-10 text-center">
                    <table classe="table">
                    <thead>
                    <tr>
                    <th scope="col">   <a href="#" class="list-group-item list-group-item-action active">  titre  </a></th>
 

                    <th><a href="#" class="list-group-item list-group-item-action active">    Date d'imortation  </a></th>
                    <th><a href="#" class="list-group-item list-group-item-action active">    Type  </a></th>
                    <th><a href="#" class="list-group-item list-group-item-action active">    Action  </a></th>
                    <th><a href="#" class="list-group-item list-group-item-action active"> Nombre de telechargement  </a></th>
   
                         
                    </tr>
                    </thead>
                    <tbody>
                   
                    @foreach($cours as $cour)
                    <tr>
                    <td>  <a href="#" class="list-group-item list-group-item-action">   {{$cour->titre}}   </a></td>
                    <td ><a href="{{url('rep/downloadFile/cours/'.$cour->id)}}" type="button" class="list-group-item-action btn btn-info">Cours</a></td>
                    <td><a href="{{url('rep/downloadFile/cours/'.$cour->id.'/TDs')}}" type="button" class="list-group-item-action btn btn-warning">TDs <span class="badge badge-secondary badge-pill">{{$cour->tds->count()}}</span></a></td>
                    <td><a href="{{url('rep/downloadFile/cours/'.$cour->id.'/TPs')}}" type="button" class="list-group-item-action btn btn-danger">TPs <span class="badge badge-secondary badge-pill">{{$cour->tps->count()}}</span></a></td>
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

@endsection