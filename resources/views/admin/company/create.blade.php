@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('lang.company_create') }}</h3>
                        <div class="box-tools">
                            <a class="btn btn-primary pull-right" style="color: #FFFFFF"
                               href="{{ route('companies.index') }}"><i class="fa fa-backward"></i> {{ __('lang.back') }}</a>
                        </div>
                    </div><!-- /.box-header -->
                    @isset($errors)
                    <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endisset
                    <form role="form" action="{{ route('companies.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <!-- text input -->
                            <div class="form-group">
                                <label>{{ __('lang.name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('lang.email') }}</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('lang.website') }}</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('lang.logo') }}</label>
                                <input type="file" class="form-control" name="logo">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> {{ __('lang.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
