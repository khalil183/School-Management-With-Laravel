@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Subject Table</h3>
            <a href="{{ route('admin.assign-subject.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Assign subject</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($assignSubjects as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->book->name }}</td>
                        <td>{{ $item->studentClass->name }}</td>
                        <td>{{ $item->full_mark }}</td>
                        <td>{{ $item->pass_mark }}</td>
                        <td>
                            <a href="{{ route('admin.fee-amount.edit',$item->id) }}" class="btn btn-primary disabled"><i class="fa fa-edit    "></i></a>
                            <a href="" class="btn btn-danger disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
@endsection
