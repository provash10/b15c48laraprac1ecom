@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form action="{{url('/admin/category/update/'.$category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Category Name*</label>
                                        <input type="text" class="form-control" value="{{$category->name}}" name="name" id="name" placeholder="Enter Category Name*" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputFile">Category Image*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                                
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>

                                        {{-- add a image link --}}
                                        <img src="{{asset('backend/images/category/'.$category->image)}}" class="mt-3" height="100" weight="100">

                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('script')
    <!-- Page specific script -->
<script>
    $(function () {
    //   bsCustomFileInput.init();
        // input file ar id >>>image
         image.init();
    });
    </script>
@endpush
