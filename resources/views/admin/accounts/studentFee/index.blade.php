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
                <form action="{{ route('admin.student-fee.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="fee_category">Fee Category Name</label>
                        <select name="fee_category" id="fee_category" class="form-control" onchange="loadAmount()">
                            <option value="">Select Category</option>
                            @foreach ($feeCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="class">Class Name</label>
                        <select name="class" id="class" class="form-control" disabled onchange="loadAmount()">
                            <option value="">Select Class</option>
                            @foreach ($classes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select name="year" id="year" class="form-control" disabled onchange="loadAmount()">
                            <option value="">Select Year</option>
                            @foreach ($years as $item)
                                <option value="{{ $item->id }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="month">Month</label>
                        <select name="month" id="month" class="form-control" disabled>
                            <option value="">Select Month</option>
                            @foreach ($months as $item)
                                <option value="{{ $item->id }}">{{ $item->month }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="student">Student</label>
                        <select name="student" id="student" class="form-control select2" disabled>
                            <option value="">Select Student</option>
                        </select>
                    </div>

                    <div class="form-group d-none" >
                        <label for="amount">Amount</label>
                        <input name="amount" id="amount" type="number" class="form-control" placeholder="0" value="{{ old('amount') }}" readonly>
                    </div>


                    <button type="submit" id="payment_button" class="btn btn-success" disabled>Payment</button>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    function loadAmount(){
        var feeCategoryId=$("#fee_category").val();
        var classId=$("#class").val();
        if(feeCategoryId){
            $("#class").attr("disabled", false);
        }
        if(classId){
            $("#year").attr("disabled", false);
        }
        var yearId=$("#year").val();
        if(yearId){
            $("#month").attr("disabled", false);
            $.ajax({
                url: "{{ url('admin/fee-amount-search') }}",
                data:{feeCategoryId,classId,yearId},
                type: 'GET',
                success: function(res) {
                    $("#amount").val(res.amount.amount)
                    $("#student").html(res.student)
                    $("#student").attr("disabled", false);
                    $("#payment_button").attr("disabled", false);

                }
            });
        }
    }
</script>

@endsection
