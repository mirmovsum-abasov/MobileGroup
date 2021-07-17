@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employee Edit</h3>
                        <div class="box-tools">
                            <a class="btn btn-primary pull-right" style="color: #FFFFFF"
                               href="{{ route('employees.index') }}"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div><!-- /.box-header -->
                    @if(count($errors) > 0)
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form role="form" action="{{ route('employees.update', $employee->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Company</label>
                                <select class="form-control" name="company_id">
                                    <option value=""></option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}"
                                                @if(old('company_id', $employee->company_id) == $company->id) selected @endif>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter ..."
                                       value="{{ old('name', $employee->name) }}">
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" class="form-control" name="surname" placeholder="Enter ..."
                                       value="{{ old('surname', $employee->surname) }}">
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter ..."
                                       value="{{ old('email', $employee->email) }}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter ..."
                                       value="{{ old('phone', $employee->phone) }}">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
