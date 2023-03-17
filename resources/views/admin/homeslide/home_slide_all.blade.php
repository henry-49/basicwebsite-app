@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>

                                <form  method="POST" action="{{ route('home.slide') }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row mb-3">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="title" type="text" value="{{ $homeslide->title }}" id="title">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                      <div class="row mb-3">
                                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="short_title" type="text" value="{{ $homeslide->short_title }}" id="short_title">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="video_url" type="text" value="{{ $homeslide->video_url }}" id="video_url">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="home_slide" class="col-sm-2 col-form-label">Home Slide Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="home_slide" type="file"  id="home_slide">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="ShowImage" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                             <img id="ShowImage" class="rounded avatar-lg"
                                             src="{{ (!empty($homeslide->home_slide))
                                                    ? url('upload/home_slide_images/'.$homeslide->home_slide)
                                                    : url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide"/>

                                    <a class="btn btn-info waves-effect waves-light" href="{{ route('admin.profile') }}" class="text-muted">Cancle</a>

                                </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#home_slide').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
               $('#ShowImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
