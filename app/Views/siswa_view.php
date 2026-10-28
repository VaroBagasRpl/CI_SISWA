<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa XI RPL | Sistem Administrasi</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CDN CSS Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --app-font: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --primary-color: #2563eb;
            --bg-page: #f8fafc;
            --border-color: #e2e8f0;
            --text-heading: #0f172a;
        }

        body {
            font-family: var(--app-font);
            background-color: var(--bg-page);
            color: var(--text-heading);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Bersih Sederhana */
        .app-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-color);
        }

        /* Stat Card Ringkas & Rapi */
        .stat-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.1rem 1.25rem;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        /* Tabel Utama yang Rapi & Terstruktur */
        .main-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .table-custom {
            margin-bottom: 0;
            width: 100%;
        }

        .table-custom thead th {
            background-color: #f1f5f9;
            color: #334155;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 0.85rem 0.75rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .table-custom tbody tr {
            height: 52px;
            transition: background-color 0.12s ease;
        }

        .table-custom tbody tr:hover {
            background-color: #f8fafc;
        }

        .table-custom td {
            padding: 0.65rem 0.75rem;
            color: #1e293b;
            font-size: 0.875rem;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        /* Inisial Avatar */
        .avatar-initial {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #e0e7ff;
            color: #3730a3;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        /* Badge Kelas */
        .badge-kelas {
            background-color: #f1f5f9;
            color: #1e293b;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            display: inline-block;
        }

        /* Tombol Aksi - Selaras dengan Tema Website (Simple & Elegan) */
        .btn-action {
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            transition: all 0.15s ease;
        }

        /* Tambah: Biru sesuai tema website */
        .btn-action-tambah {
            background-color: var(--primary-color);
            border: 1px solid var(--primary-color);
            color: #ffffff;
        }
        .btn-action-tambah:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
        }

        /* Edit: Netral Slate yang bersih */
        .btn-action-edit {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            color: #475569;
        }
        .btn-action-edit:hover {
            background-color: #f1f5f9;
            border-color: #94a3b8;
            color: #0f172a;
        }

        /* Hapus: Aksen merah lembut yang tidak mencolok */
        .btn-action-hapus {
            background-color: #ffffff;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
        .btn-action-hapus:hover {
            background-color: #fee2e2;
            border-color: #f87171;
            color: #b91c1c;
        }

        /* Modal Sederhana & Bersih */
        .modal-content {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 1.25rem;
        }

        .modal-footer {
            border-top: 1px solid #f1f5f9;
            padding: 0.85rem 1.25rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.55rem 0.85rem;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        /* Pagination Clean */
        .pagination .page-link {
            border-radius: 6px;
            margin: 0 2px;
            color: #334155;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border: 1px solid #cbd5e1;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #ffffff;
        }

        .pagination .page-item.disabled .page-link {
            color: #94a3b8;
            background-color: #f8fafc;
            border-color: #e2e8f0;
        }

        /* Search input styling */
        .search-wrapper {
            position: relative;
            max-width: 300px;
            width: 100%;
        }

        .search-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .search-wrapper input {
            padding-left: 36px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- 1. Navbar Sederhana (Hanya Judul & Branding) -->
    <nav class="app-navbar py-3 sticky-top">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-primary text-white me-3" style="width: 38px; height: 38px; font-size: 1.1rem; border-radius: 8px;">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark" style="letter-spacing: -0.01em;">SIAKAD XI RPL</h5>
                    <small class="text-muted" style="font-size: 0.78rem;">Sistem Manajemen Data Siswa</small>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. Container Utama -->
    <main class="container my-4 flex-grow-1">

        <!-- Stat Row Ringkas -->
        <?php
            $totalSiswa = !empty($siswa) ? count($siswa) : 0;
            $kelasSet = [];
            if (!empty($siswa)) {
                foreach ($siswa as $item) {
                    if (!empty($item['kelas'])) {
                        $kelasSet[$item['kelas']] = true;
                    }
                }
            }
            $totalKelas = count($kelasSet);
        ?>
        <div class="row g-3 mb-4">
            <!-- Stat 1: Total Siswa -->
            <div class="col-12 col-md-4">
                <div class="stat-card d-flex align-items-center gap-3">
                    <div class="stat-icon bg-primary-subtle text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Total Siswa</div>
                        <div class="fs-4 fw-bold mb-0 text-dark" id="statTotalSiswa"><?= $totalSiswa; ?></div>
                    </div>
                </div>
            </div>

            <!-- Stat 2: Jumlah Rombel/Kelas -->
            <div class="col-12 col-md-4">
                <div class="stat-card d-flex align-items-center gap-3">
                    <div class="stat-icon bg-info-subtle text-info">
                        <i class="bi bi-collection-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Jumlah Rombel/Kelas</div>
                        <div class="fs-4 fw-bold mb-0 text-dark"><?= $totalKelas > 0 ? $totalKelas : '1'; ?></div>
                    </div>
                </div>
            </div>

            <!-- Stat 3: Informasi Penting (Program Keahlian RPL) -->
            <div class="col-12 col-md-4">
                <div class="stat-card d-flex align-items-center gap-3">
                    <div class="stat-icon bg-success-subtle text-success">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Program Keahlian</div>
                        <div class="fs-6 fw-bold mb-0 text-dark">Rekayasa Perangkat Lunak</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Siswa -->
        <div class="main-card">
            <!-- Header Kartu -->
            <div class="p-3 border-bottom bg-white d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
                <div>
                    <h6 class="fw-bold mb-0 text-dark">Daftar Data Siswa</h6>
                    <small class="text-muted" id="dataCountText">
                        Menampilkan 10 siswa per halaman &bull; Total <?= $totalSiswa; ?> siswa
                    </small>
                </div>

                <!-- Search Input Rapi -->
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari NIS, nama, atau kelas...">
                </div>
            </div>

            <!-- Area Tabel Rapi & Terstruktur -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-custom align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 13%;">NIS</th>
                            <th class="text-start" style="width: 32%;">Nama Lengkap</th>
                            <th class="text-center" style="width: 18%;">Kelas</th>
                            <th class="text-center" style="width: 32%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="siswaTableBody">
                        <?php if (!empty($siswa)) : ?>
                            <?php 
                            $no = 1; 
                            foreach ($siswa as $row) : 
                                // Inisial nama siswa
                                $namaWords = explode(' ', trim($row['nama']));
                                $initials = '';
                                if (!empty($namaWords[0])) $initials .= strtoupper(substr($namaWords[0], 0, 1));
                                if (count($namaWords) > 1 && !empty($namaWords[1])) $initials .= strtoupper(substr($namaWords[1], 0, 1));
                                if ($initials === '') $initials = 'S';
                            ?>
                                <tr class="siswa-row" 
                                    data-id="<?= $row['id']; ?>" 
                                    data-nis="<?= esc(strtolower($row['nis'])); ?>" 
                                    data-nama="<?= esc(strtolower($row['nama'])); ?>" 
                                    data-kelas="<?= esc(strtolower($row['kelas'])); ?>">
                                    <td class="text-center text-muted fw-bold row-no"><?= $no++; ?></td>
                                    <td class="text-center">
                                        <span class="font-monospace fw-semibold text-secondary small bg-light px-2 py-1 rounded border">
                                            <?= esc($row['nis']); ?>
                                        </span>
                                    </td>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="avatar-initial"><?= $initials; ?></span>
                                            <span class="fw-semibold text-dark"><?= esc($row['nama']); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-kelas">
                                            <?= esc($row['kelas']); ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-nowrap">
                                            <!-- Tombol Tambah Data Siswa di Setiap Baris (Biru Sesuai Tema) -->
                                            <button type="button" class="btn btn-action btn-action-tambah text-nowrap"
                                                data-bs-toggle="modal" data-bs-target="#modalTambah"
                                                title="Tambah Data Siswa Baru">
                                                <i class="bi bi-plus-lg me-1"></i>Tambah
                                            </button>
                                            <!-- Tombol Edit (Netral Slate) -->
                                            <button type="button" class="btn btn-action btn-action-edit text-nowrap"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id']; ?>"
                                                title="Edit Data Siswa">
                                                <i class="bi bi-pencil-square me-1"></i>Edit
                                            </button>
                                            <!-- Tombol Hapus (Aksen Lembut) -->
                                            <button type="button" class="btn btn-action btn-action-hapus text-nowrap"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete<?= $row['id']; ?>"
                                                title="Hapus Data">
                                                <i class="bi bi-trash3 me-1"></i>Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- Empty State Row -->
                        <tr id="emptyMessageRow" class="<?= !empty($siswa) ? 'd-none' : ''; ?>">
                            <td colspan="5" class="text-center py-5">
                                <div class="py-3">
                                    <i class="bi bi-search fs-2 text-muted opacity-50 mb-2 d-block"></i>
                                    <h6 class="fw-bold text-secondary mb-1" id="emptyMessageTitle">
                                        <?= !empty($siswa) ? 'Data Tidak Ditemukan' : 'Belum Ada Data Siswa'; ?>
                                    </h6>
                                    <p class="text-muted small mb-3" id="emptyMessageText">
                                        <?= !empty($siswa) ? 'Coba gunakan kata kunci pencarian yang lain.' : 'Silakan tambahkan data siswa pertama Anda.'; ?>
                                    </p>
                                    <button type="button" class="btn btn-sm btn-primary px-3 rounded-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                        <i class="bi bi-plus-lg me-1"></i> Tambah Data Siswa
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer & Navigasi Pagination: 10 Siswa per Halaman, Total 5 Halaman -->
            <div class="p-3 border-top bg-light bg-opacity-50 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
                <div class="small text-muted" id="paginationInfo">
                    Menampilkan halaman <span class="fw-semibold text-dark" id="currentPageText">1</span> dari <span class="fw-semibold text-dark">5</span>
                </div>
                <nav aria-label="Navigasi Halaman Siswa">
                    <ul class="pagination pagination-sm mb-0" id="paginationList">
                        <!-- Disusun secara dinamis oleh JS -->
                    </ul>
                </nav>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="py-3 border-top bg-white mt-auto">
        <div class="container text-center">
            <small class="text-muted">
                &copy; <?= date('Y'); ?> Sistem Informasi Siswa XI RPL &bull; Desain Sederhana & Ramah Pengguna
            </small>
        </div>
    </footer>

    <!-- MODAL TAMBAH DATA SISWA -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h6 class="modal-title fw-bold text-dark" id="modalTambahLabel">Tambah Data Siswa</h6>
                        <small class="text-muted">Masukkan rincian identitas siswa baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('home/tambah'); ?>" method="POST">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="tambah_nis" class="form-label small fw-semibold text-secondary">Nomor Induk Siswa (NIS)</label>
                            <input type="text" name="nis" id="tambah_nis" class="form-control" placeholder="Contoh: 1011" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="tambah_nama" class="form-label small fw-semibold text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama" id="tambah_nama" class="form-control" placeholder="Contoh: Muhammad Raihan" required autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="tambah_kelas" class="form-label small fw-semibold text-secondary">Kelas / Jurusan</label>
                            <input type="text" name="kelas" id="tambah_kelas" class="form-control" placeholder="Contoh: XI RPL 1" required autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary px-3">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT & DELETE UNTUK SETIAP BARIS -->
    <?php if (!empty($siswa)) : ?>
        <?php foreach ($siswa as $row) : ?>
            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $row['id']; ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $row['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h6 class="modal-title fw-bold text-dark" id="modalEditLabel<?= $row['id']; ?>">Edit Data Siswa</h6>
                                <small class="text-muted">Perbarui informasi siswa yang dipilih</small>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('home/edit/' . $row['id']); ?>" method="POST">
                            <div class="modal-body p-4">
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-secondary">Nomor Induk Siswa (NIS)</label>
                                    <input type="text" name="nis" class="form-control" value="<?= esc($row['nis']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-secondary">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?= esc($row['nama']); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small fw-semibold text-secondary">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" value="<?= esc($row['kelas']); ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-primary px-3">
                                    <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="modalDelete<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content text-center p-3">
                        <div class="modal-body py-4">
                            <div class="mb-3 text-danger">
                                <i class="bi bi-exclamation-circle fs-1"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Hapus Data Siswa?</h6>
                            <p class="text-muted small mb-0">
                                Yakin ingin menghapus data <strong><?= esc($row['nama']); ?></strong>? Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center gap-2 pb-2">
                            <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Batal</button>
                            <a href="<?= base_url('home/hapus/' . $row['id']); ?>" class="btn btn-sm btn-danger px-3">
                                <i class="bi bi-trash3 me-1"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- CDN JS Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Pencarian & Pagination: 10 Siswa per Halaman, Total 5 Halaman -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const allRows = Array.from(document.querySelectorAll('.siswa-row'));
            const emptyRow = document.getElementById('emptyMessageRow');
            const emptyTitle = document.getElementById('emptyMessageTitle');
            const emptyText = document.getElementById('emptyMessageText');
            const paginationList = document.getElementById('paginationList');
            const paginationInfo = document.getElementById('paginationInfo');
            const dataCountText = document.getElementById('dataCountText');

            let currentPage = 1;
            const itemsPerPage = 10; // Tepat 10 siswa per halaman
            const defaultTotalPages = 5; // Tepat total 5 halaman sesuai permintaan

            function render() {
                const query = searchInput ? searchInput.value.trim().toLowerCase() : '';

                // Filter data siswa sesuai pencarian
                const filteredRows = allRows.filter(row => {
                    if (!query) return true;
                    const nis = row.dataset.nis || '';
                    const nama = row.dataset.nama || '';
                    const kelas = row.dataset.kelas || '';
                    return nis.includes(query) || nama.includes(query) || kelas.includes(query);
                });

                // Sembunyikan semua baris
                allRows.forEach(row => row.classList.add('d-none'));

                const totalFiltered = filteredRows.length;
                // Jika pencarian aktif, sesuaikan halaman dengan data yang ada, jika normal gunakan minimal 5 halaman
                let totalPages = query 
                    ? Math.max(Math.ceil(totalFiltered / itemsPerPage), 1)
                    : Math.max(Math.ceil(totalFiltered / itemsPerPage), defaultTotalPages);

                if (currentPage > totalPages) {
                    currentPage = totalPages;
                }

                // Update text ringkasan data
                if (dataCountText) {
                    if (query) {
                        dataCountText.textContent = `Ditemukan ${totalFiltered} dari ${allRows.length} siswa`;
                    } else {
                        dataCountText.textContent = `Menampilkan 10 siswa per halaman \u2022 Total ${allRows.length} siswa`;
                    }
                }

                // Penanganan jika hasil filter benar-benar kosong
                if (totalFiltered === 0) {
                    if (emptyRow) {
                        emptyRow.classList.remove('d-none');
                        if (query !== '') {
                            emptyTitle.textContent = 'Data Tidak Ditemukan';
                            emptyText.textContent = `Tidak ada siswa yang cocok dengan kata kunci "${query}".`;
                        } else {
                            emptyTitle.textContent = 'Belum Ada Data Siswa';
                            emptyText.textContent = 'Silakan tambahkan data siswa pertama Anda sekarang.';
                        }
                    }
                    if (paginationList) paginationList.innerHTML = '';
                    if (paginationInfo) paginationInfo.textContent = '0 data';
                    return;
                }

                // Sembunyikan pesan kosong jika baris terdeteksi
                if (emptyRow) emptyRow.classList.add('d-none');

                // Tampilkan data sesuai nomor halaman aktif
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, totalFiltered);
                const currentRows = filteredRows.slice(startIndex, endIndex);

                if (currentRows.length === 0) {
                    // Jika halaman 4 atau 5 belum memiliki data sebanyak itu
                    if (emptyRow) {
                        emptyRow.classList.remove('d-none');
                        emptyTitle.textContent = `Halaman ${currentPage} Belum Ada Data`;
                        emptyText.textContent = 'Data siswa untuk halaman ini belum tersedia. Silakan klik tombol Tambah Siswa.';
                    }
                } else {
                    currentRows.forEach((row, idx) => {
                        row.classList.remove('d-none');
                        const noCell = row.querySelector('.row-no');
                        if (noCell) {
                            noCell.textContent = startIndex + idx + 1;
                        }
                    });
                }

                // Update teks info pagination
                if (paginationInfo) {
                    paginationInfo.innerHTML = `Menampilkan halaman <span class="fw-semibold text-dark">${currentPage}</span> dari <span class="fw-semibold text-dark">${totalPages}</span> &bull; (10 data/halaman)`;
                }

                // Render tombol pagination 1 sampai 5
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                if (!paginationList) return;
                paginationList.innerHTML = '';

                // Tombol Previous
                const prevLi = document.createElement('li');
                prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
                prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></a>`;
                prevLi.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        render();
                    }
                });
                paginationList.appendChild(prevLi);

                // Tombol Angka Halaman (1, 2, 3, 4, 5)
                for (let i = 1; i <= totalPages; i++) {
                    const pageLi = document.createElement('li');
                    pageLi.className = `page-item ${currentPage === i ? 'active' : ''}`;
                    pageLi.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                    pageLi.addEventListener('click', function (e) {
                        e.preventDefault();
                        currentPage = i;
                        render();
                    });
                    paginationList.appendChild(pageLi);
                }

                // Tombol Next
                const nextLi = document.createElement('li');
                nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
                nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></a>`;
                nextLi.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        render();
                    }
                });
                paginationList.appendChild(nextLi);
            }

            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    currentPage = 1;
                    render();
                });
            }

            // Jalankan render awal
            render();
        });
    </script>
</body>

</html>