@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('lang.company_list') }}</h3>
                        <div class="box-tools">
                            <a class="btn btn-success pull-right" style="color: #FFFFFF"
                               href="{{ route('companies.create') }}"><i class="fa fa-plus"></i> {{ __('lang.add') }}
                            </a>
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
                                <th>{{ __('lang.name') }}</th>
                                <th>{{ __('lang.email') }}</th>
                                <th>{{ __('lang.website') }}e</th>
                                <th>{{ __('lang.Logo') }}</th>
                                <th>{{ __('lang.operations') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td><img src="/storage/{{$company->logo}}" width="50" alt=""></td>
                                    <td>
                                        <form id="del{{$company->id}}"
                                              action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button onclick="document.getElementById('del{{$company->id}}').submit();"
                                                class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <a class="btn btn-warning" href="{{ route('companies.edit', $company->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">
                                            {{ __('lang.not_found') }}
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
        var table = $('#example1').DataTable({
            responsive: false,
        })

        function changeSearchLabel(table, newLabel) {
            var input = $(table + "_filter > label > input").detach();
            $(table + "_filter > label").html(newLabel).append(input);
        }

        changeSearchLabel("#example1", "@lang('lang.search'):");
    </script>
@endsection