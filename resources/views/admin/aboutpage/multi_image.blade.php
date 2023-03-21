@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Multi Page</h4> <br> <br>

                                <form  method="POST" action="{{ route('store.multi.image') }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row mb-3">
                                        <label for="multi_image" class="col-sm-2 col-form-label">About Multi Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="multi_image[]" type="file"  id="multi_image" multiple>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="ShowImage" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                             <img id="ShowImage" class="rounded avatar-lg"
                                             src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image"/>

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
        $('#multi_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
               $('#ShowImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
