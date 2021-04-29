@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Recieve Fee Form</h3>
            {{-- <a href="{{ route('admin.fee-amount.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Fee Amount List</a> --}}
            </div><!-- /.box-header -->
            <div class="box-body fee-form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.teacher-payment.store') }}" method="POST" >
                    @csrf

                    <div class="form-group">
                        <label for="teacher">Teacher</label>
                        <select name="teacher" id="teacher" class="form-control select2" onchange="loadSalary()">
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $item)
                            <option value="{{ $item->id }}">{{ $item->name."-(".$item->teacher_id.")" }}</option>
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
                        <label for="month">Month</label>
                        <select name="month" id="month" class="form-control">
                            <option value="">Select Month</option>
                            @foreach ($months as $item)
                                <option value="{{ $item->id }}">{{ $item->month }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-none" >
                        <label for="salary">Salary</label>
                        <input name="salary" id="salary" type="number" class="form-control" placeholder="0" readonly>
                    </div>


                    <button type="submit" id="payment_button" class="btn btn-success">Payment</button>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    function loadSalary(){
        var teacherId=$("#teacher").val();
            $.ajax({
                url: "{{ url('admin/search-teacher-salary') }}",
                data:{teacherId},
                type: 'GET',
                success: function(res) {
                    $("#salary").val(res)


                }
            });

    }
</script>

@endsection
