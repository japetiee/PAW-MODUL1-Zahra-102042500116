<?php
// Inisialisasi variabel untuk menampung pesan error, status pendaftaran, dan data input
$errorMessage = "";
$successMessage = "";
$isSubmitted = false;

// Inisialisasi variabel field form
$nama = "";
$nomor_wa = "";
$email = "";
$matkul = "";
$motivasi = "";

$namaErr = "";
$nomorWaErr = "";
$emailErr = "";
$matkulErr = "";
$motivasiErr = "";

// Cek apakah form dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil data dari form
    $nama = trim($_POST['nama'] ?? '');
    $nomor_wa = trim($_POST['nomor_wa'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $matkul = trim($_POST['matkul'] ?? '');
    $motivasi = trim($_POST['motivasi'] ?? '');

    $hasEmpty = false;
    $hasFormatError = false;

    // 2. Validasi Kolom Kosong (Aturan: Semua kolom wajib diisi)[cite: 3, 4]
    if (empty($nama)) {
        $namaErr = "* Nama lengkap tidak boleh kosong";
        $hasEmpty = true;
    }
    if (empty($nomor_wa)) {
        $nomorWaErr = "* Nomor WhatsApp tidak boleh kosong";
        $hasEmpty = true;
    }
    if (empty($email)) {
        $emailErr = "* Email institusi tidak boleh kosong";
        $hasEmpty = true;
    }
    if (empty($matkul)) {
        $matkulErr = "* Pilihan mata kuliah tidak boleh kosong";
        $hasEmpty = true;
    }
    if (empty($motivasi)) {
        $motivasiErr = "* Motivasi mendaftar tidak boleh kosong";
        $hasEmpty = true;
    }

    // Jika ada kolom kosong[cite: 4]
    if ($hasEmpty) {
        $errorMessage = "Pendaftaran gagal! Harap mengisi seluruh data yang wajib.";
    } else {
        // 3. Validasi Format Data[cite: 4]
        
        // Validation A: Nama lengkap harus berupa huruf dan spasi[cite: 4]
        if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
            $namaErr = "* Nama lengkap harus berupa huruf saja";
            $hasFormatError = true;
        }

        // Validation B: Nomor WhatsApp harus diawali angka '0' atau '62'[cite: 4]
        if (!preg_match("/^(0|62)[0-9]+$/", $nomor_wa)) {
            $nomorWaErr = "* Nomor WhatsApp harus diawali '0' atau '62'";
            $hasFormatError = true;
        }

        // Validation C: Email institusi harus berformat valid[cite: 4]
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Format email tidak valid";
            $hasFormatError = true;
        }

        if ($hasFormatError) {
            $errorMessage = "Pendaftaran gagal! Harap memasukkan data yang valid.";
        } else {
            // Jika semua validasi lolos[cite: 5]
            $isSubmitted = true;
            $successMessage = "Yay! Pendaftaran Berhasil ✨ Kartu Registrasi kamu sudah terbit!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Asisten Praktikum EAD</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Fredoka (Cute) & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Gradasi Nude Soft Cream to Soft Lilac/Beige */
            background: linear-gradient(135deg, #FDFBF7 0%, #F5EBE6 40%, #E8D8E0 100%);
        }
        .font-cute {
            font-family: 'Fredoka', cursive;
        }
        /* Gradient Button Soft Warm Purple/Brown */
        .btn-gradient {
            background: linear-gradient(135deg, #A27B8C 0%, #8C5E73 100%);
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #8C5E73 0%, #73485C 100%);
        }
        /* Card Background Nude White */
        .card-nude {
            background: #FFFFFF;
            box-shadow: 0 20px 40px -15px rgba(140, 94, 115, 0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 md:p-6">

    <!-- Card Wrapper Utama -->
    <div class="card-nude rounded-3xl border-2 border-[#EAD5DE] w-full max-w-lg p-6 md:p-8 my-6 relative overflow-hidden">
        
        <!-- Ornamen Lingkaran Soft Pink Nude di Background Card -->
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-[#F5EBE6] rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-12 -left-12 w-32 h-32 bg-[#E8D8E0] rounded-full blur-2xl pointer-events-none"></div>

        <!-- Header -->
        <div class="text-center mb-6 relative z-10">
            <div class="inline-flex items-center justify-center bg-[#F5EBE6] text-[#8C5E73] px-4 py-1.5 rounded-full font-cute text-xs font-bold mb-3 shadow-sm border border-[#EAD5DE]">
                🌸 Lab EAD Recruitment 🌸
            </div>
            <h1 class="font-cute text-3xl md:text-4xl font-bold text-[#5C3A48] tracking-wide">
                Pendaftaran Asisten
            </h1>
            <p class="text-xs md:text-sm font-medium text-[#8A6A78] mt-1">
                Laboratorium Enterprise Application Development
            </p>
        </div>

        <!-- Alert Error Global -->
        <?php if (!empty($errorMessage)): ?>
            <div class="bg-[#FFF0F3] border border-[#FFCCD5] text-[#C9184A] p-3.5 rounded-2xl mb-5 text-xs md:text-sm font-semibold flex items-center gap-2 shadow-sm animate-bounce">
                <span>🎀</span>
                <p><?= htmlspecialchars($errorMessage); ?></p>
            </div>
        <?php endif; ?>

        <!-- Alert Sukses -->
        <?php if (!empty($successMessage)): ?>
            <div class="bg-[#F0FDF4] border border-[#BBF7D0] text-[#15803D] p-3.5 rounded-2xl mb-5 text-xs md:text-sm font-semibold flex items-center gap-2 shadow-sm">
                <span>✨</span>
                <p><?= htmlspecialchars($successMessage); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!$isSubmitted): ?>
            <!-- FORM PENDAFTARAN -->
            <form action="" method="POST" class="space-y-4 relative z-10">
                
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs font-bold text-[#5C3A48] uppercase tracking-wider mb-1.5">
                        Nama Lengkap <span class="text-[#A27B8C]">*</span>
                    </label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($nama); ?>" placeholder="cth: Budi Santoso 🌸"
                           class="w-full px-4 py-2.5 bg-[#FAF7F5] text-sm text-[#4A323D] rounded-xl border transition duration-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#A27B8C] <?= !empty($namaErr) ? 'border-red-400 bg-red-50' : 'border-[#EAD5DE]' ?>">
                    <?php if (!empty($namaErr)): ?>
                        <p class="text-[11px] font-bold text-red-500 mt-1 pl-1">⚠️ <?= $namaErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Nomor WhatsApp -->
                <div>
                    <label class="block text-xs font-bold text-[#5C3A48] uppercase tracking-wider mb-1.5">
                        Nomor WhatsApp <span class="text-[#A27B8C]">*</span>
                    </label>
                    <input type="text" name="nomor_wa" value="<?= htmlspecialchars($nomor_wa); ?>" placeholder="cth: 08123456789 📱"
                           class="w-full px-4 py-2.5 bg-[#FAF7F5] text-sm text-[#4A323D] rounded-xl border transition duration-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#A27B8C] <?= !empty($nomorWaErr) ? 'border-red-400 bg-red-50' : 'border-[#EAD5DE]' ?>">
                    <?php if (!empty($nomorWaErr)): ?>
                        <p class="text-[11px] font-bold text-red-500 mt-1 pl-1">⚠️ <?= $nomorWaErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email Institusi -->
                <div>
                    <label class="block text-xs font-bold text-[#5C3A48] uppercase tracking-wider mb-1.5">
                        Email Institusi <span class="text-[#A27B8C]">*</span>
                    </label>
                    <input type="text" name="email" value="<?= htmlspecialchars($email); ?>" placeholder="cth: budi@student.telkomuniversity.ac.id ✉️"
                           class="w-full px-4 py-2.5 bg-[#FAF7F5] text-sm text-[#4A323D] rounded-xl border transition duration-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#A27B8C] <?= !empty($emailErr) ? 'border-red-400 bg-red-50' : 'border-[#EAD5DE]' ?>">
                    <?php if (!empty($emailErr)): ?>
                        <p class="text-[11px] font-bold text-red-500 mt-1 pl-1">⚠️ <?= $emailErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Pilihan Mata Kuliah -->
                <div>
                    <label class="block text-xs font-bold text-[#5C3A48] uppercase tracking-wider mb-1.5">
                        Pilihan Mata Kuliah Praktikum <span class="text-[#A27B8C]">*</span>
                    </label>
                    <select name="matkul" class="w-full px-4 py-2.5 bg-[#FAF7F5] text-sm text-[#4A323D] rounded-xl border transition duration-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#A27B8C] <?= !empty($matkulErr) ? 'border-red-400 bg-red-50' : 'border-[#EAD5DE]' ?>">
                        <option value="">-- Pilih Mata Kuliah 📚 --</option>
                        <option value="Pengembangan Aplikasi Website" <?= ($matkul === "Pengembangan Aplikasi Website") ? 'selected' : ''; ?>>🌐 Pengembangan Aplikasi Website</option>
                        <option value="Pemrograman Berbasis Objek" <?= ($matkul === "Pemrograman Berbasis Objek") ? 'selected' : ''; ?>>💻 Pemrograman Berbasis Objek</option>
                        <option value="Basis Data" <?= ($matkul === "Basis Data") ? 'selected' : ''; ?>>🗄️ Basis Data</option>
                    </select>
                    <?php if (!empty($matkulErr)): ?>
                        <p class="text-[11px] font-bold text-red-500 mt-1 pl-1">⚠️ <?= $matkulErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Motivasi Mendaftar -->
                <div>
                    <label class="block text-xs font-bold text-[#5C3A48] uppercase tracking-wider mb-1.5">
                        Motivasi Mendaftar <span class="text-[#A27B8C]">*</span>
                    </label>
                    <textarea name="motivasi" rows="3" placeholder="Tuliskan motivasi manis kamu di sini... 💭"
                              class="w-full px-4 py-2.5 bg-[#FAF7F5] text-sm text-[#4A323D] rounded-xl border transition duration-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#A27B8C] <?= !empty($motivasiErr) ? 'border-red-400 bg-red-50' : 'border-[#EAD5DE]' ?>"><?= htmlspecialchars($motivasi); ?></textarea>
                    <?php if (!empty($motivasiErr)): ?>
                        <p class="text-[11px] font-bold text-red-500 mt-1 pl-1">⚠️ <?= $motivasiErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-3">
                    <button type="submit" class="btn-gradient w-full text-white font-cute text-lg font-bold py-3 rounded-2xl shadow-md transform hover:-translate-y-0.5 active:translate-y-0 transition duration-150">
                        Kirim Pendaftaran 💖
                    </button>
                </div>
            </form>

        <?php else: ?>

            <!-- KARTU REGISTRASI (Tampil Setelah Berhasil)[cite: 5, 6] -->
            <div class="bg-[#FAF7F5] border-2 border-dashed border-[#D5B8C5] rounded-2xl p-5 md:p-6 mt-2 relative z-10">
                <div class="text-center border-b-2 border-dashed border-[#EAD5DE] pb-4 mb-4">
                    <span class="inline-block bg-[#E8D8E0] text-[#73485C] text-[10px] font-bold px-3 py-1 rounded-full mb-1">
                        OFFICIAL TICKET
                    </span>
                    <h2 class="font-cute text-2xl font-bold text-[#5C3A48]">KARTU REGISTRASI 🎫</h2>
                    <p class="text-xs text-[#8A6A78]">Calon Asisten Praktikum EAD 2026</p>
                </div>
                
                <div class="space-y-3 text-xs md:text-sm">
                    <div class="bg-white p-3 rounded-xl border border-[#EAD5DE]">
                        <span class="block text-[10px] font-bold text-[#8A6A78] uppercase">Nama Lengkap</span>
                        <span class="font-bold text-[#5C3A48] text-base"><?= htmlspecialchars($nama); ?></span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-white p-3 rounded-xl border border-[#EAD5DE]">
                            <span class="block text-[10px] font-bold text-[#8A6A78] uppercase">No. WhatsApp</span>
                            <span class="font-semibold text-[#5C3A48]"><?= htmlspecialchars($nomor_wa); ?></span>
                        </div>
                        <div class="bg-white p-3 rounded-xl border border-[#EAD5DE]">
                            <span class="block text-[10px] font-bold text-[#8A6A78] uppercase">Mata Kuliah</span>
                            <span class="font-semibold text-[#8C5E73]"><?= htmlspecialchars($matkul); ?></span>
                        </div>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-[#EAD5DE]">
                        <span class="block text-[10px] font-bold text-[#8A6A78] uppercase">Email Institusi</span>
                        <span class="font-semibold text-[#5C3A48]"><?= htmlspecialchars($email); ?></span>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-[#EAD5DE]">
                        <span class="block text-[10px] font-bold text-[#8A6A78] uppercase">Motivasi</span>
                        <p class="text-[#5C3A48] italic mt-0.5 text-xs">
                            "<?= htmlspecialchars($motivasi); ?>"
                        </p>
                    </div>
                </div>

                <div class="mt-5">
                    <a href="" class="block text-center w-full bg-[#8C5E73] hover:bg-[#73485C] text-white font-cute font-semibold py-2.5 rounded-xl text-sm transition shadow-sm">
                        🌸 Lihat Data Pendaftar / Kembali
                    </a>
                </div>
            </div>

        <?php endif; ?>

    </div>

</body>
</html>