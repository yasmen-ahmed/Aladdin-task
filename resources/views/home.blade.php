@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to our Tasks Managment System') }}
                    <br>
                    <br>

                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Go to Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
