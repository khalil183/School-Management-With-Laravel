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
                <div class="row text-center">
                    <div class="col-md-4"><h4>Exam: {{ $students[0]->marks[0]->exam->name }}</h4></div>
                    <div class="col-md-4"><h4>Year: {{ $students[0]->year->year }}</h4></div>
                    <div class="col-md-4"><h4>Date: {{ date('M-F-Y') }}</h4></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Student Name</th>
                                    <th>Id Card</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    <th>Total Mark</th>
                                </tr>
                            </thead>
                            <form action="{{ route('admin.promote.class') }}" method="POST">
                                @csrf
                            <tbody>
                                @foreach ($students as $key=> $student)
                                    @php
                                        $gpa=0.0;
                                        $faild=false;
                                    @endphp
                                    @foreach ($student->marks as  $mark)
                                        @foreach ($grades as $grade)
                                            @if ($mark->mark >= $grade->start_mark && $mark->mark <= $grade->end_mark)
                                                @php
                                                    $gpa += $grade->start_point;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($mark->mark<33)
                                            @php
                                                $faild=true;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $student->student->name }}</td>
                                        <td>{{ $student->student->student_id }}</td>
                                        <td>{{ $student->studentClass->name }}</td>
                                        <td>{{ $student->year->year }}</td>
                                        <td>{{ $student->marks->sum('mark')  }}</td>
                                        <input type="hidden" name="student_id[]" value="{{ $student->student->id }}">
                                        <input type="hidden" name="mark[]" value="{{ $student->marks->sum('mark')  }}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">Promote Student</button>
                    </div>

                </div>
            </form>

            </div>


        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
