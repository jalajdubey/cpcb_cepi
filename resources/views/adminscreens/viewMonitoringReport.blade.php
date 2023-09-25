@extends('layouts.components.master')
@section('contents')
    <style>
        .butn {
            margin-left: 90%;
            background-color: #AC3E31;
            color: #fff !important;
            margin-top: -45px;
        }
    </style>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="margin-top: 16px;">
                    <div class="card-header">
                        <h4> {{ __('Upload CEPI Monitoring Report Carried Out By CPCB During The Year-2018') }}</h4>
                        <a class="butn btn" href="{{ route('home') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('uploadMonitoringReport') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="Role_User" value="1">
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>
                                <div class="col-md-6">
                                    <select name="state_id" id="state_id" class="form-control" required>
                                        <option value="" selected disabled>Please Select</option>
                                        @foreach ($data as $items)
                                            <option value="{{ $items->id }}">{{ $items->state_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                    @if ($errors->has('state_id'))
                                        <div class="error">{{ $errors->first('state_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Industrial Area (PIA)') }}</label>
                                <div class="col-md-6">
                                    <select name="pia_id" id="pia_id" class="form-control">

                                    </select>
                                    {{-- @error('pia_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    @if ($errors->has('pia_id'))
                                        <div class="error text-danger">#Name of PIA should not be blank!</div>
                                    @endif
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
                                    class="col-md-4 col-form-label text-md-end">{{ __('Monitoring Report') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('report') is-invalid @enderror"
                                        name="report" value="{{ old('report') }}" autocomplete="report">
                                    {{-- @error('report')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>
                                <div class="col-md-6">
                                    <textarea id="text" type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                                        value="{{ old('remark') }}" required autocomplete="remark"></textarea>
                                    {{-- @error('remark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn bbt">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#state_id').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: "{{route('fetchPiaList')}}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": categoryID
                        },
                        dataType: "json",
                        success: function(data) {

                            if (data) {
                                $('#pia_id').empty();
                                $('#pia_id').append('<option hidden>Select PIA</option>');
                                $.each(data, function(key, result) {
                                    $('select[name="pia_id"]').append(
                                        '<option value="' + result.id + '">' + result.PIAName + '</option>');
                                });
                            } else {
                                $('#pia_id').empty();

                            }
                        }
                    });
                } else {
                    $('#pia_id').empty();
                }
            });
        });
    </script>
@endsection
