@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header card-header-clean text-center py-3 bg-white rounded-top-4">
                <h5 class="mb-0 fw-bold">Login Administrator</h5>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger p-2 small rounded-3 mb-3">{{ $errors->first() }}</div>
                @endif
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-secondary fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control py-2" placeholder="admin@gmail.com" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-secondary fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control py-2" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100 py-2 rounded-3 fw-semibold">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
