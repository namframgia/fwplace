@extends('admin.layout.master')

@section('title', __('Work Schedule'))

@section('module', __('Number of Employees'))

@section('content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-section">
            <div class="m-section__content">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-map-location"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                {{ $location->name }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">

                    {!! Form::open(['class' => 'row mb-3', 'method' => 'GET']) !!}
                        <div class="col-md-4 offset-md-6">
                            {!! Form::select('program_id', $programs, request('program_id'), ['class' => 'form-control m-input m-input--square', 'id' => 'program']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::submit(__('Apply'), ['class' => 'btn btn-brand w-100']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                    <div class="my-5 text-right">
                        <span class="btn m-btn--pill btn-primary"></span> @lang('Total morning employees')
                        <span class="btn m-btn--pill btn-warning ml-5"></span> @lang('Total afternoon employees')
                        <span class="btn m-btn--pill btn-info ml-5"></span> @lang('Total Seat')
                    </div>
                    <div id="loading" class="text-center">
                        {!! Html::image(asset(config('site.static') . 'loading.gif'), null) !!}
                    </div>
                    <div id="m_calendar" data-url="{{ route('calendar.location.get_data', ['id' => $location->id]) }}"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/location.js') }}"></script>
@endsection
