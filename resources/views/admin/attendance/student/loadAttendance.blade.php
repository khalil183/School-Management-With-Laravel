<table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attendances as $key=> $item)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $item->date }}</td>

        <td>

            <a href="{{ url('admin/student-attendance/'.$item->date.'&'.$classId.'&'.$yearId.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
            <a href="" class="btn btn-danger disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>

        </td>

      </tr>
      @endforeach

    </tfoot>
  </table>
