@extends('layouts.app2')

@section('content')

<div class="container w-100 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">le choix de TD</div>
                    <div class="card-body row justify-content-center ">
                    <div class="list-group col-md-10 row d-flex text-center">
                   <table classe="table">
                   <thead>
                   <th><a href="#" class="list-group-item list-group-item-action active">
N° de TD
  </a></th>
                   <th width="40"><a href="#" class="list-group-item list-group-item-action active">
énoncé
  </a></th>
                   <th width="40"><a href="#" class="list-group-item list-group-item-action active">
                   Corrigé
  </a></th>
                   </thead>
                   <tbody>
                   @foreach($tds as $td)
                  
                   <tr>
                   <td> 
  <a href="#" class="list-group-item list-group-item-action">
    {{$td->numero}}
  </a>                            
</td>
                   <td>
                   @if(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_ennonce')!='images/fichier/empty.png')
                   <a  href="{{url('rep/downloadFile/tdsE/'.$td->id)}}"><img width="45" height="45" src="{{URL::asset(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_ennonce'))}}" alt="enonce"></a>
                    @else
                    <img width="45" height="45" src="{{URL::asset(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_ennonce'))}}" alt="enonce">
                   @endif
                   </td>
                  <td>
                  @if(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_correction')!='images/fichier/empty.png')

                  <a href="{{url('rep/downloadFile/tdsC/'.$td->id)}}"><img width="45" height="45" src="{{URL::asset(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_correction'))}}" alt="correction"></a></td>
                  @else 
                  <img width="45" height="45" src="{{URL::asset(\App\Http\Controllers\downloadFileController::imagePathTD($td,'lien_correction'))}}" alt="correction">
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

@endsection