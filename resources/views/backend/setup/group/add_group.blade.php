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
        <h4 class="box-title">Add Student Group</h4>
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form  method="POST" action="{{ route('student.store.group') }}">
                @csrf
                <div class="row">
                <div class="col-12">

                    <div class="form-group">
                        <h5>Student Group Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name"  class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                <div class="text-xs-right">
                    <input type="submit" value="Submit" class="btn btn-rounded btn-info md-5">
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