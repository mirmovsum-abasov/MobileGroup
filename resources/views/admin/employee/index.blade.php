@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employee List</h3>
                        <div class="box-tools">
                            <a class="btn btn-success pull-right" style="color: #FFFFFF"
                               href="{{ route('employees.create') }}"><i class="fa fa-plus"></i> ADD</a>
                        </div>
                    </div><!-- /.box-header -->
                    @if(\Session::has('message'))
                        <div class="alert alert-success"> {{ \Session::get('message') }}</div>
                    @endif
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>E-Mail</th>
                                <th>Phone</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->surname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        <form id="del{{$employee->id}}"
                                              action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button onclick="document.getElementById('del{{$employee->id}}').submit();"
                                                class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        <a class="btn btn-warning"
                                           href="{{ route('employees.edit', $employee->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">
                                            Not Found
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var table = $('#example1').DataTable();
    </script>
@endsection