@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Multi Image All</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>About Multi Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach ($allMultiImage as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset($item->multi_image) }}" style="width: 60px; height: 50px;" /></td>
                            <td>
                                <a href="{{ route('edit.multi.image',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('delete.multi.image',$item->id) }}" class="btn btn-danger sm" id="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
                <!-- End Page-content -->

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
