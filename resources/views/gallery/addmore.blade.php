@extends('layouts.template')

@section('title','Add Gallery')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add More Image</h4>

                        <form action="{{ url('gallery/moreupdates/'.$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Gallery Title</label>
                                <input type="text" class="form-control" name="gallery_title" value="{{ $data->gallery_title }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Gallery Image</label>
                                <input type="file" class="form-control" multiple name="images[]">
                            </div>
                            <button class="btn btn-info">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop