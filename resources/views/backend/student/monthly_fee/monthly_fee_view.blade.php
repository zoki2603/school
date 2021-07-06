@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">
<section class="content">
<div class="row">
<div class="col-md-12">
    <div class="box bb-3 border-warning">
        <div class="box-header">
            <h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
            </div>

            <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Year</h5>
                                <div class="controls">
                                    <select name="year_id"  id="year_id" required="" class="form-control" >
                                        <option value="" selected disabled>Select Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Class</h5>
                                <div class="controls">
                                    <select name="class_id" id="class_id"  required="" class="form-control" >
                                        <option value="" selected disabled>Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Month</h5>
                                <div class="controls">
                                    <select name="month" id="month"  required="" class="form-control" >
                                        <option value="" selected disabled>Select Month</option>
                                        <option value="Januar">Januar</option>
                                        <option value="Februar">Februar</option>
                                        <option value="Mart">Mart</option>
                                        <option value="April">April</option>
                                        <option value="Maj">Maj</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Avgust">Avgust</option>
                                        <option value="Septembar">Septembar</option>
                                        <option value="Oktobar">Oktobar</option>
                                        <option value="Novembar">Novembar</option>
                                        <option value="Decembar">Decembar</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 25px;">
                            <a id="search" class="btn btn-rounded btn-primary" name="search" >Search</a>
                        </div>
                    </div>
{{-- ////////////////////// Role Generate Table /////////////////// --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div id="DocumentResults">
                                <script id="document-template" type="text/x-handlebars-template">
                                <table class="table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>
                                        @{{/each}}
                                    </tbody>
                                </table>
                                </script>
                            </div>
                        </div> 
                    </div>
            </div>
    </div>
</div>
    
</div>
<!-- /.row -->
</section>
<!-- /.content -->
    
    </div>
</div>


<script type="text/javascript">
    $(document).on('click','#search',function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var month = $('#month').val();
        $.ajax({
        url: "{{ route('student.monthly.fee.classwise.get')}}",
        type: "get",
        data: {'year_id':year_id,'class_id':class_id,'month':month},
        beforeSend: function() {       
        },
        success: function (data) {
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var html = template(data);
            $('#DocumentResults').html(html);
            $('[data-toggle="tooltip"]').tooltip();
        }
        });
    });
</script>
@endsection