@extends('layouts.app2')

@section('content')
<div class="container w-100 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">le choix de module</div>
                    <div class="card-body row justify-content-center ">
<div class="row">
<div class="col-12">
<table class="tabtable table-hoverle text-center">
  <thead>
    <tr>
      <th scope="col"><a href="#" class="list-group-item list-group-item-action active rounded">
nom du module
</a></th>
      <th scope="col"><a href="#" class="list-group-item list-group-item-action active rounded">
nom de professeur
</a></th>
    </tr>
  </thead>
  <tbody>
  @foreach($modules as $module)
    <tr>

 
   {{session()->put('moduleID',$module->id)}} 

      <td><a href="{{url('rep/downloadFile/modules/'.$module->id)}}" class="list-group-item list-group-item-action">
{{$module->libelle}}
</a>


</td>
      <td>@foreach ($module->enseignants as $prof)
{{$prof->nom}}


@endforeach</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
                   
     {{-- 

<div class="list-group col-md-8 row d-flex justify-content-center">
<a href="#" class="list-group-item list-group-item-action active">
nom du module
</a>
@foreach($modules as $module)
<a href="{{url('rep/downloadFile/modules/'.$module->id)}}" class="list-group-item list-group-item-action">
{{$module->libelle}}
</a>
@endforeach
</div>
<div class="list-group col-md-4 row d-flex justify-content-center">
<a href="#" class="list-group-item list-group-item-action active">
nom de professeur
</a>
@foreach($modules as $module)
<a href="#" class="list-group-item list-group-item-action">

@foreach ($module->enseignants as $prof)
{{$prof->nom}}


@endforeach

</a>
@endforeach
</div>
--}}
</div>
</div>
</div>
</div>
</div>
</div>

@endsection



