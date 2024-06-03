@extends('layouts.dashboard.app')

@section('title', 'Tambah Akun | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.accounts.index') }}">Akun</a></li>
            <li class="breadcrumb-item active">Tambah Akun</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Akun</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboards.accounts.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="namaAkun" class="form-label">Nama Akun</label>
                                    <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                        name="account_name" id="namaAkun" value="{{ old('account_name') }}"
                                        placeholder="Nama Akun">
                                    @error('account_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tipeAkun" class="form-label">Tipe Akun</label>
                                    <select name="account_type"
                                        class="form-select @error('account_type') is-invalid @enderror" id="account_type">
                                        <option value="" disabled selected>Pilih tipe akun</option>
                                        <option value="asset" {{ old('account_type') == 'asset' ? 'selected' : '' }}>Asset
                                        </option>
                                        <option value="liability"
                                            {{ old('account_type') == 'liability' ? 'selected' : '' }}>Liability</option>
                                        <option value="equity" {{ old('account_type') == 'equity' ? 'selected' : '' }}>
                                            Equity</option>
                                        <option value="revenue" {{ old('account_type') == 'revenue' ? 'selected' : '' }}>
                                            Revenue</option>
                                        <option value="expense" {{ old('account_type') == 'expense' ? 'selected' : '' }}>
                                            Expense</option>
                                    </select>
                                    @error('account_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3" id="subtype-group" style="display: none;">
                                    <label for="subtipeAkun" class="form-label">Subtipe Akun</label>
                                    <select name="subtype" class="form-select @error('subtype') is-invalid @enderror"
                                        id="subtype">
                                        <option value="" disabled selected>Pilih subtipe</option>
                                    </select>
                                    @error('subtype')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsiAkun" class="form-label">Keterangan Akun</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                        rows="10">{{ old('description') }}</textarea>
                                    @error('description')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accountTypeElement = document.getElementById('account_type');
            const subtypeGroupElement = document.getElementById('subtype-group');
            const subtypeElement = document.getElementById('subtype');

            const subtypes = {
                'asset': [{
                        value: 'Activa Lancar',
                        text: 'Activa Lancar'
                    },
                    {
                        value: 'Activa Tetap',
                        text: 'Activa Tetap'
                    }
                ],
                'liability': [{
                        value: 'Hutang Lancar',
                        text: 'Hutang Lancar'
                    },
                    {
                        value: 'Hutang Jangka Panjang',
                        text: 'Hutang Jangka Panjang'
                    }
                ],
                'other': []
            };

            accountTypeElement.addEventListener('change', function() {
                const selectedType = accountTypeElement.value;

                // Clear existing options
                while (subtypeElement.options.length > 1) {
                    subtypeElement.remove(1);
                }

                // Add new options based on the selected type
                if (selectedType === 'asset' || selectedType === 'liability') {
                    subtypes[selectedType].forEach(function(subtype) {
                        const option = new Option(subtype.text, subtype.value);
                        subtypeElement.add(option);
                    });
                    subtypeGroupElement.style.display = 'block';
                } else {
                    subtypeGroupElement.style.display = 'none';
                }
            });

            // Trigger change event to set initial state
            accountTypeElement.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
