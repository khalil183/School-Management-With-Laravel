@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Teacher Table</h3>
            <a href="{{ route('admin.teacher-registration.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Teacher Registration</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Id Card</th>
                        <th>Image</th>
                        <th>Salary</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($teachers as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->teacher_id}}</td>
                        <td>
                            <img src="{{ url($item->image) }}" width="50px" alt="">
                        </td>
                        <td>{{ $item->salary }} Tk</td>
                        <td>
                            <a href="{{ route('admin.fee-amount.edit',$item->id) }}" class="btn btn-primary disabled"><i class="fa fa-edit    "></i></a>
                            <a href="" class="btn btn-danger disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="modal" data-target="#modelId-{{ $item->teacher_id }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
<!-- Button trigger modal -->

@foreach ($teachers as $item)
    <!-- Modal -->
<div class="modal fade" id="modelId-{{ $item->teacher_id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                <div class="modal-header text-center">
                    <h2 class="modal-title">Khamar Para High School</h2>
                    <h4>Khanshama, Dinajpur</h4>

                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h3 class="text-center">Teacher Details</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Photo</td>
                            <td><img src="{{ url($item->image) }}" width="80px" alt=""></td>
                        </tr>
                        <tr>
                            <td>Teacher Name</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                         <tr>
                            <td>Teacher Id</td>
                            <td>{{ $item->teacher_id }}</td>
                        </tr>
                         <tr>
                            <td>Teacher Phone</td>
                            <td>{{ $item->phone }}</td>
                        </tr>
                         <tr>
                            <td>Teacher Email</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{ $item->designation->name }}</td>
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
                            <td>National Card</td>
                            <td>{{ $item->nid }}</td>
                        </tr>
                        <tr>
                            <td>Join Date</td>
                            <td>{{ $item->join_date }}</td>
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
