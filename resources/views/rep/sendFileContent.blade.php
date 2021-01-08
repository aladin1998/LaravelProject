@extends('layouts.app2')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">Dashboard</div>
                <div class="card-body">
               
                <div class="container">
                    <div class="row mx-auto" >
                        <div class="col col-md-4 rounded ">
                        <a href="{{Route('rep.sendFileCour')}}" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/upload.png')}}" alt=""><br/>
                     Cour
                        </a>
                        
                       
                    </div>
                    <div class="col col-md-4 rounded ">
                        <a href="{{Route('rep.sendFileTD')}}" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/upload.png')}}" alt=""><br/>
                     TD
                        </a>
                        
                    </div>
                    <div class="col col-md-4 rounded ">
                        <a href="{{Route('rep.sendFileTP')}}" class="btn border border-success">
                        <img width="50" height="50" src="{{ URL::asset('images/upload.png')}}" alt=""><br/>
                     TP
                        </a>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>                
@endsection