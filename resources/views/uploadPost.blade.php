@extends('layouts.app')
@section('title') Post Upload
@stop
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                @if(Session('info')) <div class="alert alert-success">{{Session('info')}}</div> @endif
                <div class="card">
                    <div class="card-header">Upload New Post</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{route('new.uploadDetail')}}">
                            <div class="form-group">
                                <label for="location_name">Location Name</label>
                                <input type="text" name="location_name" id="location_name" class="form-control @if($errors->has('location_name'))is-invalid @endif">
                                @if($errors->has('location_name'))<span class="invalid-feedback">{{$errors->first('location_name')  }} </span> @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Picture</label>
                                <input type="file" name="image" id="image" class="form-control @if($errors->has('image'))is-invalid @endif" >
                                @if($errors->has('image')) <span class="invalid-feedback">{{$errors->first('image')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="location_detail">Detail about location</label>
                                <textarea name="location_detail" id="location_detail" class="form-control @if($errors->has('location_detail'))is-invalid @endif"></textarea>
                                @if($errors->has('location_detail'))<span class="invalid-feedback">{{$errors->first('location_detail')  }} </span> @endif
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="custom-select @if($errors->has('category_id'))is-invalid @endif">
                                    @if($errors->has('category_id'))<span class="invalid-feedback">{{$errors->first('category_id')  }} </span> @endif
                                    <option valuprimarye="">Select Category</option>
                                    @foreach($cats as $cat)  //from getCategory
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                            </div>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
    <div class="col-md-4">
        @if(Session('alert')) <div class="alert alert-success">{{Session('alert')}}</div> @endif
        <div class="card shadow">
            <div class="card-header"><i class="fas fa-plus"></i> New Category</div>
            <div class="card-body">
                <form method="post" action="{{route('new.category')}}">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control @if ($errors->has('cat_name')) is-invalid @endif">
                        @if ($errors->has('cat_name'))<span class="invalid-feedback">{{$errors->first('cat_name')}}</span> @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

            @if(Session('info')) <div class="alert alert-success">{{Session('info')}}</div> @endif
            <div class="card shadow">
                <div class="card-header"> <i class="fas fa-list-alt"></i> Categories</div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Category Name</td>
                            <td>Created Date</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($cats as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->cat_name}}</td>
                                <td>{{$cat->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#e{{$cat->id}}"><i class="fa fa-edit"></i> </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="e{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="{{route('update.category')}}">
                                                    <input type="hidden" name="id" value="{{$cat->id}}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$cat->cat_name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="cat_name">Category Name</label>
                                                            <input value="{{$cat->cat_name}}" type="text" name="cat_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('remove.category',['id'=>$cat->id])}}" class="text-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$cats->links()}}

                </div>
            </div>

    </div>
        </div>
    </div>
    @endsection