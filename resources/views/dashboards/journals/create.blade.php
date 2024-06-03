@extends('layouts.dashboard.app')

@section('title', 'Tambah Jurnal | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Jurnal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.journals.index') }}">Jurnal</a></li>
            <li class="breadcrumb-item active">Tambah Jurnal</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Jurnal</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboards.transactions.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="akun" class="form-label">Akun</label>
                                    <select name="account" class="form-select @error('account') is-invalid @enderror"
                                        id="subtype">
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->account_code }} -
                                                {{ $account->account_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('account')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
