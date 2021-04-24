@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Search Student Marksheet</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.search.marksheet') }}" target="_blank" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select name="year" id="year" class="form-control" required>
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
                                <select name="class" id="class" class="form-control" required>
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exam">Exam</label>
                                <select name="exam" id="exam" class="form-control" required>
                                   <option value="">Select Exam</option>
                                   @foreach ($exams as $item)
                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_id">Student Id</label>
                                <input type="text" name="student_id" id="student_id" class="form-control" required>
                            </div>
                        </div>





                    </div>

                    <button type="submit" class="btn btn-success">Search Student Marksheet</button>

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
@endsection
