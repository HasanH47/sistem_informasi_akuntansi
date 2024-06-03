@extends('layouts.dashboard.app')

@section('title', 'Transaksi | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i> Data Transaksi
                </div>
                <a href="{{ route('dashboards.transactions.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Transaksi
                </a>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    @if ($transactions->isEmpty())
                        <span>Tidak ada data transaksi</span>
                    @else
                        <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Tanggal</th>
                                    <th>Akun</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                    <tr>
                                        {{-- <td>{{ $key + 1 }}</td> --}}
                                        <td>
                                            {{ $transaction->transaction_date }}
                                        </td>
                                        <td>{{ $transaction->account->account_code . '-' . $transaction->account->account_name }}
                                        </td>
                                        <td>
                                            {{ Str::limit($transaction->description, 100, '...') }}
                                        </td>
                                        <td>
                                            Rp{{ number_format($transaction->amount, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('dashboards.transactions.show', $transaction->id) }}"
                                                    class="btn btn-sm btn-info rounded-start me-1">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('dashboards.transactions.edit', $transaction->id) }}"
                                                    class="btn btn-sm btn-warning me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-sm btn-danger rounded-end delete-transaction"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-transaction-id="{{ $transaction->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus transaksi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-transaction');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const accountId = this.getAttribute('data-transaction-id');
                    const deleteUrl = "{{ route('dashboards.transactions.destroy', ':id') }}"
                        .replace(
                            ':id', accountId);
                    deleteForm.setAttribute('action', deleteUrl);
                });
            });
        });
    </script>
@endsection
