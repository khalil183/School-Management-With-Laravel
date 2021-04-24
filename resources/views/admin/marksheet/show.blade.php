@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <h1 class="display-2 text-center">Khamar Para High School</h1>
                <h4 class="text-center">Khansama,Dinajpur</h4>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <td>Student Id Card</td>
                                <td>{{ $student->student_id }}</td>
                            </tr>
                            <tr>
                                <td>Total Mark</td>
                                <td>
                                    {{ $totalMark }}
                                </td>
                            </tr>
                            <tr>
                                <td>Result</td>
                                <td>
                                    @if ($faild==1)
                                        Faild
                                    @else
                                        Passed
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>GPA</td>
                                <td>
                                    @if ($faild==1)
                                        0.00
                                    @else
                                    {{ $gpa }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Class</td>
                                <td>{{ $marks[0]->studentClass->name }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{ $marks[0]->year->year }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Letter Grade</th>
                                    <th>Mark</th>
                                    <th>Grade Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $item)
                                    <tr>
                                        <td>{{ $item->grade }}</td>
                                        <td>{{ $item->start_mark."-".$item->end_mark }}</td>
                                        <td>{{ sprintf('%.2f',$item->start_point)."-".sprintf('%.2f',$item->end_point) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Subject</th>
                                    <th>Full Mark</th>
                                    <th>Get Mark</th>
                                    <th>Grade Point</th>
                                    <th>Letter Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marks as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->assignSubject->book->name }}</td>
                                    <td>{{ $item->assignSubject->full_mark }}</td>
                                    <td>{{ $item->mark }}</td>
                                    <td>
                                        @foreach ($grades as $grade)
                                        @if ($item->mark >= $grade->start_mark &&  $item->mark <= $grade->end_mark)
                                            {{ sprintf('%.2f',$grade->start_point)  }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        @foreach ($grades as $grade)
                                            @if ($item->mark >= $grade->start_mark &&  $item->mark <= $grade->end_mark)
                                                {{ $grade->grade }}
                                            @endif
                                        @endforeach

                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
{{--
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
</script> --}}
@endsection
