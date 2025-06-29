@extends('layouts.app')

@section('title', 'Kelola Resep')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Resep</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
        </a>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" 
                           value="{{ request('search') }}" placeholder="Cari resep...">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.recipes') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Recipes Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Resep</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recipes as $recipe)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" 
                                         class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <div class="fw-bold">{{ Str::limit($recipe->title, 40) }}</div>
                                        <small class="text-muted">{{ $recipe->difficulty }} • {{ $recipe->total_time }} menit</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $recipe->user->name }}</td>
                            <td>{{ $recipe->category->name }}</td>
                            <td>
                                @switch($recipe->status)
                                    @case('pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                        @break
                                    @case('approved')
                                        <span class="badge bg-success">Disetujui</span>
                                        @break
                                    @case('rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">Draft</span>
                                @endswitch
                            </td>
                            <td>{{ $recipe->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @if($recipe->status === 'pending')
                                        <form method="POST" action="{{ route('admin.recipes.approve', $recipe) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui resep ini?')">
                                                <i class="bi bi-check"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="showRejectModal({{ $recipe->id }}, '{{ $recipe->title }}')">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <p class="text-muted mt-2">Tidak ada resep ditemukan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $recipes->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Resep</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Berikan alasan penolakan untuk resep: <strong id="recipeTitle"></strong></p>
                    <textarea name="admin_notes" class="form-control" rows="4" 
                              placeholder="Tuliskan alasan penolakan..." required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Resep</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showRejectModal(recipeId, recipeTitle) {
    document.getElementById('recipeTitle').textContent = recipeTitle;
    document.getElementById('rejectForm').action = `/admin/recipes/${recipeId}/reject`;
    new bootstrap.Modal(document.getElementById('rejectModal')).show();
}
</script>
@endpush
