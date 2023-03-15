@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile Page</h4>

                                <form  method="POST" action="{{ route('register') }}">

                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="name" type="text" value="{{ $editData->name }}" id="name">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                      <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="email" type="email" value="{{ $editData->email }}" id="email">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="username" type="text" value="{{ $editData->username }}" id="username">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="profile_image" type="file"  id="profile_image">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                     <div class="row mb-3">
                                        <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                             <img class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile"/>

                                    <a class="btn btn-info waves-effect waves-light" href="{{ route('admin.profile') }}" class="text-muted">Cancle</a>

                                </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

    </div>
</div>

@endsection