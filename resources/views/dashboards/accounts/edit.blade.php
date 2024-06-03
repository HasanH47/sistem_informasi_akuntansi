@extends('layouts.dashboard.app')

@section('title', 'Edit Akun | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Edit Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboards.accounts.index') }}">Akun</a></li>
            <li class="breadcrumb-item active">Edit Akun {{ $account->account_name }}</li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Akun {{ $account->account_name }}</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboards.accounts.update', $account->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="namaAkun" class="form-label">Nama Akun</label>
                                    <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                        name="account_name" id="namaAkun"
                                        value="{{ old('account_name', $account->account_name) }}" placeholder="Nama Akun">
                                    @error('account_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tipeAkun" class="form-label">Tipe Akun</label>
                                    <select name="account_type"
                                        class="form-select @error('account_type') is-invalid @enderror" id="account_type">
                                        <option value="" disabled>Pilih tipe akun</option>
                                        <option value="asset"
                                            {{ old('account_type', $account->account_type) == 'asset' ? 'selected' : '' }}>
                                            Asset</option>
                                        <option value="liability"
                                            {{ old('account_type', $account->account_type) == 'liability' ? 'selected' : '' }}>
                                            Liability</option>
                                        <option value="equity"
                                            {{ old('account_type', $account->account_type) == 'equity' ? 'selected' : '' }}>
                                            Equity</option>
                                        <option value="income"
                                            {{ old('account_type', $account->account_type) == 'income' ? 'selected' : '' }}>
                                            Income</option>
                                        <option value="expense"
                                            {{ old('account_type', $account->account_type) == 'expense' ? 'selected' : '' }}>
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
                                        <option value="" disabled>Pilih subtipe</option>
                                    </select>
                                    @error('subtype')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsiAkun" class="form-label">Keterangan Akun</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                        rows="10">{{ old('description', $account->description) }}</textarea>
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

            const initialType = "{{ old('account_type', $account->account_type) }}";
            const initialSubtype = "{{ old('subtype', $account->subtype) }}";

            function updateSubtypeOptions(selectedType) {
                // Clear existing options except the first one (default option)
                subtypeElement.innerHTML = '<option value="" disabled>Pilih subtipe</option>';

                // Add new options based on the selected type
                if (selectedType === 'asset' || selectedType === 'liability') {
                    subtypes[selectedType].forEach(function(subtype) {
                        const option = new Option(subtype.text, subtype.value);
                        subtypeElement.add(option);
                    });
                    subtypeGroupElement.style.display = 'block';

                    // Set subtype value if available
                    if (initialSubtype && selectedType === initialType) {
                        subtypeElement.value = initialSubtype;
                    }
                } else {
                    subtypeGroupElement.style.display = 'none';
                }
            }

            accountTypeElement.addEventListener('change', function() {
                const selectedType = accountTypeElement.value;
                updateSubtypeOptions(selectedType);
            });

            // Set initial state based on existing data
            if (initialType) {
                accountTypeElement.value = initialType;
                updateSubtypeOptions(initialType);
            }
        });
    </script>
@endsection
