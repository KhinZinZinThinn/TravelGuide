@extends('layouts.app')
@section('title') View More...
@stop
@section('content')
    <div class="container mb-5" style="margin-top: 70px">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @foreach($ups as $up)
                    <div class="card mt-2 shadow">
                        <div class="card-header">
                            <h3 class="text-dark d-inline">  {{$up->location_name}} </h3> <h5 class="text-secondary d-inline"> ( {{$up->category->cat_name}} )</h5>

                            <a href="{{route('delete.post',['id'=>$up->id])}}" class="btn btn-outline-danger text-right"><i class="fa fa-trash"></i> </a>

                        </div>
                        <div class="card-body">
                            <img src="{{route('location.image',['img_name'=>$up->image])}}" class="img-thumbnail"><br>
                            {{$up->location_detail}}
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Post by...{{$up->user->name}}</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    {{$up->created_at->diffForHumans()}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection