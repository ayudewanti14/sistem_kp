<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 800px;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Profil Saya</h4>
            <p class="text-muted small">Kelola informasi kontak dan data kepala desa.</p>
        </div>
        <a href="<?php echo e(route('ambulan.dashboard')); ?>" class="btn btn-light border shadow-sm rounded-pill">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center h-100">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px; font-size: 2.5rem;">
                        <i class="fa-solid fa-user-nurse"></i>
                    </div>
                    <h5 class="fw-bold text-dark"><?php echo e($user->name); ?></h5>
                    <span class="badge bg-primary rounded-pill px-3">Driver Ambulan</span>
                    
                    <hr class="my-3 opacity-25">
                    
                    <div class="text-start small text-muted">
                        <div class="mb-2"><i class="fa-solid fa-envelope me-2"></i> <?php echo e($user->email); ?></div>
                        <div><i class="fa-solid fa-calendar me-2"></i> Bergabung: <?php echo e($user->created_at->format('d M Y')); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h6 class="fw-bold mb-0 text-primary"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Informasi</h6>
                </div>
                <div class="card-body p-4">
                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success border-0 shadow-sm mb-4">
                            <i class="fa-solid fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('ambulan.profil.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark small">DATA PRIBADI (BISA DIEDIT)</label>
                            
                            <div class="mb-3">
                                <label class="form-label small text-muted">Nama Lengkap Supir</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" required>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Nomor HP / WhatsApp</label>
                                    <input type="number" name="no_hp" class="form-control" value="<?php echo e($user->no_hp); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Nama Kepala Desa</label>
                                    <input type="text" name="nama_kepala_desa" class="form-control border-primary" value="<?php echo e($user->nama_kepala_desa); ?>" placeholder="Masukkan Nama Kades...">
                                </div>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-10">

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark small"><i class="fa-solid fa-lock me-1"></i> DATA WILAYAH & ARMADA (READ ONLY)</label>
                            <div class="alert alert-light border small text-muted mb-3">
                                <i class="fa-solid fa-circle-info me-1"></i> Data di bawah ini hanya bisa diubah oleh Admin Dinas Kesehatan.
                            </div>

                            <div class="row g-3">
                                <div class="col-12 mb-2">
                                    <label class="form-label small text-muted fw-bold">Nomor Polisi (NOPOL) Kendaraan</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-car-side text-muted"></i></span>
                                        <input type="text" class="form-control bg-light text-muted fw-bold border-start-0 text-uppercase" style="letter-spacing: 1px;" value="<?php echo e($user->nopol ?? 'BELUM DIATUR ADMIN'); ?>" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Kabupaten / Kota</label>
                                    <input type="text" class="form-control bg-light" value="<?php echo e($user->kabupaten); ?>" readonly disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Kecamatan</label>
                                    <input type="text" class="form-control bg-light" value="<?php echo e($user->kecamatan); ?>" readonly disabled>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small text-muted">Unit Kerja / Desa</label>
                                    <input type="text" class="form-control bg-light fw-bold" value="<?php echo e($user->unit_kerja); ?>" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold rounded-pill">
                                SIMPAN PERUBAHAN
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_bootstrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kpdinkes\resources\views/ambulan_profil.blade.php ENDPATH**/ ?>