@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-0 animate-fade-in-up" role="alert">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                <div class="flex-grow-1">
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-0 animate-fade-in-up" role="alert">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                <div class="flex-grow-1">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show m-0 animate-fade-in-up" role="alert">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-circle-fill me-3 fs-4"></i>
                <div class="flex-grow-1">
                    <strong>Perhatian!</strong> {{ session('warning') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
@endif
