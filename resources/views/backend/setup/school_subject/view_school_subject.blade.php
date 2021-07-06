@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
<section class="content">
<div class="row">
    <div class="col-12">
    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">School Subject list</h3>
        <a href="{{ route('school.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add School Subject</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Actioin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key=>$fee)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $fee->name }}</td>
                        <td>
                            <a href="{{ route('school.subject.edit', $fee->id) }}" class="btn btn-info" >Edit</a>
                            <a href="{{ route('school.subject.delete', $fee->id) }}" class="btn btn-danger" id="delete" >Delete</a>

                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
    
    </div>
</div>
@endsection