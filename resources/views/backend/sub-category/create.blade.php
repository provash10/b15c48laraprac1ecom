@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create SubCategory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create SubCategory</li>
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
                                <h3 class="card-title">Add New SubCategory</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/sub-category/store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Select Category Name*</label>
                                        {{-- <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name*" required> --}}
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                            {{-- <option value="">Category1</option> --}}
                                            <option value="{{$category->id}}">{{$category->name}} </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Sub Category Name*</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Sub-Category Name*" required>
                                    </div>
                                    {{-- no need image --}}
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
