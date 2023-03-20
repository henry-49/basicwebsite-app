@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Page</h4>

                                <form  method="POST" action="{{ route('update.about') }}" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $aboutpage->id }}" />

                                    <div class="row mb-3">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="title" type="text" value="{{ $aboutpage->title }}" id="title">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                      <div class="row mb-3">
                                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="short_title" type="text" value="{{ $aboutpage->short_title }}" id="short_title">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="short_description" rows="5">{{ $aboutpage->short_description }}</textarea>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                                        <div class="col-sm-10">
                                             <textarea id="elm1" name="long_description">{{ $aboutpage->long_description }}</textarea>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="about_image" type="file"  id="about_image">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="ShowImage" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                             <img id="ShowImage" class="rounded avatar-lg"
                                             src="{{ (!empty($aboutpage->about_image))
                                                    ? url($aboutpage->about_image)
                                                    : url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page"/>

                                    <a class="btn btn-secondary waves-effect waves-light" href="{{ route('admin.profile') }}" class="text-muted">Cancle</a>

                                </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#about_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
               $('#ShowImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
