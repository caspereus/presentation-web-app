@extends('layouts.template')

@section('title','Add Gallery')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Gallery</h4>

                        <form action="{{ url('gallery/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Gallery Title</label>
                                <input type="text" class="form-control" name="gallery_title">
                            </div>
                            <div class="form-group">
                                <label for="">Gallery Image</label>
                                <input type="file" class="form-control" multiple name="images[]">
                            </div>
                            <button class="btn btn-info">Save Gallery</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop