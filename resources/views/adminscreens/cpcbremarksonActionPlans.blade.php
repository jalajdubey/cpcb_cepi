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
                        <h4> {{ __('Comments / Remarks By CPCB On Action Plan') }}</h4>
                        <a class="butn btn" href="{{ route('home') }}">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('createcpcb_remarkon_actionplan') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="Role_User" value="1">
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>
                                <div class="col-md-7">
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
                                <div class="col-md-7">
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
                                    class="col-md-4 col-form-label text-md-end">{{ __('Letter') }}</label>
                                <div class="col-md-7">
                                    <input type="file" class="form-control @error('remarkletter') is-invalid @enderror"
                                        name="remarkletter" value="{{ request()->input('remarkletter') }}" autocomplete="remarkletter">
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
                                <div class="col-md-7">
                                    <textarea id="text" type="text" class="form-control @error('remark') is-invalid @enderror" name="remark" rows="6" cols="50"
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
                                    <button type="submit" class="btn bbt btn-lg">
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
                        url: '/getPiaList/',
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
