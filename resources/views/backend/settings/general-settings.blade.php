@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {{-- <form action="" method=""> --}}
                {{-- <form action="{{url('/admin/update-order/{id}')}}" method=""> --}}
            {{-- <form action="{{url('/admin/update-order/'.$order->id)}}" method="POST" enctype="multipart/form-data"> --}}
            {{-- <form action="{{url('/admin/update-order/'.$order->id)}}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{url('/admin/general-setting/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            {{-- <h3 class="card-title">General</h3> --}}
                            <h3 class="card-title">Update Settings</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Phone</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="Mr. X" required> --}}
                                {{-- <input type="text" id="" name="phone" class="form-control" value="01710123456" required> --}}
                                 <input type="text" id="" name="phone" class="form-control" value="{{$generalSettings->phone}}" required>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Email</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="01710999" required> --}}
                                {{-- <input type="text" id="" name="email" class="form-control" value="abd12@gmail.com" required> --}}
                                <input type="text" id="" name="email" class="form-control" value="{{$generalSettings->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Address</label>
                                {{-- <textarea id="inputDescription" name="" class="form-control" rows="4" required>Mirpur, Dhaka.</textarea> --}}
                                {{-- <textarea id="inputDescription" name="address" class="form-control" rows="4" required>Hazaribag,Dhaka</textarea> --}}
                                <textarea id="inputDescription" name="address" class="form-control" rows="4" required>{{$generalSettings->address}}</textarea>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Facebook Link (Optional)</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                {{-- <input type="text" id="area" name="facebook" class="form-control" value="https:://facebook.com"> --}}
                                <input type="text" id="area" name="facebook" class="form-control" value="{{$generalSettings->facebook}}">
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Twitter (Optional)</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                {{-- <input type="text" id="area" name="twitter" class="form-control" value="https:://x.com"> --}}
                                <input type="text" id="area" name="twitter" class="form-control" value="{{$generalSettings->twitter}}">
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Instagram Link (Optional)</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                {{-- <input type="text" id="area" name="instagram" class="form-control" value="https:://instagram.com"> --}}
                                <input type="text" id="area" name="instagram" class="form-control" value="{{$generalSettings->instagram}}">
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Youtube Link (Optional)</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                {{-- <input type="text" id="area" name="youtube" class="form-control" value="https:://youtube.com"> --}}
                                <input type="text" id="area" name="youtube" class="form-control" value="{{$generalSettings->youtube}}">
                            </div>

                            {{-- logo image --}}
                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Logo </label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                <input type="file" id="area" name="logo" class="form-control"> <br>
                                {{-- <img src="https://picsum.photos/150/60"> --}}
                                <img src="{{asset('/backend/images/setting/'.$generalSettings->logo)}}" height="60" width="150">
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Banner </label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                <input type="file" id="area" name="banner" class="form-control"> <br>
                                {{-- <img src="https://picsum.photos/640/300"> --}}
                                <img src="{{asset('/backend/images/setting/'.$generalSettings->banner)}}" height="400" width="1200">
                            </div>

                             {{-- <input type="submit" value="Update Settings" class="btn btn-success float-right"> --}}
                              <input type="submit" value="Update Settings" class="btn btn-success">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
               
            </form>
                
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div> --}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


{{-- No Need this *****js couse of it is use in table  --}}
{{-- @push('script')
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush --}}
