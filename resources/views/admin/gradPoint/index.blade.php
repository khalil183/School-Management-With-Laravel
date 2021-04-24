@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Grad Point Table</h3>
            <a href="{{ route('admin.grad-point.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Grad Point</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Start Point</th>
                        <th>End Point</th>
                        <th>Start Mark</th>
                        <th>End Mark</th>
                        <th>Grade Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($points as $key => $item)
                      <tr>
                        <td>{{ ++ $key }}</td>
                        <td>{{ sprintf('%.2f',$item->start_point)  }}</td>
                        <td>{{ sprintf('%.2f',$item->end_point)  }}</td>
                         <td>{{ $item->start_mark }}</td>
                        <td>{{ $item->end_mark }}</td>
                        <td>{{ $item->grade }}</td>

                        <td>
                            <a href="{{ route('admin.exam.edit',$item->id) }}" class="btn btn-primary disabled"><i class="fa fa-edit    "></i></a>
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
