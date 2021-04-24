@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Marks Entry Form</h3>
            <a href="{{ route('admin.mark.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Mark List</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.mark.store') }}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="form-control" onchange="loadSubject()">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="class">Subject</label>
                                <select name="subject" id="subject" class="form-control">
                                   <option value="">Select Subject</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exam">Exam</label>
                                <select name="exam" id="exam" class="form-control">
                                   <option value="">Select Exam</option>
                                   @foreach ($exams as $item)
                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>



                    </div>

                    <button type="button" onclick="searchStudent()" class="btn btn-success">Search Student</button>

            </div><!-- /.box-body -->

            <div class="box-body" id="loadStudentView">

            </div>
        </form>



        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    function loadSubject(){
        var id=$("#class").val();
        $.ajax({
            type:"GET",
            url: "{{url('/admin/class-by-subject/')}}"+"/"+id,
            success:function(response){
                $("#subject").html(response)

            }
        })

    }

    function searchStudent(){
        var yearId=$("#year").val();
        var classId=$("#class").val();
        var subjectId=$("#subject").val();
        var examId=$("#exam").val();

        if(!yearId){
            toastr.error('Year Field is Required!')
            return;
        }
        if(!classId){
            toastr.error('Class Field is Required!')
            return;
        }
        if(!subjectId){
            toastr.error('Subject Field is Required!')
            return;
        }
        if(!examId){
            toastr.error('Exam Field is Required!')
            return;
        }



        var url="{{ route('admin.search.student') }}";
        var queryString= "?yearId="+yearId+"&classId="+classId+"&subjectId="+subjectId+"&examId="+examId;
        $.get(url+queryString, function (response) {
            $("#loadStudentView").html(response)
        });



    }
</script>
@endsection
