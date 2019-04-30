@extends('layouts.template')

@section('title',$gallery->gallery_title)

@section('content')
    <div class="container">
        <div class="row">
            @foreach($data as $field)
            <div class="col-md-4">
            <div class="card">
                <img class="card-img-top img-responsive" src="{{ asset('images/gallery/'.$field->image_name) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('gallery/imagedelete/'.$field->id) }}" class="btn btn-danger btn-block btnDelete">Delete image</a>
                </div>
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
            </div>
            </div>
            @endforeach
        </div>
    </div>
@stop