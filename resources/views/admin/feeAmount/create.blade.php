@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Fee Amount Form</h3>
            <a href="{{ route('admin.fee-amount.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Fee Amount List</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.fee-amount.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Fee Category Name</label>
                        <select name="fee_category" id="fee_category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($feeCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class Name</label>
                        <select name="class" id="class" class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($classes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select name="year" id="year" class="form-control">
                            <option value="">Select Year</option>
                            @foreach ($years as $item)
                                <option value="{{ $item->id }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input name="amount" id="amount" type="number" class="form-control" placeholder="100" value="{{ old('amount') }}">
                    </div>


                    <button type="submit" class="btn btn-success">Add New</button>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
