@extends('layouts.default')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('lang.dashboard') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    {{ $companies }}
                                </h3>
                                <p>
                                    {{ __('lang.companies') }}
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-building-o"></i>
                            </div>
                            <a href="{{ route('companies.index') }}" class="small-box-footer">
                                {{ __('lang.more_info') }} <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    {{ $employees }}
                                </h3>
                                <p>
                                    {{ __('lang.employees') }}
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ route('employees.index') }}" class="small-box-footer">
                                {{ __('lang.more_info') }} <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
