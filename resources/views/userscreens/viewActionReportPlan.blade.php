@extends('layouts.components.master')
@section('contents')
<style>
.butn {
    margin-left: 90%;
    background-color: #AC3E31;
    color: #fff !important;
    margin-top: -45px;
}

.ui-datepicker-calendar {
    display: none;
}
</style>
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 16px;">
                <div class="card-header">
                    <h4> {{ __('Upload Action Report') }}</h4>
                    <a class="butn btn" href="{{ route('home') }}">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('uploadMonitoringReport')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="Role_User" value="3">
                        <input type="hidden" name="pia_id" value="{{$PIAId->id}}">
                        <input type="hidden" name="user_id" value="{{$PIAId->user_id}}">
                        <?php $years = range(2020, strftime("%Y", time())); ?>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Financial Year') }}</label>
                            <div class="col-md-6">
                                <select name="financial_year"
                                    class="form-control @error('financial_year') is-invalid @enderror">
                                    <option>Select Year</option>
                                    <?php foreach($years as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                @error('financial_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Month') }}</label>
                            <div class="col-md-6">
                                <select id="month" name="months"
                                    class="form-control @error('month') is-invalid @enderror">
                                    <option value="" selected disabled>Please Select</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <!-- <input type="month" class="form-control @error('month') is-invalid @enderror"
                                    name="months" value="{{ old('month') }}" required autocomplete="month"> -->
                                @error('month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Report Type') }}</label>
                            <div class="col-md-6">
                                <select name="monsoon" class="form-control">
                                    <option value="" selected disabled>Please Select</option>
                                    <option value="Pre-Monsoon">Pre-Monsoon</option>
                                    <option value="Post-Monsoon">Post-Monsoon</option>
                                </select>
                                @error('monsoon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('EPI Air') }}</label>
                            <div class="col-md-6">
                                <input id="epi_air" type="number" class="form-control " name="epi_air" value={{old('epi_air')}}
                                    autocomplete="EPI_Air" placeholder="EPI Air"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6" />
                                {{-- @error('epi_air')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @if ($errors->has('epi_air'))
                                    <div class="error text-danger">#EPI Air should not be blank!</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('EPI Water') }}</label>
                            <div class="col-md-6">
                                <input id="epi_water" type="number" class="form-control " name="epi_water"
                                    value={{old('epi_water')}} required="" autocomplete="EPI_Water" placeholder="EPI Water"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6" />
                                {{-- @error('epi_water')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @if ($errors->has('epi_water'))
                                    <div class="error text-danger">#EPI Water should not be blank!</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('EPI Land') }}</label>
                            <div class="col-md-6">
                                <input id="epi_land" type="number" class="form-control " name="epi_land"
                                    value={{old('epi_land')}} required="" autocomplete="EPI_Land" placeholder="EPI Land"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6" />
                                {{-- @error('epi_land')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @if ($errors->has('epi_land'))
                                    <div class="error text-danger">#EPI Land should not be blank!</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('CEPI Score') }}</label>
                            <div class="col-md-6">
                                <input id="epi_land" type="number" class="form-control " name="epi_land"
                                    value={{old('epi_land')}} required="" autocomplete="EPI_Land" placeholder="CEPI Score"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6" />
                                {{-- @error('epi_land')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @if ($errors->has('epi_land'))
                                    <div class="error text-danger">#EPI Land should not be blank!</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Upload File') }}</label>
                            <div class="col-md-6">
                                <input id="text" type="file"
                                    class="form-control @error('report_file') is-invalid @enderror" name="report_file"
                                    value="{{ old('report_file') }}" required autocomplete="report_file" />
                                @error('report_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Reasons for the decrease in CEPI Score') }}</label>
                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                                        value="{{ old('remark') }}" required autocomplete="remark"></textarea>
                                @error('report_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bbt">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $("#datepicker").datepicker({
        dateFormat: 'yy'
    });
});​
</script>
@endsection