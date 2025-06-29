<script>
    // Image Preview and Upload
    document.addEventListener('DOMContentLoaded', function() {
        initializeImageUpload();
        initializeFormValidation();
        initializeAutoResize();
        initializeCharacterCounter();
        initializeTotalTimeCalculation();
        initializeAutoSave();
    });
    
    function initializeImageUpload() {
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (!imageInput) return;
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showToast('Ukuran file terlalu besar. Maksimal 2MB.', 'warning');
                    this.value = '';
                    return;
                }
                
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    showToast('File harus berupa gambar.', 'warning');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('d-none');
            }
        });
        
        // Drag and drop functionality
        const uploadWrapper = document.querySelector('.image-upload-wrapper');
        if (uploadWrapper) {
            uploadWrapper.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            
            uploadWrapper.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
            });
            
            uploadWrapper.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    imageInput.files = files;
                    imageInput.dispatchEvent(new Event('change'));
                }
            });
        }
    }
    
    function removeImage() {
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('imagePreview');
        
        if (imageInput) imageInput.value = '';
        if (preview) preview.classList.add('d-none');
    }
    
    function initializeFormValidation() {
        const forms = document.getElementsByClassName('needs-validation');
        
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Show toast for validation errors
                    showToast('Mohon lengkapi semua field yang wajib diisi', 'warning');
                    
                    // Scroll to first invalid field
                    const firstInvalid = form.querySelector('.is-invalid, :invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'center' 
                        });
                        firstInvalid.focus();
                    }
                } else {
                    // Add loading state to submit button
                    const submitBtn = form.querySelector('.submit-btn');
                    if (submitBtn) {
                        const originalHtml = submitBtn.innerHTML;
                        submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Menyimpan...';
                        submitBtn.disabled = true;
                    }
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    }
    
    function initializeAutoResize() {
        document.querySelectorAll('textarea').forEach(textarea => {
            // Auto-resize on input
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
            
            // Initial resize
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    }
    
    function initializeCharacterCounter() {
        const titleInput = document.getElementById('title');
        const titleCounter = document.getElementById('titleCounter');
        
        if (!titleInput || !titleCounter) return;
        
        function updateCounter() {
            const remaining = 255 - titleInput.value.length;
            titleCounter.textContent = `${remaining} karakter tersisa`;
            
            if (remaining < 20) {
                titleCounter.className = 'form-text text-end text-warning';
            } else {
                titleCounter.className = 'form-text text-end text-muted';
            }
        }
        
        titleInput.addEventListener('input', updateCounter);
        
        // Initialize counter
        updateCounter();
    }
    
    function initializeTotalTimeCalculation() {
        const prepTimeInput = document.getElementById('prep_time');
        const cookTimeInput = document.getElementById('cook_time');
        const totalTimeDisplay = document.getElementById('totalTime');
        
        if (!prepTimeInput || !cookTimeInput || !totalTimeDisplay) return;
        
        function updateTotalTime() {
            const prepTime = parseInt(prepTimeInput.value) || 0;
            const cookTime = parseInt(cookTimeInput.value) || 0;
            const total = prepTime + cookTime;
            totalTimeDisplay.textContent = `${total} menit`;
        }
        
        prepTimeInput.addEventListener('input', updateTotalTime);
        cookTimeInput.addEventListener('input', updateTotalTime);
        
        // Initialize total time
        updateTotalTime();
    }
    
    function initializeAutoSave() {
        let autoSaveTimer;
        let hasUnsavedChanges = false;
        
        function autoSave() {
            clearTimeout(autoSaveTimer);
            hasUnsavedChanges = true;
            
            autoSaveTimer = setTimeout(() => {
                // Here you could implement actual auto-save functionality
                console.log('Auto-saving draft...');
                // You could send an AJAX request to save draft
            }, 30000); // Save every 30 seconds
        }
        
        // Trigger auto-save on input
        document.querySelectorAll('input, textarea, select').forEach(element => {
            element.addEventListener('input', autoSave);
            element.addEventListener('change', autoSave);
        });
        
        // Warn user about unsaved changes
        window.addEventListener('beforeunload', function(e) {
            if (hasUnsavedChanges) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
        
        // Clear unsaved changes flag on form submit
        document.querySelector('.recipe-form')?.addEventListener('submit', function() {
            hasUnsavedChanges = false;
        });
    }
    
    // Add CSS for drag and drop states
    const additionalStyles = `
        .image-upload-wrapper.dragover {
            border-color: var(--light-green);
            background: var(--green-50);
            transform: scale(1.02);
        }
        
        [data-theme="dark"] .image-upload-wrapper.dragover {
            background: var(--bg-tertiary);
        }
        
        .spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .form-control:invalid,
        .form-select:invalid {
            border-color: #dc3545;
        }
        
        .was-validated .form-control:valid,
        .was-validated .form-select:valid {
            border-color: var(--light-green);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='m2.3 6.73.94-.94 1.44 1.44L7.4 4.5l.94.94L4.66 9.2z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    `;
    
    // Add styles to head
    const styleSheet = document.createElement('style');
    styleSheet.textContent = additionalStyles;
    document.head.appendChild(styleSheet);
</script>
    