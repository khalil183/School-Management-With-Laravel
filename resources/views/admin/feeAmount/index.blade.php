@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Fee Amount Table</h3>
            <a href="{{ route('admin.fee-amount.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Fee Amount</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Exam</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($feeAmounts as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->feeCategory->name }}</td>
                        <td>{{ @$item->studentClass->name }}</td>
                        <td>{{ $item->year->year }}</td>
                        <td>{{ $item->amount }} Tk</td>
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
