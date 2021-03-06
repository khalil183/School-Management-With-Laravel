@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Student Table</h3>
            <a href="{{ route('admin.student-registration.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Student Registration</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Student Id</th>
                        <th>Image</th>
                        <th>Admission Session</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($students as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->student_id }}</td>
                        <td>
                            <img src="{{ url($item->photo) }}" alt="" width="50px">
                        </td>
                        <td>{{ date('Y',strtotime($item->created_at)) }} - {{ date('Y',strtotime($item->created_at))+1 }}</td>

                        <td>
                            <a href="{{ route('admin.fee-amount.edit',$item->id) }}" class="btn btn-primary disabled"><i class="fa fa-edit    "></i></a>
                            <a href="" class="btn btn-danger disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="modal" data-target="#modelId-{{ $item->student_id }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>

                      </tr>
                      @endforeach

                    </tfoot>
                  </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@foreach ($students as $item)
    <!-- Modal -->
<div class="modal fade" id="modelId-{{ $item->student_id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header text-center">
                    <h2 class="modal-title">Khamar Para High School</h2>
                    <h4>Khanshama, Dinajpur</h4>

                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h3 class="text-center">Registration Card</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Photo</td>
                            <td><img src="{{ url($item->photo) }}" width="80px" alt=""></td>
                        </tr>
                        <tr>
                            <td>Student Name</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                         <tr>
                            <td>Student Id</td>
                            <td>{{ $item->student_id }}</td>
                        </tr>
                         <tr>
                            <td>Student Phone</td>
                            <td>{{ $item->phone }}</td>
                        </tr>
                         <tr>
                            <td>Student Email</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                         <tr>
                            <td>Father Name</td>
                            <td>{{ $item->father_name }}</td>
                        </tr>
                         <tr>
                            <td>Mother Name</td>
                            <td>{{ $item->mother_name }}</td>
                        </tr>
                         <tr>
                            <td>Gender</td>
                            <td>{{ $item->gender }}</td>
                        </tr>
                         <tr>
                            <td>Date Of Birth</td>
                            <td>{{ $item->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Birth Certificate</td>
                            <td>{{ $item->birth_reg_code }}</td>
                        </tr>

                        <tr>
                            <td>Admission Session</td>
                            <td>{{ date('Y',strtotime($item->created_at)) }} - {{ date('Y',strtotime($item->created_at))+1 }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $item->address }}</td>
                        </tr>



                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
