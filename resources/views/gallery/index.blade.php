@extends('layouts.template')

@section('title','Gallery')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gallery</h4>
                        <p class="card-subtitle">There is gallerys data</p>
                        <hr>
                        <table class="table table-bordered table-striped table-hover" id="example23">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Gallery Title</td>
                                    <td>Likes</td>
                                    <td>Views</td>
                                    <td>Created At</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $field)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $field['title'] }}</td>
                                    <td>{{ $field['likes'] }}</td>
                                    <td>{{ $field['views'] }}</td>
                                    <td>{{ $field['created_at'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('gallery/addmore/'.$field['id']) }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                        <a href="{{ url('gallery/detail/'.$field['id']) }}" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                        <a href="{{ url('gallery/delete/'.$field['id']) }}" class="btn btn-danger btnDelete btn-sm"><i class="fa fa-trash"></i></a>
                                        <a href="{{ url('like/'.$field['id']."/gallery") }}" class="btn btn-warning btn-sm"><i class="fa fa-heart"></i></a>
                                    </td>
                                    <script>
                                        $(document).ready(function(){
                                            $('.btnDelete').on('click', function(e){
                                                e.preventDefault();
                                                var href = $(this).attr('href');
                                                swal({
                                                    title: "U Sure ??",
                                                    text: "Permanently", 
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                })
                                                .then((willDelete) => {
                                                  if (willDelete) {
                                                    window.location.href = href;
                                                  }
                                                });
                                            });
                                        });
                                        </script>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop