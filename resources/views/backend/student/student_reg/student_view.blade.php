@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
<section class="content">
<div class="row">
<div class="col-md-12">
    <div class="box bb-3 border-warning">
        <div class="box-header">
            <h4 class="box-title">Student <strong>Search</strong></h4>
            </div>

            <div class="box-body">
                <form action="{{ route('student.class.year.wice') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Year</h5>
                                <div class="controls">
                                    <select name="year_id" required="" class="form-control" >
                                        <option value="" selected disabled>Select Year</option>
                                        @foreach ($years as $year)
                                            <option 
                                            value="{{ $year->id }}" {{ (@$year_id ==  $year->id)?'selected':"" }}>{{ $year->name }}
                                                
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Class</h5>
                                <div class="controls">
                                    <select name="class_id"   required="" class="form-control" >
                                        <option value="" selected disabled>Select Class</option>
                                        @foreach ($classes as $class)
                                            <option
                                                value="{{ $class->id }}" {{ (@$class_id ==  $class->id)?'selected':"" }}>{{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top: 25px;">
                            <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search" >
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
    
    <div class="col-12">
    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Student list</h3>
        <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">

                @if (!@search)
                    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%"> SL</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Class</th>
                        <th>Image</th>
                        @if(Auth::user()->role =="Admin")
                        <th>Code</th>
                        @endif                        
                        <th width="25%">Actioin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key=>$valeu)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $valeu['student']['name'] }}</td>
                        <td>{{ $valeu['student']['id_no'] }}</td>
                        <td>{{ $valeu->roll }}</td>
                        <td>{{ $valeu['student_year']['name'] }}</td>
                        <td>{{ $valeu['student_class']['name'] }}</td>
                        <td> <img  src="{{ (!empty($valeu['student']['image'])) ? url('upload/student_images/'.$valeu['student']['image']) : url('upload/no_image.jpg') }}"
                            style="width: 100px;hight: 100px;border:1px solid black;" alt="">
                        </td>
                        <td></td>
                        <td>
                            <a title="edit" href="{{ route('student.registration.edit', $valeu->student_id) }}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                            <a title="promotion" href="{{ route('student.registration.promotion', $valeu->student_id) }}" class="btn btn-warning" ><i class="fa fa-check"></i></a>
                            <a target="_blank" title="details" href="{{ route('details.student.registration', $valeu->student_id) }}" class="btn btn-primary" ><i class="fa fa-eye"></i></a>

                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            @else

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">SL</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Class</th>
                        <th>Image</th>
                        @if(Auth::user()->role =="Admin")
                        <th>Code</th>
                        @endif                        
                        <th width="25%">Actioin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key=>$valeu)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $valeu['student']['name'] }}</td>
                        <td>{{ $valeu['student']['id_no'] }}</td>
                        <td>{{ $valeu->roll }}</td>
                        <td>{{ $valeu['student_year']['name'] }}</td>
                        <td>{{ $valeu['student_class']['name'] }}</td>
                        <td> <img  src="{{ (!empty($valeu['student']['image'])) ? url('upload/student_images/'.$valeu['student']['image']) : url('upload/no_image.jpg') }}"
                            style="width: 100px;hight: 100px;border:1px solid black;" alt="">
                        </td>
                        <td></td>
                        <td>
                            <a title="edit" href="{{ route('student.registration.edit', $valeu->student_id) }}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                            <a title="promotion" href="{{ route('student.registration.promotion', $valeu->student_id) }}" class="btn btn-warning" ><i class="fa fa-check"></i></a>
                            <a target="_blank" title="details" href="{{ route('details.student.registration', $valeu->student_id) }}" class="btn btn-primary" ><i class="fa fa-eye"></i></a>

                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            @endif
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