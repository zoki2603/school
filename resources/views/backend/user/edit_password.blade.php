@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
{{-- 
            <section class="content"> --}}

                <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Add User</h4>
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form  method="POST" action="{{ route('Password.Update1') }}">
                @csrf
                <div class="row">
                <div class="col-12">

            
                <div class="form-group">
                    <h5>Current Pssword<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="password"  id="current_password" name="oldpassword" class="form-control">
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                    <div class="form-group">
                        <h5>New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password"  id="password" name="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Confim Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
       

                <div class="text-xs-right">
                    <input type="submit" value="Update" class="btn btn-rounded btn-info md-5">
                </div>
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
@endsection