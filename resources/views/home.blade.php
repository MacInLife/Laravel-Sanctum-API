@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    You are logged in!
                </div>
            </div>
            <div class="card">
                <div class="card-header">Create personal acess token</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('token.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="abilities[]" value="view"
                                id="abilities[view]">
                            <label class="form-check-label" for="abilities[view]">
                                View repositories
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="create" name="abilities[]"
                                id="abilities[create]">
                            <label class="form-check-label" for="abilities[create]">
                                Create repositories
                            </label>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create personal access token') }}
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
    return fetch(
            'http://localhost:8000/repository',
            // headers: {
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json'
            // }
        ) //requete vers l'API
        .then(response => {
            return response;
        }).then(response => {
            console.log(response.json())
            return response.json()
        }).catch(err => {
            console.log('An error occured', err);
        });

</script>
@endsection
