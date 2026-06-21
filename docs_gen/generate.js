const fs = require('fs');
const docx = require('docx');
const archiver = require('archiver');
const axios = require('axios');

const { Document, Packer, Paragraph, TextRun, HeadingLevel } = docx;

async function generateDoc() {
    const doc = new Document({
        sections: [{
            properties: {},
            children: [
                new Paragraph({
                    text: "PANDUAN PENGGUNAAN WEBSITE SMKS KARYA NUGRAHA BOYOLALI",
                    heading: HeadingLevel.HEADING_1,
                }),
                new Paragraph({
                    text: "1. Mengakses Halaman Publik",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    children: [
                        new TextRun("Untuk mengakses website sekolah, buka browser (seperti Chrome atau Firefox) dan ketik alamat URL: "),
                        new TextRun({ text: "https://smkknbi.sch.id", bold: true }),
                        new TextRun(". Halaman utama akan menampilkan slider animasi, berita terbaru, dan ekstrakurikuler. Anda bisa mengganti bahasa antara Indonesia dan Inggris melalui tombol di kanan atas."),
                    ]
                }),
                new Paragraph({
                    text: "2. Mengakses Panel Admin",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    children: [
                        new TextRun("Untuk mengelola konten website, tambahkan "),
                        new TextRun({ text: "/login", bold: true }),
                        new TextRun(" pada akhir alamat web (contoh: "),
                        new TextRun({ text: "https://smkknbi.sch.id/login", italics: true }),
                        new TextRun("). Masukkan email dan password admin yang telah diberikan."),
                    ]
                }),
                new Paragraph({
                    text: "3. Mengelola Berita (Post)",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    text: "Di dashboard, klik menu 'Berita & Pengumuman'. Anda dapat mengklik 'Tambah Baru' untuk membuat berita baru. Tersedia formulir untuk memasukkan Judul, Judul (Inggris), Isi Berita, Isi Berita (Inggris), dan gambar utama. Gambar akan otomatis muncul di halaman depan."
                }),
                new Paragraph({
                    text: "4. Mengelola Gambar Slider (Hero)",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    text: "Buka menu 'Gambar Slider'. Di sini Anda bisa mengunggah foto-foto besar yang akan bergeser otomatis di bagian paling atas halaman depan. Anda bisa menambahkan Subjudul, Judul, dan Teks Tombol (keduanya mendukung bahasa Inggris)."
                }),
                new Paragraph({
                    text: "5. Mengelola Ekstrakurikuler dan Galeri",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    text: "Masuk ke menu 'Ekstrakurikuler'. Anda dapat membuat ekstrakurikuler baru. Setelah dibuat, Anda bisa mengklik tombol 'Galeri' di daftar tabel untuk mengunggah foto-foto kegiatan khusus untuk ekstrakurikuler tersebut."
                }),
                new Paragraph({
                    text: "6. Mengubah Logo dan Informasi Kontak",
                    heading: HeadingLevel.HEADING_2,
                }),
                new Paragraph({
                    text: "Masuk ke menu 'Profil Sekolah' atau 'Pengaturan'. Di bagian ini Anda dapat mengganti logo yang akan muncul di header dan footer, serta nama sekolah, nomor telepon, email, dan alamat."
                })
            ],
        }],
    });

    const buffer = await Packer.toBuffer(doc);
    fs.writeFileSync('F:\\webutama\\portal-smkknbi\\Panduan_Website_SMKKNBI.docx', buffer);
    console.log("Docx created.");
}

async function downloadScreenshot(url, filename) {
    const api = `https://image.thum.io/get/width/1440/crop/900/noanimate/${url}`;
    try {
        const response = await axios({
            url: api,
            method: 'GET',
            responseType: 'stream'
        });
        
        return new Promise((resolve, reject) => {
            const writer = fs.createWriteStream(filename);
            response.data.pipe(writer);
            writer.on('finish', resolve);
            writer.on('error', reject);
        });
    } catch (e) {
        console.log(`Failed to download: ${api}`);
    }
}

async function takeScreenshots() {
    console.log("Downloading screenshots via API...");
    const shots = [
        { name: '1_Beranda_Publik', url: 'https://smkknbi.sch.id' },
        { name: '2_Berita_Publik', url: 'https://smkknbi.sch.id/posts' },
        { name: '3_Halaman_Login', url: 'https://smkknbi.sch.id/login' },
    ];

    if (!fs.existsSync('screenshots')) {
        fs.mkdirSync('screenshots');
    }

    for (let shot of shots) {
        console.log(`Downloading screenshot for ${shot.name}...`);
        await downloadScreenshot(shot.url, `screenshots/${shot.name}.png`);
        await new Promise(r => setTimeout(r, 2000)); // Be nice to API
    }
    console.log("Screenshots downloaded.");
}

async function zipScreenshots() {
    return new Promise((resolve, reject) => {
        const output = fs.createWriteStream('F:\\webutama\\portal-smkknbi\\Screenshots_Website_SMKKNBI.zip');
        const archive = archiver('zip', { zlib: { level: 9 } });

        output.on('close', function() {
            console.log(archive.pointer() + ' total bytes zipped');
            resolve();
        });

        archive.on('error', function(err) {
            reject(err);
        });

        archive.pipe(output);
        archive.directory('screenshots/', false);
        archive.finalize();
    });
}

(async () => {
    try {
        await generateDoc();
        await takeScreenshots();
        await zipScreenshots();
        console.log("All done!");
    } catch (e) {
        console.error(e);
    }
})();
