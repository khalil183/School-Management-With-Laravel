@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Student Attendance Update</h3>
            <a href="{{ route('admin.student-attendance.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Attendance History</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.student-attendance.update',$date) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Student Id</th>
                            <th>Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $key=> $item)
                            <tr>
                                <td>{{ $item->student->name }}</td>
                                <td>{{ $item->student->phone }}</td>
                                <td><img src="{{ url($item->student->photo) }}" width="50px" alt=""></td>
                                <td>{{ $item->student->student_id }}</td>
                                <td>
                                    <input type="radio" name="attendance[{{ $item->id }}]" value="1" {{ $item->attendance==1 ?'checked' : '' }}>Present
                                    <input type="radio" name="attendance[{{ $item->id }}]" value="0" {{ $item->attendance==0 ?'checked' : '' }}>Absance

                                    <input type="hidden" name="id[]" value="{{ $item->id }}">
                                    {{-- <input type="hidden" name="classId" value="{{ $classId }}">
                                    <input type="hidden" name="yearId" value="{{ $yearId }}">
                                    <input type="hidden" name="date" value="{{ $date }}"> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button class="btn btn-success" type="submit">Update Attendance</button>
            </form>
            </div><!-- /.box-body -->




        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection
