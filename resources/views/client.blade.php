@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (isset($updateResult) && $updateResult)
                    <div class="card-header" style="color: green">Client data successfully updated !!!</div>
                @else
                    <div class="card-header">Update client data</div>
                @endif

                <div class="card-body">
                    @if (isset($client))
                        <form method="POST" action="{{$client->id}}">
                            @csrf

                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $client->surname }}"  autocomplete="surname">

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $client->date_of_birth }}"  autocomplete="date_of_birth">

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $client->phone_number }}"  autocomplete="surname">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $client->country }}"  autocomplete="surname">

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $client->address }}"  autocomplete="surname">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="trading_account_number" class="col-md-4 col-form-label text-md-right">{{ __('Trading account number') }}</label>

                                <div class="col-md-6">
                                    <input id="trading_account_number" type="text" class="form-control @error('trading_account_number') is-invalid @enderror" name="trading_account_number" value="{{ $client->trading_account_number }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Balance account') }}</label>

                                <div class="col-md-6">
                                    <input id="balance" type="text" class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ $client->balance / 100 }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="open_trades" class="col-md-4 col-form-label text-md-right">{{ __('Open trades') }}</label>

                                <div class="col-md-6">
                                    <input id="open_trades" type="text" class="form-control @error('open_trades') is-invalid @enderror" name="open_trades" value="{{ $client->open_trades }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="close_trades" class="col-md-4 col-form-label text-md-right">{{ __('Close trades') }}</label>

                                <div class="col-md-6">
                                    <input id="close_trades" type="text" class="form-control @error('close_trades') is-invalid @enderror" name="close_trades" value="{{ $client->close_trades }}" disabled>
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
