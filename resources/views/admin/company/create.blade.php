@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Company Create</h3>
                        <div class="box-tools">
                            <a class="btn btn-primary pull-right" style="color: #FFFFFF"
                               href="{{ route('companies.index') }}"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div><!-- /.box-header -->
                    @if(count($errors) > 0)
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form role="form" action="{{ route('companies.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter ..." value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter ..." value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Web Site</label>
                                <input type="text" class="form-control" name="website" placeholder="Enter ..." value="{{ old('website') }}">
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" name="logo">
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
