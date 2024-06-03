@extends('layouts.dashboard.app')

@section('title', 'Jurnal | Sistem Informasi Akuntansi')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Daftar Jurnal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jurnal</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table mr-1"></i> Data Jurnal
                </div>
                <a href="{{ route('dashboards.journals.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Jurnal
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
                    @if ($journalEntries->isEmpty())
                        <span>Tidak ada data jurnal</span>
                    @else
                        <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Tanggal</th>
                                    <th>Akun</th>
                                    <th>Keterangan</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalDebit = 0;
                                    $totalKredit = 0;
                                @endphp
                                @foreach ($journalEntries as $key => $journal)
                                    @php
                                        $totalDebit += $journal->debit;
                                        $totalKredit += $journal->credit;
                                    @endphp
                                    <tr>
                                        {{-- <td>{{ $key + 1 }}</td> --}}
                                        <td>
                                            {{ $journal->entry_date }}
                                        </td>
                                        <td>{{ $journal->account->account_code . '-' . $journal->account->account_name }}
                                        </td>
                                        <td>
                                            {{ Str::limit($journal->transaction->description, 100, '...') }}
                                        </td>
                                        <td>
                                            Rp{{ $journal->credit ? number_format($journal->debit, 2, ',', '.') : 0 }}
                                        </td>
                                        <td>
                                            Rp{{ $journal->credit ? number_format($journal->credit, 2, ',', '.') : 0 }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('dashboards.journals.show', $journal->id) }}"
                                                    class="btn btn-sm btn-info me-1">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger delete-journal"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-transaction-id="{{ $journal->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>Rp{{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                                    <td><strong>Rp{{ number_format($totalKredit, 2, ',', '.') }}</strong></td>
                                    <td></td>
                                </tr>
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
                    Apakah Anda yakin ingin menghapus jurnal ini?
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
            const deleteButtons = document.querySelectorAll('.delete-journal');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const accountId = this.getAttribute('data-transaction-id');
                    const deleteUrl = "{{ route('dashboards.journals.destroy', ':id') }}"
                        .replace(
                            ':id', accountId);
                    deleteForm.setAttribute('action', deleteUrl);
                });
            });
        });
    </script>
@endsection
