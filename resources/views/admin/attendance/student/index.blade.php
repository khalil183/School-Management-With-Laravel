@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Student Attendance History</h3>
            <a href="{{ route('admin.student-attendance.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Take Attendance</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.mark.store') }}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select year</option>
                                    @foreach ($years as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <button type="button" onclick="searchStudent()" class="btn btn-success">Search Attendance</button>

            </div><!-- /.box-body -->

            <div class="box-body" id="loadStudentView">

            </div>
        </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>

    function searchStudent(){
        var yearId=$("#year").val();
        var classId=$("#class").val();
        var date=$("#date").val();

        if(!yearId){
            toastr.error('Year Field is Required!')
            return;
        }
        if(!classId){
            toastr.error('Class Field is Required!')
            return;
        }


        var url="{{ route('admin.search.attendance') }}";
        var queryString= "?yearId="+yearId+"&classId="+classId;
        $.get(url+queryString, function (response) {
            $("#loadStudentView").html(response)
        });



    }
</script>
@endsection
