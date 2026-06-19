PERANCANGAN SISTEM INFORMASI MANAJEMEN
PRODUKSI DAN PENJUALAN TELUR BERBASIS WEBSITE
MENGGUNAKAN METODE AGILE SCRUM UNTUK
OPTIMALISASI OPERASIONAL PETERNAKAN (STUDI
KASUS PETERNAKAN ROHMAT AYAM BANGUN REJO)
PROPOSAL
Diajukan untuk Diseminarkan dalam rangka
penulisan skripsi pada prodi sistem informasi
Disusun Oleh :
Putri Anggita Sari 2271020053
PROGRAM STUDI SISTEM INFORMASI
FAKULTAS SAINS DAN TEKNOLOGI
UNIVERSITAS ISLAM NEGERI RADEN INTAN LAMPUNG
1447 H/2026 M

DAFTAR ISI
DAFTAR ISI .......................................................................................................... ii
DAFTAR GAMBAR ........................................................................................... iiv
DAFTAR TABEL .................................................................................................. v
BAB I ...................................................................................................................... 6
PENDAHULUAN ................................................................................................... 6
A. Penegasan Judul ........................................................................................................ 6
B. Latar Belakang Masalah ........................................................................................... 9
C. Identifikasi Masalah................................................................................................ 13
D. Rumusan Masalah ................................................................................................... 14
E. Tujuan Penelitian .................................................................................................... 14
F. Manfaat Penelitian .................................................................................................. 15
G. Kajian Penelitian Terdahulu yang Relevan ............................................................ 16
BAB II ................................................................................................................... 19
LANDASAN TEORI ........................................................................................... 19
A. Sistem Informasi Manajemen ................................................................................. 19
B. Sistem Informasi Manajemen Produksi .................................................................. 20
C. Sistem Informasi Manajemen Penjualan ................................................................ 21
D. Website .................................................................................................................... 22
E. Metode Agile Scrum ................................................................................................ 23
F. Peternakan Ayam Petelur ....................................................................................... 24
G. Teknologi Pendukung sistem ................................................................................. 25
H. Unified Modeling Language (UML)....................................................................... 26
I. Pengujian Sistem .................................................................................................... 28
ii

BAB III .................................................................................................................. 31
METODE PENELITIAN .................................................................................... 31
A. Tempat dan Waktu Penelitian ................................................................................. 31
B. Jenis Penelitian ....................................................................................................... 32
C. Metode Pengembangan Sistem ............................................................................... 32
D. Prosedur Penelitian Pengembangan ........................................................................ 37
E. Subjek Uji Coba Penelitian ..................................................................................... 45
F. Instrumen Penelitian ............................................................................................... 46
G. Uji Coba Produk ..................................................................................................... 48
H. Teknik Analisa Data ............................................................................................... 49
DAFTAR RUJUKAN .......................................................................................... 51
iii

DAFTAR GAMBAR
Gambar 1.1 Diagram Alur Produksi dan Penjualan Telur yang Sedang Berjalan . 11
Gambar 3.1 Alur Metode Agile Scrum .................................................................. 33
Gambar 3.2 Alur Sistem yang Dirancang .............................................................. 38
Gambar 3.3 Use Case Diagram Pengembangan Sistem ........................................ 39
Gambar 3.4 Activity Diagram Pengembangan Sistem .......................................... 40
Gambar 3.5 Class Diagram Pengembangan Sistem ............................................... 41
iv

DAFTAR TABEL
Tabel 3.1 Product Backlog ..................................................................................... 35
Tabel 3.2 Sprint Planning ...................................................................................... 37
v

6
BAB I
PENDAHULUAN
A. Penegasan Judul
Sebelum diuraikan skripsi ini lebih lanjut, terlebih dahulu akan
dijelaskan pengertian istilah-istilah yang terdapat dalam judul skripsi ini
dengan maksud untuk menghindari kesalah pahaman. Judul skripsi ini adalah
“Perancangan Sistem Informasi Manajemen Produksi dan Penjualan
Telur Berbasis Website Menggunakan Metode Agile Scrum untuk
Optimalisasi Operasional Peternakan Pada Peternakan Rohmat
Ayam, Bangun rejo”. Penegasan judul ini bertujuan agar pembaca
memahami secara tepat maksud dari penelitian yang dilakukan, berikut
penjelasan dari istilah-istilah utama dalam judul tersebut.
Perancangan merupakan proses penyusunan dan pengembangan suatu
sistem yang dilakukan untuk menghasilkan solusi terhadap permasalahan
yang dihadapi pengguna. Dalam pengembangan sistem informasi,
perancangan dilakukan dengan menggambarkan kebutuhan sistem, proses
bisnis, basis data, serta antarmuka yang akan digunakan sehingga sistem yang
dibangun dapat berjalan sesuai dengan tujuan dan kebutuhan pengguna.1
Berdasarkan pengertian menurut para ahli di atas, maka penulis
menyimpulkan bahwa perancangan merupakan suatu proses penyusunan dan
penggambaran sistem secara rinci untuk membangun atau mengembangkan
suatu sistem agar dapat berjalan sesuai kebutuhan pengguna dengan
memperhatikan arsitektur, komponen, serta alur sistem yang akan dibuat.
Sistem Informasi Manajemen (SIM) merupakan sistem yang terdiri dari
perangkat lunak, perangkat keras, data, prosedur, dan sumber daya manusia
yang saling terintegrasi untuk menghasilkan informasi yang berguna dalam
1 Hasan, A. R., Chotimah, C., & Junaris, I. (2023). Analisis Metode Perancangan Sistem Informasi
Akademik Berbasis Web: Systematic Literature Review. Jurnal Manajemen Mutu Pendidikan,
11(2).

7
mendukung pengambilan keputusan organisasi2.Menurut Armah dan Firdaus,
Sistem Informasi Manajemen adalah serangkaian komponen yang saling
berkaitan untuk mengumpulkan, mengolah, menyimpan, dan
mendistribusikan informasi guna mendukung pengambilan keputusan,
koordinasi, dan pengendalian dalam organisasi3.
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
Sistem Informasi Manajemen merupakan sistem terintegrasi yang digunakan
untuk mengelola data menjadi informasi yang akurat dan relevan guna
mendukung proses pengelolaan dan pengambilan keputusan secara efektif
dan efisien. Dalam penelitian ini, Sistem Informasi Manajemen difokuskan
pada pengelolaan produksi dan penjualan telur secara terintegrasi.
Manajemen produksi merupakan kegiatan pengelolaan proses produksi
yang dilakukan secara terencana untuk menghasilkan produk sesuai target
yang ditetapkan. Manajemen produksi mencakup proses perencanaan,
pengorganisasian, pelaksanaan, dan pengawasan kegiatan produksi agar
proses operasional dapat berjalan secara efektif dan efisien4.
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
manajemen produksi merupakan proses pengelolaan kegiatan produksi secara
sistematis untuk menghasilkan produk dengan pengelolaan data produksi
yang lebih teratur, efektif, dan efisien. Dalam penelitian ini, manajemen
produksi difokuskan pada pencatatan hasil produksi telur harian dan
pengelolaan stok telur pada Peternakan Rohmat Ayam Bangun Rejo.
Manajemen penjualan merupakan proses perencanaan, pelaksanaan,
dan pengawasan kegiatan penjualan untuk mencapai tujuan penjualan secara
efektif. Manajemen penjualan juga mencakup pengelolaan transaksi, data
pelanggan, distribusi produk, serta penyusunan laporan penjualan5.
2 Yoraeni, Ani, dkk. Sistem Informasi Manajemen. Bandung: Widina Bhakti Persada Bandung,
2023
3 Safira Armah and Rayyan Firdaus, “Konsep Dan Penerapan Sistem Informasi Manajemen,”
Jurnal Inovasi Manajemen, Kewirausahaan, Bisnis Dan Digital 1, no. 3 (2024): 50–56.
4 Sistem Informasi and Universitas Pelita Harapan, “Pengembangan Dan Penelitian Sistem
Informasi Manajemen Produksi ( Mitra : PT . Maju Bersama Persada Dayamu ( MBPD )
Tangerang )” 1, no. 1 (2022): 37–47.
5 Septian Nur Hadiwinata, “Rancang Bangun Sistem Informasi Manajemen Penjualan Kopi Pada
Coffee Shop Konamu Menggunakan Sistem Point Of Sale” 8, no. 2 (n.d.): 1–10.

8
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
manajemen penjualan merupakan proses pengelolaan aktivitas penjualan
secara terstruktur untuk membantu pencatatan transaksi, pengelolaan
pelanggan, dan penyusunan laporan penjualan secara lebih efektif dan efisien.
Dalam penelitian ini, manajemen penjualan difokuskan pada proses
pencatatan transaksi penjualan telur kepada pelanggan atau agen.
Website adalah kumpulan halaman web yang saling terhubung dan
dapat diakses melalui jaringan internet menggunakan web browser. Website
digunakan sebagai media untuk menyajikan informasi, mengelola data, dan
mendukung berbagai aktivitas pengguna secara daring.6 Menurut Arthalia dan
Prasetyo, website memungkinkan informasi diakses oleh pengguna kapan
saja dan dari berbagai lokasi tanpa dibatasi oleh ruang dan waktu, sehingga
dapat dimanfaatkan sebagai sarana yang efektif dalam mendukung kegiatan
operasional dan penyampaian informasi7.
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
website merupakan media berbasis internet yang digunakan untuk
menyajikan informasi dan mengelola data secara cepat, mudah, dan efektif.
Dalam penelitian ini, website digunakan sebagai platform untuk mengelola
data produksi dan penjualan telur secara terintegrasi.
Metode Agile merupakan metode pengembangan perangkat lunak yang
dilakukan secara bertahap, fleksibel, dan cepat dengan mengutamakan
kolaborasi antara pengembang dan pengguna8. Salah satu kerangka kerja
dalam Agile adalah Scrum, yaitu metode pengembangan perangkat lunak
yang dilakukan melalui beberapa sprint dalam periode tertentu agar
6 Ade Irma Suryani and Indah Anggraini, “Sistem Informasi Pengolahan Data Peternakan Ayam
Merah Petelur Pada Astipel Farm Berbasis Web” 8, no. 4 (2024): 1090–1102.
7 Ika Arthalia and Rendi Prasetyo, “Penggunaan WebSite Sebagai Sarana Evaluasi Kegiatan
Akademik Siswa Di SMA Negeri 1 Punggur Lampung Tengah,” Jurnal Ilmu Komputer &
Informatika 1, no. 2 (2020).
8 Nico Abrarsyah Atallah and Mardi, “Penggunaan Metode Agile Scrum Pada Perancangan Sistem
Informasi Surat Izin Penelitian Di BAKESBANGPOL Lombok Tengah,” Neptunus : Jurnal Ilmu
Komputer Dan Teknologi Informasi 2, no. 3 (2024): 371–84.

9
pengembangan sistem dapat berjalan lebih terstruktur dan sesuai kebutuhan
pengguna9.
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
Agile Scrum merupakan metode pengembangan perangkat lunak yang
dilakukan secara bertahap dan fleksibel melalui beberapa sprint untuk
menghasilkan sistem yang sesuai dengan kebutuhan pengguna secara lebih
efektif dan terarah.
Optimalisasi merupakan proses peningkatan kinerja suatu kegiatan atau
sistem agar berjalan lebih efektif, efisien, dan produktif dengan
memanfaatkan sumber daya yang tersedia secara maksimal10.
Berdasarkan pengertian tersebut, maka penulis menyimpulkan bahwa
optimalisasi merupakan upaya untuk meningkatkan kualitas dan efisiensi
suatu sistem atau kegiatan agar tujuan yang diharapkan dapat tercapai dengan
lebih baik. Dalam penelitian ini, optimalisasi difokuskan pada peningkatan
efektivitas operasional produksi dan penjualan di Peternakan Rohmat Ayam
Bangun Rejo.
B. Latar Belakang Masalah
Perkembangan teknologi informasi saat ini telah membawa perubahan
besar dalam berbagai bidang usaha, termasuk pada sektor peternakan.
Pemanfaatan teknologi informasi dalam pengelolaan usaha menjadi salah satu
upaya untuk meningkatkan efisiensi kerja, mempercepat proses pengolahan
data, serta membantu pengambilan keputusan secara lebih cepat dan akurat.
Penerapan sistem informasi berbasis teknologi juga mampu membantu pelaku
usaha dalam mengelola data operasional secara terintegrasi sehingga aktivitas
bisnis dapat berjalan lebih efektif dan terstruktur. 11
Sektor peternakan ayam petelur memiliki proses operasional yang
berlangsung secara terus-menerus setiap hari. Proses tersebut dimulai dari
9 Ahmad Abtokhi, Hisyam Fahmi, and Wina Permana Sari, “The Efficiency of Scrum Model for
Developing Research and Publication Management Systems in Indonesia,” International Journal
of Computing and Digital Systems 1, no. 1 (2023).
10 Shinta Nilam and Sari Muslim, “Implementasi Sistem Informasi Berbasis Web Untuk
Optimalisasi Operasional Pada UMKM Krupuk Singkong Nusantara Putra” 2, no. 3 (2024): 287–
96.
11 Muhammad Dhafa et al., “Pemodelan Sistem Informasi Penjualan Berbasis Web Pada Usaha
Ternak Heli Farm Menggunakan Metode Waterfall” 4, no. 3 (2024).

10
kegiatan produksi telur, pencatatan stok hasil produksi, hingga proses
penjualan kepada pelanggan atau agen. Selain itu, kegiatan operasional
peternakan juga mencakup pengelolaan data pelanggan, pencatatan
pengeluaran operasional, serta penyusunan laporan produksi dan penjualan.
Seluruh aktivitas tersebut membutuhkan sistem pengelolaan data yang
terorganisir agar informasi yang dihasilkan dapat digunakan sebagai dasar
pengambilan keputusan.
Namun, pada praktiknya masih banyak peternakan skala menengah yang
menggunakan sistem pencatatan manual dalam mengelola data operasional.
Pencatatan yang dilakukan menggunakan buku tulis, nota fisik, maupun lembar
kerja sederhana sering menimbulkan berbagai kendala, seperti kehilangan data,
kesalahan pencatatan, keterlambatan pembuatan laporan, serta sulitnya
melakukan pemantauan stok secara real-time. Kondisi tersebut menyebabkan
proses pengelolaan produksi dan penjualan menjadi kurang efektif dan kurang
efisien.12
Peternakan Rohmat Ayam yang berlokasi di Bangun Rejo, Lampung
Tengah, merupakan salah satu usaha peternakan ayam petelur dengan populasi
sekitar 4.000 ekor ayam dan rata-rata produksi telur mencapai 120 kg per hari.
Dalam kegiatan operasionalnya, proses pencatatan produksi, stok, dan
penjualan masih dilakukan secara manual menggunakan buku catatan dan nota
fisik. Berdasarkan hasil observasi dan wawancara dengan pemilik peternakan,
proses penyusunan laporan produksi dan penjualan membutuhkan waktu
sekitar 1 jam setiap minggu karena data harus direkap dari beberapa catatan
yang berbeda. Selain itu, dalam satu bulan rata-rata terjadi 2-4 kali
ketidaksesuaian data stok dengan jumlah stok aktual akibat kesalahan
pencatatan maupun keterlambatan pembaruan data. Kondisi tersebut
menyebabkan proses pencatatan sering mengalami ketidaksesuaian data,
laporan produksi dan penjualan membutuhkan waktu yang lama untuk direkap,
serta pemilik mengalami kesulitan dalam memantau kondisi stok telur secara
cepat dan akurat. Selain itu, data produksi, stok, penjualan, dan pengeluaran
12 Petelur Mertha et al., “PKM PEMBERDAYAAN KELOMPOK PETERNAK AYAM” 6
(2025): 153–64, https://doi.org/10.36733/jadma.v6i2.12401.

11
masih tersimpan secara terpisah sehingga informasi operasional belum dapat
ditampilkan secara terintegrasi dalam satu sistem.
Untuk memberikan gambaran mengenai proses operasional yang sedang
berjalan pada Peternakan Rohmat Ayam Bangun Rejo, alur produksi dan
penjualan telur yang masih dilakukan secara manual dapat digambarkan
sebagai berikut.
Gambar 1.1 Diagram Alur Produksi dan Penjualan Telur yang
Sedang Berjalan
Berdasarkan diagram alur sistem manual tersebut, dapat diketahui bahwa
proses pengelolaan produksi dan penjualan telur pada Peternakan Rohmat
Ayam Bangun Rejo masih dilakukan secara konvensional melalui pencatatan
pada buku dan nota fisik. Proses pencatatan hasil produksi, pengelolaan stok,
transaksi penjualan, hingga penyusunan laporan dilakukan secara terpisah
sehingga data operasional belum terintegrasi dalam satu sistem. Kondisi

12
tersebut menyebabkan informasi mengenai produksi, stok, dan penjualan tidak
dapat diperoleh secara cepat dan real-time sehingga pemilik peternakan
mengalami kesulitan dalam melakukan pemantauan operasional serta
pengambilan keputusan secara tepat waktu. Selain itu, penggunaan media
pencatatan manual juga meningkatkan risiko terjadinya kehilangan data,
kesalahan pencatatan, duplikasi data, serta ketidaksesuaian informasi antara
data produksi, stok, dan penjualan.
Permasalahan tersebut menunjukkan bahwa Peternakan Rohmat Ayam
membutuhkan sebuah sistem informasi manajemen berbasis website yang
mampu mengintegrasikan proses produksi, pengelolaan stok, transaksi
penjualan, data pelanggan, serta penyajian laporan dalam satu sistem yang
saling terhubung. Dengan adanya sistem yang terintegrasi, proses pengelolaan
data dapat dilakukan secara lebih efektif dan efisien, sementara informasi
operasional dapat diperoleh secara lebih cepat, akurat, dan real-time untuk
mendukung pengambilan keputusan.
Berdasarkan kajian penelitian terdahulu, sebagian penelitian hanya
berfokus pada pengelolaan produksi atau pengelolaan penjualan secara
terpisah. Selain itu, beberapa penelitian masih menggunakan metode
pengembangan Waterfall yang bersifat linier sehingga kurang fleksibel dalam
menyesuaikan perubahan kebutuhan pengguna selama proses pengembangan
sistem berlangsung. Oleh karena itu, penelitian ini mengembangkan sistem
informasi yang mengintegrasikan proses produksi dan penjualan dalam satu
platform berbasis website.
Metode Agile Scrum dipilih karena mampu mendukung proses
pengembangan sistem secara bertahap melalui sprint yang terstruktur, sehingga
perubahan kebutuhan pengguna dapat diakomodasi dengan lebih fleksibel
selama proses pengembangan berlangsung. Melalui evaluasi dan perbaikan
pada setiap sprint, sistem yang dihasilkan diharapkan lebih sesuai dengan
kebutuhan operasional Peternakan Rohmat Ayam Bangun Rejo.
Melalui perancangan sistem ini, diharapkan proses manajemen produksi
dan penjualan pada Peternakan Rohmat Ayam Bangun Rejo dapat berjalan
lebih efektif, efisien, dan terintegrasi. Sistem yang dibangun diharapkan

13
mampu membantu pemilik dalam mengelola data produksi, memantau stok
secara real-time, mempercepat penyusunan laporan, serta mendukung
pengambilan keputusan operasional secara lebih cepat dan akurat. Berdasarkan
uraian tersebut, maka penelitian ini dilakukan dengan judul “Perancangan
Sistem Informasi Manajemen Produksi dan Penjualan Telur Berbasis Website
Menggunakan Metode Agile Scrum untuk Optimalisasi Operasional
Peternakan (Studi Kasus Peternakan Rohmat Ayam Bangun Rejo)”.
C. Identifikasi Masalah
1. Identifikasi Masalah
Identifikasi berdasarkan latar belakang masalah peneliti mendapat
beberapa permasalahan yaitu:
a. Data produksi telur belum terhubung secara otomatis dengan data
stok.
Hasil produksi masih dicatat secara manual sehingga penambahan
stok telur tidak dapat dilakukan secara otomatis dan real-time.
b. Data penjualan belum terintegrasi dengan pengurangan stok.
Pencatatan penjualan masih dilakukan secara manual sehingga stok
tidak berkurang secara otomatis ketika terjadi penjualan.
c. Pengelolaan data pelanggan belum dilakukan secara terstruktur.
Data pelanggan dan informasi agen masih disimpan secara manual,
sehingga menyulitkan proses pencarian dan pemantauan riwayat
penjualan.
d. Pencatatan pengeluaran operasional belum terintegrasi dengan sistem
laporan.
Data biaya operasional masih dicatat secara terpisah sehingga
informasi pengeluaran belum dapat disajikan secara cepat dan akurat.
e. Laporan produksi, penjualan, dan pengeluaran masih disusun secara
manual.
Proses pembuatan laporan membutuhkan waktu yang lama dan rentan
terhadap kesalahan pencatatan.
f. Belum tersedia dashboard monitoring yang menampilkan ringkasan
operasional secara real-time.

14
Pemilik peternakan belum dapat memantau data produksi, stok,
penjualan, dan pengeluaran secara terintegrasi dalam satu tampilan.
g. Belum tersedia sistem informasi manajemen produksi dan penjualan
telur berbasis website yang terintegrasi.
Akibatnya, proses operasional peternakan belum berjalan secara
efektif, efisien, dan terstruktur.
2. Batasan Masalah
Batasan permasalahan berdasarkan identifikasi masalah pada penelitian ini
adalah:
a. Sistem hanya membahas manajemen produksi dan manajemen
penjualan telur.
b. Sistem berbasis website dan digunakan untuk operasional internal
peternakan.
c. Sistem tidak membahas marketplace atau penjualan online.
d. Sistem tidak membahas payment gateway atau pembayaran digital.
e. Sistem tidak membahas akuntansi keuangan secara lengkap.
f. Sistem hanya digunakan untuk pengelolaan data produksi, stok,
penjualan, pelanggan, laporan, dan dashboard monitoring.
D. Rumusan Masalah
Berdasarkan latar belakang dan identifikasi masalah yang telah
dipaparkan, maka rumusan masalah dalam penelitian ini adalah:
“Bagaimana merancang sistem informasi manajemen produksi dan
penjualan telur berbasis website menggunakan metode Agile Scrum untuk
mendukung optimalisasi operasional pada Peternakan Rohmat Ayam Bangun
Rejo?”
E. Tujuan Penelitian
Berdasarkan rumusan masalah yang ada, maka tujuan yang ingin dicapai
oleh penulis dalam penelitian ini adalah:
“Merancang dan membangun Sistem Informasi Manajemen Produksi dan
Penjualan Telur berbasis website menggunakan metode Agile Scrum untuk
mendukung optimalisasi operasional pada Peternakan Rohmat Ayam
Bangun Rejo”

15
F. Manfaat Penelitian
Melalui penelitian ini, diharapkan dapat memberikan manfaat bagi
berbagai pihak sebagai berikut:
1. Manfaat Teoritis
Penelitian ini diharapkan dapat memberikan kontribusi dalam
pengembangan ilmu sistem informasi manajemen, khususnya dalam
penerapan sistem informasi berbasis website untuk mendukung
pengelolaan produksi dan penjualan pada usaha peternakan. Selain itu,
hasil penelitian ini diharapkan dapat menjadi referensi bagi penelitian
selanjutnya yang berkaitan dengan pengembangan sistem informasi di
bidang peternakan dan agribisnis.
2. Manfaat Praktis
Melalui penelitian ini, diharapkan dapat memberikan manfaat bagi
berbagai pihak sebagai berikut:
a. Manfaat bagi Peternakan Rohmat Ayam Bangun Rejo
Penelitian ini diharapkan dapat membantu meningkatkan efektivitas
dan efisiensi dalam pengelolaan data produksi, stok, penjualan,
pelanggan, dan pengeluaran. Sistem yang dirancang dapat
mempermudah proses pencatatan, penyusunan laporan, serta
pemantauan operasional secara cepat, akurat, dan terintegrasi.
b. Manfaat bagi Pengelola Peternakan
Sistem ini diharapkan dapat mempermudah pengelola dalam mencatat
hasil produksi harian, memantau stok telur, mengelola data penjualan
dan pelanggan, serta menyusun laporan secara otomatis. Dengan
demikian, sistem dapat mengurangi kesalahan pencatatan dan
meningkatkan efisiensi kerja.
c. Manfaat bagi UIN Raden Intan Lampung
Penelitian ini diharapkan dapat menjadi referensi dan bahan kajian
bagi mahasiswa Program Studi Sistem Informasi, khususnya dalam
penelitian yang berkaitan dengan perancangan sistem informasi
manajemen berbasis website menggunakan metode Agile Scrum.
d. Manfaat bagi Penulis

16
Penelitian ini menjadi sarana untuk menerapkan ilmu yang telah
diperoleh selama perkuliahan, khususnya dalam bidang analisis dan
perancangan sistem informasi, pengelolaan basis data, serta penerapan
metode Agile Scrum dalam pengembangan sistem.
G. Kajian Penelitian Terdahulu yang Relevan
Berdasarkan kajian teori yang dilakukan, penelitian sebelumnya terkait
penelitian yang akan dilakukan adalah sebagai berikut:
Penelitian oleh Udayana, Indrawan, dan Wijaya (2023) yang berjudul
Peningkatan Efektivitas Bisnis Pada Kelompok Peternakan Ayam Petelur
Melalui Penerapan Sistem Informasi membahas penerapan sistem informasi
untuk meningkatkan efektivitas operasional kelompok peternakan ayam
petelur. Penelitian ini menunjukkan bahwa digitalisasi pencatatan keuangan
dan inventori mampu meningkatkan akurasi data dan transparansi pengelolaan
usaha.13 Namun, penelitian tersebut lebih berfokus pada aspek keuangan dan
inventori serta belum mengintegrasikan pengelolaan produksi dan penjualan
telur. Selain itu, metode Agile Scrum belum digunakan dalam pengembangan
sistem.
Penelitian oleh Subowo dan Saputra (2019) yang berjudul Sistem
Informasi Peternakan Ayam Broiler di Kabupaten Pekalongan Berbasis Web
dan Android membahas pengembangan sistem informasi sebagai media
penyampaian informasi dan komunikasi pada bidang peternakan ayam broiler.
Hasil penelitian menunjukkan bahwa sistem informasi berbasis Android dan
website mampu membantu proses penyebaran informasi serta mempermudah
komunikasi bagi calon peternak ayam broiler. Perbedaan penelitian tersebut
dengan penelitian ini terletak pada fokus sistem dan metode pengembangan
yang digunakan.14 Penelitian Subowo dan Saputra lebih berfokus pada media
informasi dan komunikasi berbasis Android, sedangkan penelitian ini berfokus
13 I Putu Agus Eka Darma Udayana, I Gusti Agung Indrawan, and Bagus Kusuma Wijaya,
“Peningkatan Efektivitas Bisnis Pada Kelompok Peternakan Ayam Petelur Melalui Penerapan
Sistem Informasi,” Jurnal Pengabdian Masyarakat Bangsa 1, no. 8 (2023): 1494–1500.
14 Edy Subowo dan Meidika Saputra, “Sistem Informasi Peternakan Ayam Broiler di Kabupaten
Pekalongan Berbasis Web dan Android,” Jurnal Surya Informatika, Vol. 6, No. 1, 2019, hlm. 53.

17
pada sistem informasi manajemen produksi dan penjualan telur berbasis
website menggunakan metode Agile Scrum.
Penelitian oleh Murniawati, Susanto, dan Riadi (2024) mengembangkan
sistem informasi pengelolaan peternakan ayam pedaging berbasis website
menggunakan metode Waterfall. Sistem yang dihasilkan mampu membantu
pencatatan data operasional dan penyusunan laporan secara lebih efisien.15
Perbedaan penelitian ini terletak pada objek penelitian, ruang lingkup sistem,
dan metode pengembangan. Penelitian ini menggunakan metode Agile Scrum
dan berfokus pada pengelolaan produksi serta penjualan telur pada peternakan
ayam petelur.
Penelitian oleh Nelfira dkk. (2024) membahas sistem informasi
pengolahan data pada peternakan ayam merah petelur berbasis website.
Penelitian tersebut menunjukkan bahwa sistem informasi dapat mempercepat
pencatatan data dan mempermudah pemantauan stok serta penjualan16. Namun,
penelitian tersebut belum secara khusus menekankan integrasi manajemen
produksi dan penjualan telur menggunakan metode Agile Scrum.
Berdasarkan penelitian-penelitian terdahulu tersebut, dapat disimpulkan
bahwa sistem informasi telah banyak diterapkan pada bidang peternakan untuk
membantu pengelolaan data operasional. Namun, sebagian besar penelitian
masih berfokus pada aspek tertentu, seperti inventori, keuangan, media
informasi, atau penjualan secara terpisah. Selain itu, sistem yang
dikembangkan belum mengintegrasikan proses produksi, pengelolaan stok,
penjualan, pelanggan, pengeluaran operasional, dan pelaporan dalam satu
platform yang terpusat. Oleh karena itu, penelitian ini dilakukan untuk
merancang Sistem Informasi Manajemen Produksi dan Penjualan Telur
berbasis website yang mengintegrasikan seluruh proses operasional peternakan
dalam satu sistem serta menggunakan metode Agile Scrum guna menghasilkan
15 Mita Murniawati, Arief Susanto, and Aditya Akbar Riadi, “SISTEM INFORMASI
PENGELOLAAN PETERNAKAN AYAM ( STUDI KASUS PADA PETERNAKAN AYAM
BASIRON KUDUS )” 8, no. 1 (2024): 1200–1206.
16 Suryani and Anggraini, “Sistem Informasi Pengolahan Data Peternakan Ayam Merah Petelur
Pada Astipel Farm Berbasis Web.”

18
sistem yang lebih fleksibel dan sesuai dengan kebutuhan pengguna pada
Peternakan Rohmat Ayam Bangun Rejo.

19
BAB II
LANDASAN TEORI
A. Sistem Informasi Manajemen
Sistem Informasi Manajemen (SIM) merupakan sistem yang digunakan
untuk menyediakan informasi guna mendukung proses pengambilan
keputusan, koordinasi, pengendalian, analisis, dan pengelolaan data dalam
suatu organisasi. Sistem Informasi Manajemen membantu organisasi dalam
mengelola data operasional agar informasi yang dihasilkan menjadi lebih
cepat, akurat, dan terintegrasi.17 SIM menjadi salah satu komponen penting
dalam perkembangan teknologi informasi karena mampu membantu organisasi
mengurangi penggunaan sistem manual yang cenderung lambat dan rawan
kesalahan.
Armah dan Firdaus menjelaskan bahwa SIM merupakan perpaduan
antara sumber daya manusia, teknologi informasi, dan prosedur kerja yang
dirancang untuk menghasilkan informasi bagi kebutuhan manajemen
organisasi. Sistem tersebut digunakan untuk membantu proses pengumpulan,
pengolahan, penyimpanan, dan penyajian data sehingga informasi yang
dihasilkan dapat mendukung aktivitas operasional dan pengambilan keputusan
secara lebih efektif.18
Rismawati et al. menegaskan bahwa sistem informasi yang terintegrasi
memiliki peran penting dalam meningkatkan efisiensi operasional karena
mampu menyajikan data secara cepat, akurat, dan mudah diakses oleh
pengguna sistem. Dalam penelitian tersebut juga dijelaskan bahwa
keberhasilan penerapan sistem informasi dipengaruhi oleh kesiapan sumber
daya manusia dan dukungan manajemen dalam proses implementasi sistem.19
17 Kenneth C. Laudon dan Jane P. Laudon, Management Information Systems: Managing the
Digital Firm (Pearson Education, 2018), hlm. 12.
18Safira Armah and Rayyan Firdaus, "Konsep Dan Penerapan Sistem Informasi Manajemen,"
Jurnal Inovasi Manajemen, Kewirausahaan, Bisnis Dan Digital 1, no. 3 (2024): 50-56.
19Riris Rismawati et al., "Peran Sistem Informasi Dalam Meningkatkan Mutu Layanan
Pendidikan," Jurnal Tasinia 5, no. 7 (2024): 1099-1122.

20
Dalam konteks peternakan ayam petelur, Sistem Informasi Manajemen
dibutuhkan untuk membantu proses pencatatan produksi telur, pengelolaan
stok, penjualan, pengeluaran operasional, serta penyusunan laporan usaha.
Melalui sistem yang terintegrasi, seluruh data operasional dapat dikelola dalam
satu sistem sehingga pemilik peternakan dapat memantau kondisi usaha secara
lebih cepat, akurat, dan real-time. Penerapan sistem informasi manajemen pada
peternakan juga dapat membantu mengurangi kesalahan pencatatan manual
serta mempercepat proses penyusunan laporan operasional dan laporan laba
rugi.
B. Sistem Informasi Manajemen Produksi
Manajemen produksi merupakan bagian dari Sistem Informasi
Manajemen yang berfokus pada proses perencanaan, pengorganisasian,
pelaksanaan, dan pengendalian aktivitas produksi untuk menghasilkan produk
secara efektif dan efisien. Menurut Heizer dan Render, manajemen produksi
digunakan untuk mengatur seluruh sumber daya produksi agar proses
operasional dapat berjalan sesuai target yang ditentukan.20
Dalam konteks peternakan ayam petelur, manajemen produksi
mencakup pencatatan hasil produksi telur harian, pengelolaan data telur rusak,
pencatatan ayam mati, serta pengelolaan penggunaan pakan dan kebutuhan
operasional kandang. Pengelolaan data produksi yang baik sangat penting
karena berhubungan langsung dengan kondisi stok telur dan proses distribusi
hasil produksi.
Sistem informasi manajemen produksi dirancang agar setiap data
produksi yang diinput oleh karyawan dapat langsung menambah jumlah stok
telur secara otomatis. Integrasi antara data produksi dan data stok membantu
pemilik peternakan dalam memantau jumlah telur yang tersedia secara lebih
cepat, akurat, dan real-time sehingga proses pengambilan keputusan
operasional dapat dilakukan dengan lebih mudah.
Futri et al. menjelaskan bahwa pengelolaan peternakan ayam petelur
berbasis website membutuhkan sistem yang mampu mencatat data produksi
20 Jay Heizer dan Barry Render, Operations Management (United States: Pearson Education,
2014), hlm. 4.

21
harian secara akurat karena ketidaksesuaian data produksi dapat memengaruhi
keakuratan data stok yang siap didistribusikan.21 Selain itu, Herlambang,
Kusuma, dan Khoiri menyatakan bahwa keberhasilan usaha peternakan ayam
petelur sangat dipengaruhi oleh konsistensi pencatatan data pemeliharaan dan
produksi, karena data tersebut digunakan sebagai dasar evaluasi performa
kandang dan kondisi operasional peternakan.22
C. Sistem Informasi Manajemen Penjualan
Manajemen penjualan merupakan proses perencanaan, pengorganisasian,
pelaksanaan, dan pengendalian aktivitas penjualan untuk mencapai target
distribusi dan pendapatan organisasi. Menurut Kotler dan Keller, manajemen
penjualan digunakan untuk mengatur kegiatan penjualan agar proses distribusi
produk kepada pelanggan dapat berjalan secara efektif dan terstruktur.23
Dalam konteks penelitian ini, manajemen penjualan difokuskan pada
pengelolaan dan pemantauan distribusi telur kepada pelanggan tetap atau agen,
bukan sebagai sistem transaksi jual beli secara langsung. Fokus utama sistem
adalah membantu proses pencatatan distribusi telur, pengelolaan data
pelanggan, pencatatan retur penjualan, serta pengurangan stok otomatis setiap
kali terjadi distribusi.
Setiap data penjualan yang diinput ke dalam sistem akan secara otomatis
mengurangi jumlah stok telur yang tersedia dan terhubung langsung dengan
data pelanggan terkait. Mekanisme tersebut membantu membangun riwayat
distribusi yang terstruktur sehingga data stok dapat selalu sesuai dengan
kondisi nyata di lapangan tanpa perlu melakukan rekap manual. Selain itu,
pengelolaan pelanggan dalam sistem ini mencakup data identitas agen, riwayat
21 Resya Futri et al., “Pengembangan Sistem Informasi Manajemen Produksi Telur PT. Vega Nusa
Argita Berbasis Web ( Studi Kasus : Desa Watukebo Kecamatan Rogojampi Banyuwangi ),”
Jurnal Pengembangan Teknologi Informasi Dan Ilmu Komputer 4, no. 11 (2020): 4038–46.
22 Fajar Herlambang, Dicky Kusuma, dan Muhammad Khoiri, “Analisis Deskriptif Terhadap
Strategi Peningkatan Bisnis Peternakan Ayam Petelur,” TALENTA Conference Series: Energy and
Engineering (EE) 7, no. 1 (2024): 1–7Ayam Petelur et al., “Analisis Deskriptif Terhadap Strategi
Peningkatan Bisnis Peternakan TALENTA Conference Series Analisis Deskriptif Terhadap
Strategi Peningkatan Bisnis Peternakan Ayam Petelur” 7, no. 1 (2024): 1–7,
https://doi.org/10.32734/ee.v7i1.2211.
23 Philip Kotler dan Kevin Lane Keller, Marketing Management (United States: Pearson Education,
2016), hlm. 412.

22
distribusi, dan pencatatan retur penjualan untuk mempermudah proses
monitoring distribusi telur.
Suryani, Nelvira, dan Anggraini menjelaskan bahwa sistem informasi
berbasis website yang menyediakan fitur pelaporan otomatis dan pemantauan
stok secara real-time dapat membantu mempercepat proses distribusi dan
meminimalisir risiko kehilangan data operasional pada usaha peternakan.24
Dengan adanya sistem yang terintegrasi, proses pencatatan penjualan dan
pengelolaan stok dapat dilakukan secara lebih efektif, akurat, dan terstruktur.
D. Website
Website merupakan kumpulan halaman web yang saling terhubung dan
dapat diakses melalui jaringan internet menggunakan browser. Website
digunakan sebagai media penyampaian informasi dan pengelolaan data secara
online sehingga pengguna dapat mengakses sistem kapan saja dan dari mana
saja. Menurut Abdul Kadir, website merupakan sarana berbasis internet yang
digunakan untuk menyajikan informasi dalam bentuk teks, gambar, maupun
data yang saling terintegrasi.25
Dalam perkembangan sistem informasi, website menjadi salah satu
platform yang banyak digunakan karena memiliki tingkat aksesibilitas yang
tinggi dan dapat dioperasikan melalui berbagai perangkat tanpa memerlukan
instalasi tambahan. Karakteristik tersebut menjadikan website sangat sesuai
digunakan pada sistem informasi manajemen peternakan yang membutuhkan
akses data secara cepat dan fleksibel baik oleh pemilik maupun karyawan
peternakan.
Sistem yang dikembangkan dalam penelitian ini menggunakan website
dinamis, yaitu website yang mampu menampilkan data secara real-time
berdasarkan proses interaksi dengan basis data. Melalui website dinamis, data
produksi, stok, penjualan, pengeluaran, dan laporan operasional dapat
diperbarui secara otomatis sesuai aktivitas pengguna pada sistem.
Suharni, Susilowati, dan Pakusadewa menjelaskan bahwa website
berbasis sistem informasi mampu membantu proses penyampaian informasi
24 Suryani and Anggraini, “Sistem Informasi Pengolahan Data Peternakan Ayam Merah Petelur
Pada Astipel Farm Berbasis Web.”
25Abdul Kadir, Pengenalan Sistem Informasi Edisi Revisi (Yogyakarta: Andi Offset, 2014), hlm. 25.

23
dan pengelolaan data secara daring sehingga pengguna dapat mengakses sistem
tanpa batasan lokasi dan waktu.26 Selain itu, Sumantri, Setiawan, dan
Triwibowo menyatakan bahwa website berbasis basis data sangat efektif
digunakan pada sistem informasi manajemen karena mampu menyimpan,
mengolah, dan menampilkan data dalam jumlah besar secara otomatis sesuai
kebutuhan pengguna27.
Arthalia dan Prasetyo menjelaskan bahwa website merupakan media
berbasis internet yang dapat diakses oleh pengguna kapan saja dan dari
berbagai lokasi tanpa batasan geografis. Karakteristik tersebut menjadikan
website sebagai platform yang efektif untuk mendukung penyampaian
informasi dan pengelolaan data secara daring.28 Oleh karena itu, website dipilih
sebagai platform pengembangan sistem dalam penelitian ini karena mampu
mendukung kebutuhan aksesibilitas dan pengelolaan data operasional
peternakan secara lebih fleksibel dan terintegrasi.
E. Metode Agile Scrum
Agile merupakan metode pengembangan perangkat lunak yang
dilakukan secara iteratif dan inkremental dengan mengutamakan kolaborasi,
fleksibilitas, serta kemampuan beradaptasi terhadap perubahan kebutuhan
pengguna. Salah satu framework yang banyak digunakan dalam metode Agile
adalah Scrum. Menurut Scrum Guide (2020), Scrum merupakan framework
yang digunakan untuk mengembangkan, mengelola, dan memelihara produk
melalui proses pengembangan yang bersifat iteratif dan inkremental.
Dalam Scrum terdapat beberapa tahapan utama, yaitu Product Backlog,
Sprint Planning, Sprint, Sprint Review, dan Sprint Retrospective. Tahapan-
tahapan tersebut digunakan untuk mengelola proses pengembangan sistem
26Suharni, Eel Susilowati, and Fahrial Pakusadewa, "Perancangan Website Rumah Makan Ninik
Sebagai Media Promosi Menggunakan Unified Modelling Language," Jurnal Rekayasa Informasi
12, no. 1 (2023): 1-12.
27R Bagus Bambang Sumantri, Willy Setiawan, and Deny Nugroho Triwibowo, "Rancang Bangun
Aplikasi Media Jasa Desain Logo Dengan Metode Waterfall Berbasis Website," METHOMIKA:
Jurnal Manajemen Informatika & Komputerisasi Akuntansi 6, no. 2 (2022): 157-63.
28Ika Arthalia dan Rendi Prasetyo, “Penggunaan Website Sebagai Sarana Evaluasi Kegiatan
Akademik Siswa Di SMA Negeri 1 Punggur Lampung Tengah,” Jurnal Ilmu Komputer &
Informatika 1, no. 2 (2020).

24
secara terstruktur sehingga setiap fitur dapat dikembangkan, diuji, dan
dievaluasi secara bertahap.29
Atallah dan Mardi menjelaskan bahwa Agile Scrum menekankan
kolaborasi antara pengguna dan pengembang sehingga proses pengembangan
sistem dapat lebih mudah menyesuaikan perubahan kebutuhan pengguna
selama pengembangan berlangsung. Dengan pendekatan ini, sistem dapat
dikembangkan secara bertahap dan dievaluasi secara berkelanjutan sehingga
menghasilkan produk yang lebih sesuai dengan kebutuhan pengguna.30
Dalam penelitian ini, metode Agile Scrum digunakan karena
memungkinkan proses pengembangan Sistem Informasi Manajemen Produksi
dan Penjualan Telur berbasis website dilakukan secara bertahap, fleksibel, dan
terstruktur sesuai kebutuhan pengguna.
F. Peternakan Ayam Petelur
Peternakan ayam petelur merupakan usaha yang bergerak dalam bidang
produksi telur dengan proses operasional yang berlangsung secara
berkelanjutan setiap hari. Kegiatan operasional peternakan meliputi
pemeliharaan ayam, pemberian pakan, pencatatan hasil produksi telur,
pengelolaan stok, hingga distribusi telur kepada pelanggan atau agen.
Pengelolaan data operasional yang baik sangat dibutuhkan agar proses
produksi dan distribusi dapat berjalan secara efektif dan terkontrol.
Dalam peternakan ayam petelur, proses pencatatan data produksi
memiliki peran penting karena berhubungan langsung dengan kondisi stok dan
distribusi telur. Futri et al. menjelaskan bahwa pengelolaan peternakan ayam
petelur berbasis website membutuhkan sistem yang mampu mencatat data
produksi harian secara akurat karena ketidaksesuaian data produksi dapat
memengaruhi keakuratan stok telur yang siap didistribusikan.31
Tantangan utama yang sering dihadapi peternakan tradisional bukan
hanya pada proses budidaya ayam, tetapi juga pada pengelolaan data
29 Ken Schwaber dan Jeff Sutherland, The Scrum Guide (2020), hlm. 3.
30 Atallah and Mardi, “Penggunaan Metode Agile Scrum Pada Perancangan Sistem Informasi Surat
Izin Penelitian Di BAKESBANGPOL Lombok Tengah.”
31Resya Futri et al., "Pengembangan Sistem Informasi Manajemen Produksi Telur PT. Vega Nusa
Argita Berbasis Web (Studi Kasus : Desa Watukebo Kecamatan Rogojampi Banyuwangi)," Jurnal
Pengembangan Teknologi Informasi Dan Ilmu Komputer 4, no. 11 (2020): 4038-46.

25
operasional harian. Ma’ady et al. menyatakan bahwa permasalahan yang sering
terjadi pada peternakan tradisional meliputi pencatatan produksi yang kurang
akurat, kesulitan pemantauan operasional secara real-time, serta pengelolaan
pakan yang belum terstruktur akibat proses pencatatan manual.32 Kondisi
tersebut menyebabkan pemilik peternakan mengalami kesulitan dalam
memantau kondisi stok, penjualan, dan pengeluaran operasional secara cepat
dan akurat.
Berdasarkan kondisi tersebut, sistem informasi manajemen pada
penelitian ini dirancang untuk membantu proses pengelolaan operasional
peternakan secara terintegrasi. Alur operasional sistem dimulai dari proses
produksi telur harian yang dicatat oleh karyawan, kemudian data produksi akan
menambah jumlah stok telur secara otomatis. Selanjutnya telur didistribusikan
kepada pelanggan atau agen sehingga stok akan berkurang sesuai jumlah
penjualan. Selain itu, biaya pakan dan biaya operasional lainnya dicatat sebagai
pengeluaran dan seluruh data operasional akan diolah menjadi laporan serta
dashboard monitoring untuk membantu pemilik memantau kondisi usaha
secara lebih cepat dan real-time.
G. Teknologi Pendukung Sistem
Teknologi pendukung sistem merupakan perangkat lunak dan teknologi
yang digunakan dalam proses pengembangan Sistem Informasi Manajemen
Produksi dan Penjualan Telur berbasis website. Teknologi tersebut digunakan
untuk mendukung proses pembuatan, pengelolaan, dan pengoperasian sistem.
1. Laravel
Laravel merupakan framework PHP berbasis Model-View-Controller
(MVC) yang digunakan untuk membangun aplikasi web secara
terstruktur dan efisien. Laravel menyediakan berbagai fitur seperti
32Mochamad Nizar Palefi Ma'ady et al., "Pengembangan Budidaya Ayam Petelur Dengan
Pendekatan Smart Farming Pada Peternakan Ayam Desa Sarirogo Kabupaten Sidoarjo," Jurnal
Pengabdian Polinema Kepada Masyarakat 12, no. 2 (2025): 194-200.

26
routing, authentication, migration, dan ORM Eloquent yang membantu
mempercepat proses pengembangan aplikasi.33
2. PHP
PHP (Hypertext Preprocessor) merupakan bahasa pemrograman sisi
server (server-side scripting) yang digunakan untuk membangun
aplikasi web dinamis. PHP digunakan untuk mengelola proses bisnis
sistem, mengolah data, serta menghubungkan aplikasi dengan basis
data.34
3. MySQL
MySQL merupakan sistem manajemen basis data relasional (Relational
Database Management System) yang digunakan untuk menyimpan,
mengelola, dan memproses data pada sistem. MySQL dipilih karena
memiliki performa yang baik, mudah digunakan, dan mendukung
integrasi dengan PHP serta Laravel.
4. XAMPP
XAMPP merupakan perangkat lunak yang berfungsi sebagai web server
lokal yang terdiri dari Apache, MySQL, PHP, dan Perl. XAMPP
digunakan sebagai lingkungan pengembangan dan pengujian sistem
sebelum sistem diterapkan pada server yang sebenarnya.
5. Visual Studio Code
Visual Studio Code merupakan aplikasi editor kode sumber (source
code editor) yang digunakan dalam proses pengembangan sistem.
Visual Studio Code menyediakan berbagai fitur seperti syntax
highlighting, debugging, extension, dan integrasi Git yang membantu
meningkatkan produktivitas pengembang.
H. Unified Modeling Language (UML)
Unified Modeling Language (UML) merupakan bahasa pemodelan
standar yang digunakan dalam proses analisis dan perancangan sistem
perangkat lunak. UML digunakan untuk memvisualisasikan, merancang, dan
33 Dendy Kurniawan, Belajar Pemograman Web Dasar: HTML, CSS, & Javascript Untuk Pemula
(Semarang: Yayasan Prima Agus Teknik, 2021).
34 Pratiwi, A.D. (2023). Sistem Informasi Manajemen Keuangan Berbasis Web Menggunakan
Framework Laravel.

27
mendokumentasikan sistem agar lebih mudah dipahami oleh pengembang
maupun pengguna sistem. Menurut Rosa A.S dan M. Shalahuddin, UML
merupakan bahasa visual yang digunakan untuk menggambarkan sistem
perangkat lunak berbasis objek melalui berbagai jenis diagram yang
terstruktur.
UML membantu proses pengembangan sistem dengan menyediakan
representasi visual terhadap alur proses, struktur data, dan interaksi pengguna
pada sistem. Dengan adanya pemodelan menggunakan UML, proses
perancangan sistem dapat dilakukan secara lebih sistematis sehingga
memudahkan pengembang dalam memahami kebutuhan sistem sebelum tahap
implementasi dilakukan. 35
Dalam penelitian ini, UML digunakan sebagai alat bantu pemodelan
sistem yang mencakup beberapa diagram berikut:
1. Use Case Diagram
Use Case Diagram merupakan diagram UML yang digunakan
untuk menggambarkan hubungan antara pengguna (actor) dengan
sistem. Diagram ini menunjukkan fungsi-fungsi utama yang
tersedia pada sistem serta interaksi pengguna terhadap fitur yang
disediakan.
2. Activity Diagram
Activity Diagram merupakan diagram UML yang digunakan
untuk menggambarkan alur aktivitas atau proses kerja dalam
suatu sistem. Diagram ini menunjukkan urutan proses dari awal
hingga akhir sehingga memudahkan pemahaman terhadap aliran
kerja sistem.
3. Class Diagram
Class Diagram merupakan diagram UML yang digunakan untuk
menggambarkan struktur kelas pada sistem beserta hubungan
antar kelas tersebut. Diagram ini menunjukkan atribut, metode,
35 Rosa A.S dan M. Shalahuddin, Rekayasa Perangkat Lunak Terstruktur dan Berorientasi Objek
(Bandung: Informatika, 2018), hlm. 133.

28
dan relasi antar objek yang digunakan sebagai dasar dalam
perancangan perangkat lunak.
I. Pengujian Sistem
Pengujian sistem merupakan tahapan yang dilakukan untuk
memastikan bahwa sistem yang dikembangkan telah berjalan sesuai dengan
kebutuhan pengguna dan fungsi yang telah dirancang. Pengujian dilakukan
untuk menemukan kesalahan, memastikan kualitas sistem, serta mengetahui
tingkat kesesuaian sistem terhadap kebutuhan operasional pengguna. Dalam
penelitian ini, pengujian sistem dilakukan menggunakan metode Black Box
Testing dan User Acceptance Testing (UAT).
1. Black Box Testing
Black Box Testing merupakan metode pengujian perangkat
lunak yang dilakukan dengan menguji fungsi sistem tanpa melihat
struktur kode program di dalamnya. Pengujian dilakukan dengan
memberikan masukan (input) pada sistem dan mengamati keluaran
(output) yang dihasilkan untuk memastikan bahwa sistem berjalan
sesuai dengan kebutuhan pengguna. Menurut Pressman, Black Box
Testing digunakan untuk menemukan kesalahan pada fungsi sistem,
antarmuka, struktur data, serta performa perangkat lunak.36
Menurut Hendartie, Jayanti, dan Sutejo (2023), Black Box
Testing merupakan metode pengujian perangkat lunak yang
dilakukan dengan menguji fungsi sistem berdasarkan masukan
(input) dan keluaran (output) tanpa memperhatikan struktur atau
kode program yang digunakan.37
Metode ini digunakan untuk memastikan bahwa setiap fungsi pada
sistem dapat berjalan sesuai dengan kebutuhan pengguna dan
spesifikasi yang telah ditentukan. Oleh karena itu, Black Box
36 Roger S. Pressman, Software Engineering: A Practitioner’s Approach (New York: McGraw-Hill
Education, 2015), hlm. 597.
37 Hendartie, S. Jayanti, dan H. Sutejo, “Pengujian Aplikasi Menggunakan Metode Black Box
Testing,” Jurnal Sains Komputer dan Teknologi Informasi, 2023.

29
Testing digunakan untuk menguji kesesuaian fungsi sistem dengan
proses bisnis yang telah dirancang.
2. User Acceptance Testing (UAT)
User Acceptance Testing (UAT) merupakan metode
pengujian yang dilakukan oleh pengguna akhir (end user) untuk
memastikan bahwa sistem yang dikembangkan telah sesuai dengan
kebutuhan pengguna dan dapat digunakan dalam lingkungan
operasional sebenarnya. UAT dilakukan setelah sistem selesai
dikembangkan dan telah melalui pengujian fungsional.Tujuan
utama UAT adalah untuk mengetahui tingkat penerimaan pengguna
terhadap sistem yang dibangun, baik dari aspek kemudahan
penggunaan, kesesuaian fungsi, maupun manfaat sistem dalam
mendukung aktivitas operasional. Melalui pengujian ini, pengguna
dapat memberikan penilaian dan masukan terhadap sistem sebelum
diterapkan secara penuh. 38
Dalam penelitian ini, UAT dilakukan dengan melibatkan
pemilik dan karyawan Peternakan Rohmat Ayam Bangun Rejo
sebagai pengguna sistem. User Acceptance Testing (UAT)
dilakukan menggunakan kuesioner dengan skala Likert 1–5. Aspek
yang dinilai meliputi kemudahan penggunaan sistem, kemudahan
memahami tampilan sistem, kesesuaian fungsi sistem dengan
kebutuhan pengguna, kecepatan akses sistem, serta manfaat sistem
dalam membantu operasional peternakan. Hasil penilaian dihitung
dalam bentuk persentase untuk mengetahui tingkat penerimaan
pengguna terhadap sistem yang dikembangkan. Hasil pengujian
digunakan sebagai dasar evaluasi untuk mengetahui apakah Sistem
Informasi Manajemen Produksi dan Penjualan Telur berbasis
38 F. Zulkarnaini dkk., “User Acceptance Testing through Black Box Evaluation for Information
System,” bit-Tech Journal, Vol. 6, No. 2, 2023.

30
website telah sesuai dengan kebutuhan pengguna dan layak untuk
diterapkan pada operasional peternakan.

31
BAB III
METODE PENELITIAN
A. Tempat dan Waktu Penelitian
Penelitian ini mengambil objek pada Peternakan Rohmat Ayam milik
Bapak Rohmat yang berlokasi di Desa Sukanegara, Kecamatan Bangun Rejo,
Kabupaten Lampung Tengah, Provinsi Lampung. Kegiatan penelitian dimulai
pada bulan April 2026 dan dilaksanakan hingga proses penelitian selesai.
Dalam rentang waktu tersebut, peneliti melaksanakan berbagai tahapan
penelitian yang meliputi observasi lapangan, wawancara, dokumentasi, analisis
kebutuhan sistem, perancangan sistem, pengembangan sistem menggunakan
metode Agile Scrum, serta pengujian Sistem Informasi Manajemen Produksi
dan Penjualan Telur berbasis website.
1. Skala Usaha
Peternakan Rohmat Ayam termasuk dalam kategori usaha peternakan
skala menengah dengan aktivitas operasional yang meliputi produksi
telur, pengelolaan stok, dan penjualan telur kepada pelanggan atau agen.
Besarnya aktivitas produksi dan penjualan menyebabkan kebutuhan
pengelolaan data yang lebih terstruktur dan terintegrasi.
2. Proses Operasional
Proses operasional pada peternakan meliputi pencatatan hasil produksi
telur, pengelolaan stok telur, transaksi penjualan, serta pencatatan
pengeluaran operasional. Saat ini seluruh proses pencatatan masih
dilakukan secara manual menggunakan buku catatan dan nota fisik
sehingga sering menyebabkan keterlambatan laporan dan kesulitan
dalam memantau data produksi maupun penjualan secara real-time.
3. Fasilitas Penunjang
Peternakan dilengkapi dengan kandang ayam, gudang pakan, ruang
penyimpanan telur, dan area distribusi. Selain itu, terdapat tenaga kerja
yang bertugas pada bagian produksi dan penjualan. Namun, sistem
pengelolaan data operasional masih belum terkomputerisasi sehingga
diperlukan Sistem Informasi Manajemen Produksi dan Penjualan

32
berbasis website untuk membantu proses pengelolaan data secara lebih
efektif dan efisien.
B. Jenis Penelitian
Jenis penelitian yang digunakan dalam penelitian ini adalah penelitian
terapan (applied research), yaitu penelitian yang bertujuan untuk memberikan
solusi terhadap permasalahan nyata yang terjadi di lapangan. Permasalahan
tersebut terdapat pada proses manajemen produksi dan penjualan di Peternakan
Rohmat Ayam Bangun Rejo yang masih dilakukan secara manual
menggunakan buku catatan dan nota fisik. Kondisi tersebut menyebabkan
proses pencatatan data, pengelolaan stok, serta pembuatan laporan produksi
dan penjualan menjadi kurang efektif dan efisien. Oleh karena itu, penelitian
ini berfokus pada perancangan Sistem Informasi Manajemen Produksi dan
Penjualan berbasis website yang dapat digunakan secara langsung oleh pihak
peternakan untuk membantu pengelolaan operasional.
C. Metode Pengembangan Sistem
Metode pengembangan sistem yang digunakan dalam penelitian ini
adalah metode Agile Scrum. Agile Scrum merupakan metode pengembangan
perangkat lunak yang dilakukan secara bertahap dan berulang (iterative)
sehingga sistem dapat dikembangkan secara fleksibel sesuai kebutuhan
pengguna. Metode ini dipilih karena proses manajemen produksi dan
penjualan pada Peternakan Rohmat Ayam memiliki kebutuhan operasional
yang dapat berubah selama proses pengembangan sistem berlangsung.
Penggunaan metode Agile Scrum memungkinkan pengembangan
sistem dilakukan melalui beberapa tahapan sprint dalam waktu tertentu.
Setiap sprint menghasilkan bagian sistem yang dapat diuji dan dievaluasi
secara langsung oleh pengguna. Dengan demikian, apabila terdapat
perubahan kebutuhan atau perbaikan fitur, proses pengembangan dapat
dilakukan dengan lebih cepat dan terarah dibandingkan metode
pengembangan yang bersifat linier seperti Waterfall.

33
Dalam penelitian ini, metode Agile Scrum digunakan untuk
mengembangkan Sistem Informasi Manajemen Produksi dan Penjualan Telur
berbasis website yang meliputi fitur produksi, stok, penjualan, pelanggan,
laporan, dan dashboard. Seluruh proses pengembangan dilakukan secara
bertahap mulai dari identifikasi kebutuhan sistem, perancangan,
implementasi, hingga pengujian sistem agar sistem yang dihasilkan sesuai
dengan kebutuhan operasional Peternakan Rohmat Ayam.
Gambar 3.1 Alur Metode Agile Scrum
Sumber: Adaptasi peneliti berdasarkan Scrum Guide (2020)

34
Berikut penjelasan tahapan metode Agile Scrum yang digunakan dalam
penelitian ini:
1. Product Backlog
Tahap ini merupakan proses penyusunan daftar kebutuhan sistem
berdasarkan hasil observasi dan wawancara pada Peternakan Rohmat
Ayam. Daftar kebutuhan tersebut meliputi fitur produksi, stok, penjualan,
pelanggan, laporan, dan dashboard.
2. Sprint Planning
Tahap ini dilakukan untuk menentukan fitur yang akan dikerjakan pada
setiap sprint serta menentukan target pengerjaan sistem agar proses
pengembangan berjalan lebih terarah.
3. Sprint
Sprint merupakan proses pengembangan sistem dalam periode waktu
tertentu. Pada tahap ini dilakukan proses pembuatan fitur sistem sesuai
sprint backlog yang telah ditentukan.
4. Daily Scrum
Daily Scrum merupakan kegiatan evaluasi harian yang dilakukan selama
proses sprint berlangsung untuk memantau perkembangan pengerjaan
sistem dan mengidentifikasi hambatan yang terjadi.
5. Sprint Review
Tahap ini dilakukan untuk meninjau hasil pengembangan sistem pada
setiap sprint serta memastikan fitur yang dibuat telah sesuai dengan
kebutuhan pengguna.
6. Sprint Retrospective
Tahap ini dilakukan untuk mengevaluasi proses pengembangan sistem
agar sprint berikutnya dapat berjalan lebih baik dan lebih efektif.
7. Product Increment
Product Increment merupakan hasil pengembangan sistem yang telah
selesai dan dapat digunakan oleh pengguna sesuai fitur yang telah
dirancang.
Dalam framework Scrum terdapat beberapa peran utama yang
terlibat dalam proses pengembangan sistem, yaitu:

35
1. Product Owner
Product Owner bertanggung jawab menentukan kebutuhan sistem dan
prioritas fitur yang akan dikembangkan pada Product Backlog. Pada
penelitian ini, peran Product Owner dipegang oleh pemilik Peternakan
Rohmat Ayam yang memberikan kebutuhan sistem sesuai dengan proses
operasional peternakan.
2. Scrum Master
Scrum Master bertugas memastikan proses pengembangan berjalan
sesuai dengan framework Scrum, membantu mengatasi hambatan yang
muncul selama proses pengembangan, serta memastikan setiap sprint
berjalan sesuai dengan tujuan yang telah ditetapkan. Pada penelitian ini,
peran Scrum Master dilakukan oleh peneliti.
3. Development Team
Development Team bertanggung jawab melakukan proses perancangan,
implementasi, pengujian, dan dokumentasi sistem berdasarkan
kebutuhan yang telah ditentukan pada setiap sprint. Pada penelitian ini,
Development Team terdiri dari peneliti yang mengembangkan sistem
informasi sesuai dengan Product Backlog yang telah disusun.
Berdasarkan hasil observasi dan wawancara yang telah dilakukan pada
Peternakan Rohmat Ayam Bangun Rejo, diperoleh sejumlah kebutuhan sistem
yang akan dikembangkan. Kebutuhan tersebut kemudian disusun ke dalam
Product Backlog sebagai daftar fitur yang menjadi dasar pengembangan Sistem
Informasi Manajemen Produksi dan Penjualan Telur berbasis website. Adapun
Product Backlog yang digunakan dalam penelitian sebagai berikut:
Table 3.1 Product Backlog
No Fitur Sistem Deskripsi Prioritas
Karyawan dan pemilik dapat masuk ke
1 Login Sistem sistem sesuai hak akses masing-masing Tinggi
menggunakan username dan password.
Karyawan dapat mencatat hasil produksi
2 Kelola Data Produksi Tinggi
telur harian.

36
Sistem dapat menambah dan
3  Kelola Stok Telur  memperbarui stok telur berdasarkan hasil  Tinggi
produksi.
Pemilik dan karyawan dapat melihat
| 4  Informasi Stok  |     | Tinggi  |
| ------------------ | --- | ------- |
jumlah stok telur yang tersedia.
| Kelola Data        | Karyawan dapat mencatat data penjualan    |         |
| ------------------ | ----------------------------------------- | ------- |
| 5                  |                                           | Tinggi  |
| Penjualan          | telur yang telah dilakukan.               |         |
| Pengurangan Stok   | Sistem mengurangi stok secara otomatis    |         |
| 6                  |                                           | Tinggi  |
| Otomatis           | berdasarkan data penjualan yang dicatat.  |         |
| Kelola Data        | Karyawan dapat menambah, mengubah,        |         |
| 7                  |                                           | Sedang  |
| Pelanggan          | dan melihat data pelanggan atau agen.     |         |
| Kelola Data        | Karyawan dapat mencatat pengeluaran       |         |
| 8                  |                                           | Tinggi  |
| Pengeluaran        | operasional peternakan.                   |         |
| Laporan Produksi   | Pemilik dapat melihat dan mencetak        |         |
| 9                  |                                           | Tinggi  |
| Harian             | laporan produksi telur harian.            |         |
| Laporan Penjualan  | Pemilik dapat melihat dan mencetak        |         |
| 10                 |                                           | Tinggi  |
| Harian             | laporan penjualan harian.                 |         |
Pemilik dapat melihat dan mencetak
Laporan Laba Rugi
| 11  | laporan laba rugi bulanan berdasarkan  | Tinggi  |
| --- | -------------------------------------- | ------- |
Bulanan
data penjualan dan pengeluaran.
Pemilik dapat memantau informasi
Dashboard
| 12  | produksi, stok, penjualan, dan  | Tinggi  |
| --- | ------------------------------- | ------- |
Monitoring
pengeluaran melalui dashboard.

Berdasarkan  Product  Backlog  yang  telah  disusun,  proses
pengembangan  sistem  selanjutnya  dibagi  ke  dalam  beberapa  sprint.
Pembagian  sprint  dilakukan  untuk  mempermudah  proses  pengembangan
sistem secara bertahap sesuai dengan prioritas kebutuhan pengguna. Setiap
sprint memiliki target dan aktivitas yang berbeda sehingga fitur-fitur sistem
dapat dikembangkan secara terstruktur dan terukur. Adapun perencanaan
sprint pada penelitian ini:

37
Table 3.2 Sprint Planning
Sprint Durasi Aktivitas
Analisis kebutuhan sistem dan perancangan sistem
Sprint 1 1 Minggu (Diagram Alur Sistem yang Dirancang, Use Case
Diagram, Activity Diagram, dan Class Diagram)
Implementasi modul produksi telur dan
Sprint 2 2 Minggu
pengelolaan stok
Implementasi pengelolaan data penjualan telur,
Sprint 3 2 Minggu
data pelanggan, dan pengeluaran operasional
Implementasi dashboard, laporan produksi harian,
Sprint 4 2 Minggu laporan penjualan harian, laporan laba rugi
bulanan, serta pengujian sistem
Setiap sprint menghasilkan bagian sistem yang dapat diuji dan
dievaluasi sebelum melanjutkan ke sprint berikutnya. Dengan pembagian
sprint tersebut, proses pengembangan sistem diharapkan dapat berjalan lebih
efektif, terarah, dan sesuai dengan kebutuhan operasional Peternakan Rohmat
Ayam Bangun Rejo.
D. Prosedur Penelitian Pengembangan
Prosedur penelitian dalam penelitian ini menggunakan metode Agile
Scrum sebagai metode pengembangan sistem. Pengembangan sistem
dilakukan secara bertahap dan berulang (iterative) melalui beberapa sprint agar
sistem yang dibangun dapat menyesuaikan kebutuhan operasional Peternakan
Rohmat Ayam secara lebih fleksibel dan terarah.
1. Sprint 1 – Persiapan dan Analisis Kebutuhan (1 Minggu)
Sprint 1 merupakan tahap awal pengembangan sistem. Pada tahap
ini dilakukan analisis kebutuhan sistem melalui observasi dan wawancara
dengan pemilik peternakan dan pekerja kandang untuk mengidentifikasi
kebutuhan pengguna serta memahami proses bisnis yang berjalan pada
Peternakan Rohmat Ayam Bangun Rejo.

38
Hasil analisis kebutuhan digunakan sebagai dasar dalam
perancangan Sistem Informasi Manajemen Produksi dan Penjualan Telur.
Perancangan sistem dilakukan untuk memberikan gambaran mengenai
alur proses, kebutuhan fungsional, serta struktur data yang akan digunakan
dalam pengembangan sistem pada sprint berikutnya.
Sebagai hasil dari tahap perancangan, dibuat Diagram Alur Sistem
yang Dirancang untuk menggambarkan alur kerja sistem yang akan
dikembangkan. Diagram tersebut menunjukkan proses pengelolaan data
produksi, stok, penjualan, pelanggan, pengeluaran operasional, hingga
penyajian laporan yang terintegrasi dalam satu sistem. Diagram Alur
Sistem yang Dirancang
Gambar 3.2 Diagram Alur Sistem yang Dirancang
Selain itu, perancangan sistem juga dilakukan menggunakan Unified
Modeling Language (UML) yang terdiri dari Use Case Diagram, Activity
Diagram, dan Class Diagram.

39
a. Use Case Diagram
Use Case Diagram digunakan untuk menggambarkan hubungan
antara aktor dengan fungsi-fungsi yang terdapat pada sistem informasi
manajemen produksi dan penjualan telur. Diagram ini menunjukkan
aktivitas yang dapat dilakukan oleh pengguna sistem, yaitu pemilik dan
karyawan peternakan.
Gambar 3.3 Use Case Diagram Pengembangan Sistem
Berdasarkan Use Case Diagram tersebut, karyawan dapat
melakukan aktivitas pengelolaan data produksi telur, stok, penjualan,
pelanggan, pakan, serta pengeluaran operasional. Sementara itu,
pemilik peternakan memiliki akses untuk melihat laporan produksi,
laporan penjualan, laporan pengeluaran, laporan laba rugi, dan
dashboard monitoring. Diagram ini menunjukkan bahwa seluruh proses
operasional pada sistem saling terintegrasi sehingga dapat membantu
pengelolaan data secara lebih efektif, terstruktur, dan real-time.

40
b. Activity Diagram
Activity Diagram digunakan untuk menggambarkan alur proses
kerja sistem mulai dari proses produksi telur, pengelolaan stok, hingga
proses penjualan dan pembuatan laporan.
Gambar 3.4 Activity Diagram Pengembangan Sistem
Berdasarkan Activity Diagram tersebut, proses dimulai dari input
data produksi oleh karyawan yang kemudian secara otomatis menambah
jumlah stok telur. Selanjutnya, data penjualan yang diinput akan
mengurangi stok secara otomatis dan seluruh data operasional akan
ditampilkan ke dalam laporan serta dashboard monitoring.
c. Class Diagram
Class Diagram digunakan untuk menggambarkan struktur data dan
hubungan antar entitas pada sistem informasi manajemen produksi dan
penjualan telur.

41
Gambar 3.5 Class Diagram Pengembangan Sistem
Berdasarkan Class Diagram tersebut, sistem terdiri dari beberapa entitas
utama seperti pengguna, produksi, stok, penjualan, pelanggan,
pengeluaran, dan laporan yang saling terhubung untuk mendukung
proses pengelolaan data operasional peternakan secara terintegrasi.
Melalui modul ini, data produksi telur yang diinput oleh
karyawan akan secara otomatis menambah jumlah stok telur pada
sistem sehingga proses monitoring stok dapat dilakukan secara real-
time. Selain itu, sistem juga memberikan informasi apabila jumlah stok
mendekati batas minimum sehingga pemilik dapat segera mengambil
tindakan untuk menjaga kelancaran proses distribusi dan penjualan
telur.

42
2. Sprint 2 - Implementasi Modul Produksi Telur dan Pengelolaan
Stok (2 Minggu)
Sprint 2 dilaksanakan selama dua minggu pada bulan Juni 2026
dan berfokus pada implementasi modul produksi telur serta
pengelolaan stok. Pada tahap ini dilakukan pengembangan fitur untuk
mencatat data produksi telur harian dan mengelola data stok telur yang
tersedia di peternakan.Modul produksi dikembangkan untuk
memfasilitasi proses pencatatan hasil produksi telur secara
terkomputerisasi sehingga data produksi dapat tersimpan dengan lebih
rapi dan mudah diakses. Selain itu, modul pengelolaan stok
dikembangkan untuk membantu pengguna dalam memantau jumlah
persediaan telur yang tersedia berdasarkan data produksi yang telah
dicatat ke dalam sistem.
Hasil implementasi pada sprint ini kemudian dilakukan
pengujian untuk memastikan bahwa fungsi pencatatan produksi dan
pengelolaan stok dapat berjalan sesuai dengan kebutuhan yang telah
ditentukan pada tahap perancangan sistem.Pada akhir Sprint 2
dilakukan Sprint Review bersama pemilik Peternakan Rohmat Ayam
Bangun Rejo untuk mengevaluasi hasil implementasi modul produksi
telur dan pengelolaan stok. Selanjutnya, dilakukan Sprint Retrospective
untuk mengevaluasi proses pengembangan selama sprint berlangsung
serta mengidentifikasi perbaikan yang diperlukan sebagai persiapan
pada sprint berikutnya.
3. Sprint 3 – Implementasi Pengelolaan Data Penjualan Telur, Data
Pelanggan, dan Pengeluaran Operasional (2 Minggu)
Sprint 3 dilaksanakan selama dua minggu pada bulan Juli 2026
dan berfokus pada implementasi modul pengelolaan data penjualan
telur, data pelanggan, dan pengeluaran operasional. Pada tahap ini
dilakukan pengembangan fitur yang mendukung proses pencatatan
transaksi penjualan telur, pengelolaan data pelanggan, serta pencatatan
berbagai pengeluaran operasional peternakan.Modul penjualan

43
dikembangkan untuk memfasilitasi pencatatan transaksi penjualan
telur secara terkomputerisasi sehingga data penjualan dapat tersimpan
dengan lebih terstruktur dan mudah dikelola. Selain itu, modul
pelanggan dikembangkan untuk menyimpan dan mengelola informasi
pelanggan yang melakukan transaksi dengan peternakan.
Selanjutnya, modul pengeluaran operasional dikembangkan
untuk mencatat berbagai biaya yang dikeluarkan dalam kegiatan
operasional peternakan, seperti biaya pakan, obat dan vitamin, listrik,
transportasi, serta kebutuhan operasional lainnya. Seluruh data yang
dikelola pada modul ini disimpan ke dalam basis data sehingga dapat
digunakan sebagai sumber informasi pada proses pelaporan.Setelah
proses implementasi selesai, dilakukan pengujian untuk memastikan
bahwa fungsi pengelolaan data penjualan, data pelanggan, dan
pengeluaran operasional dapat berjalan sesuai dengan kebutuhan
sistem yang telah ditentukan pada tahap perancangan.
Pada akhir Sprint 3 dilakukan Sprint Review bersama pemilik
Peternakan Rohmat Ayam Bangun Rejo untuk mengevaluasi hasil
implementasi modul penjualan, pelanggan, dan pengeluaran
operasional. Selanjutnya dilakukan Sprint Retrospective untuk
mengevaluasi proses pengembangan selama sprint berlangsung serta
mengidentifikasi perbaikan yang diperlukan pada sprint berikutnya.
4. Sprint 4 - Implementasi Dashboard dan Laporan (2 Minggu)
Sprint 4 dilaksanakan selama dua minggu pada bulan juli 2026
dan berfokus pada implementasi dashboard serta fitur pelaporan yang
terdiri dari laporan produksi harian, laporan penjualan harian, dan
laporan laba rugi bulanan. Tahap ini bertujuan untuk menyediakan
informasi yang dapat digunakan oleh pemilik peternakan dalam
memantau kondisi operasional dan mendukung proses pengambilan
keputusan.Aktivitas yang dilakukan pada sprint ini meliputi
pengembangan dashboard monitoring, pembuatan laporan produksi
harian, laporan penjualan harian, serta laporan laba rugi bulanan

44
berdasarkan data yang telah tersimpan pada sistem. Dashboard
dirancang untuk menampilkan ringkasan informasi penting terkait
produksi, stok, penjualan, dan pengeluaran operasional secara
terintegrasi.
Selain itu, sistem dikembangkan agar mampu menghasilkan
laporan secara otomatis berdasarkan data yang telah diinput oleh
pengguna. Laporan produksi harian digunakan untuk menampilkan
informasi hasil produksi telur setiap hari, laporan penjualan harian
digunakan untuk menampilkan data transaksi penjualan yang terjadi,
sedangkan laporan laba rugi bulanan digunakan untuk memberikan
gambaran mengenai pendapatan, pengeluaran, serta hasil usaha dalam
satu periode.
Setelah seluruh fitur selesai diimplementasikan, dilakukan
pengujian sistem menggunakan metode Black Box Testing untuk
memastikan setiap fungsi pada sistem berjalan sesuai dengan
kebutuhan yang telah ditentukan. Pengujian dilakukan pada seluruh
modul yang telah dikembangkan, meliputi modul produksi, stok,
penjualan, pelanggan, pengeluaran operasional, dashboard, dan
laporan.
Selanjutnya dilakukan User Acceptance Testing (UAT)
bersama pemilik Peternakan Rohmat Ayam Bangun Rejo untuk
mengetahui tingkat kesesuaian sistem terhadap kebutuhan pengguna.
UAT dilakukan dengan cara menguji langsung fungsi-fungsi sistem
berdasarkan skenario penggunaan yang telah ditentukan. Hasil
pengujian digunakan sebagai dasar untuk melakukan penyempurnaan
sistem sebelum diterapkan dalam operasional peternakan.
Pada akhir Sprint 4 dilakukan Sprint Review untuk
mengevaluasi hasil pengembangan sistem secara keseluruhan.
Selanjutnya dilakukan Sprint Retrospective untuk mengevaluasi proses
pengembangan yang telah dilakukan pada setiap sprint serta
mengidentifikasi perbaikan yang dapat diterapkan pada pengembangan
sistem di masa mendatang.Output dari Sprint 4 berupa Sistem

45
Informasi Manajemen Produksi dan Penjualan Telur berbasis website
yang telah dilengkapi dengan dashboard monitoring, laporan produksi
harian, laporan penjualan harian, laporan laba rugi bulanan, serta telah
melalui proses pengujian Black Box Testing dan User Acceptance
Testing (UAT).
E. Subjek Uji Coba Penelitian
Subjek uji coba dalam penelitian ini adalah pemilik dan karyawan
Peternakan Rohmat Ayam Bangun Rejo yang terlibat langsung dalam kegiatan
operasional peternakan. Pemilik dan karyawan dipilih sebagai subjek uji coba
karena merupakan pengguna utama Sistem Informasi Manajemen Produksi dan
Penjualan Telur yang dikembangkan, sehingga dapat memberikan penilaian
terhadap fungsi dan kemudahan penggunaan sistem.
Uji coba sistem dilakukan menggunakan data operasional peternakan
yang meliputi data produksi telur, data stok, data penjualan, data pelanggan,
dan data pengeluaran operasional. Data tersebut digunakan untuk menguji
fungsi-fungsi sistem yang telah dikembangkan agar sesuai dengan kebutuhan
operasional peternakan.
Metode pengujian yang digunakan dalam penelitian ini adalah Black
Box Testing dan User Acceptance Testing (UAT). Black Box Testing
digunakan untuk menguji fungsionalitas sistem berdasarkan kesesuaian antara
masukan (input) dan keluaran (output) yang dihasilkan. Sementara itu, User
Acceptance Testing (UAT) dilakukan untuk mengetahui tingkat kesesuaian
sistem dengan kebutuhan pengguna serta memastikan bahwa sistem dapat
digunakan dengan baik dalam mendukung kegiatan operasional
peternakan.Hasil uji coba digunakan sebagai dasar evaluasi dan
penyempurnaan sistem sebelum diterapkan pada operasional Peternakan
Rohmat Ayam Bangun Rejo.

46
F. Instrumen Penelitian
1. Metode Pengumpulan Data
Metode pengumpulan data dilakukan untuk memperoleh informasi yang
dibutuhkan dalam pengembangan Sistem Informasi Manajemen Produksi
dan Penjualan Telur berbasis website pada Peternakan Rohmat Ayam
Bangun Rejo. Data yang diperoleh digunakan sebagai dasar dalam analisis
kebutuhan, perancangan, pengembangan, dan pengujian sistem.
a. Observasi
Observasi dilakukan secara langsung di Peternakan Rohmat Ayam
Bangun Rejo untuk mengetahui kondisi operasional peternakan dan
proses bisnis yang sedang berjalan. Melalui observasi ini, peneliti
memperoleh gambaran mengenai proses produksi telur, pengelolaan
stok, penjualan telur, serta penyusunan laporan operasional. Hasil
observasi digunakan sebagai dasar dalam menentukan kebutuhan
sistem yang akan dikembangkan.
b. Wawancara
Wawancara dilakukan dengan pemilik dan karyawan Peternakan
Rohmat Ayam Bangun Rejo untuk memperoleh informasi mengenai
kebutuhan pengguna, permasalahan yang dihadapi dalam
pengelolaan data, serta harapan terhadap sistem yang akan
dikembangkan. Hasil wawancara digunakan sebagai bahan analisis
kebutuhan sistem.
c. Studi Pustaka
Studi pustaka dilakukan dengan mempelajari berbagai sumber
referensi, seperti buku, jurnal ilmiah, artikel, dan penelitian
terdahulu yang berkaitan dengan sistem informasi, sistem berbasis
website, manajemen produksi dan penjualan, serta metode Agile
Scrum. Studi pustaka bertujuan untuk memperoleh landasan teori
yang mendukung penelitian.
d. Dokumentasi
Dokumentasi dilakukan dengan mengumpulkan data dan dokumen
yang berkaitan dengan operasional Peternakan Rohmat Ayam

47
Bangun Rejo. Dokumentasi yang dikumpulkan meliputi data
produksi telur, data stok, data penjualan, data pelanggan, data
pengeluaran operasional, serta dokumen pendukung lainnya. Data
dokumentasi digunakan untuk melengkapi hasil observasi dan
wawancara sehingga proses analisis kebutuhan sistem dapat
dilakukan secara lebih akurat.
2. Instrumen Pengujian Sistem
Instrumen pengujian digunakan untuk mengukur keberhasilan fungsi
sistem dan mengetahui kesesuaian sistem dengan kebutuhan pengguna.
Instrumen yang digunakan dalam penelitian ini meliputi instrumen Black
Box Testing dan User Acceptance Testing (UAT).
a. Instrumen Black Box Testing
Instrumen Black Box Testing berupa skenario pengujian yang
digunakan untuk menguji setiap fungsi yang terdapat pada sistem.
Pengujian dilakukan dengan memeriksa kesesuaian antara masukan
(input) dan keluaran (output) yang dihasilkan oleh sistem tanpa
melihat kode program yang digunakan. Pengujian dilakukan pada
seluruh fitur sistem untuk memastikan bahwa setiap fungsi dapat
berjalan sesuai dengan kebutuhan yang telah ditentukan.
b. Instrumen User Acceptance Testing (UAT)
Instrumen User Acceptance Testing (UAT) berupa lembar pengujian
yang digunakan oleh pemilik dan karyawan Peternakan Rohmat
Ayam Bangun Rejo sebagai pengguna sistem. Pengujian dilakukan
dengan mencoba secara langsung fitur-fitur yang tersedia pada
sistem dan memberikan penilaian terhadap kesesuaian fungsi sistem
dengan kebutuhan operasional peternakan. Hasil UAT digunakan
untuk mengetahui apakah sistem yang dikembangkan telah
memenuhi kebutuhan pengguna dan layak digunakan dalam
kegiatan operasional peternakan.

48
G. Uji Coba Produk
Uji coba produk dilakukan untuk mengetahui apakah Sistem Informasi
Manajemen Produksi dan Penjualan Telur berbasis website yang
dikembangkan telah berjalan sesuai dengan kebutuhan operasional Peternakan
Rohmat Ayam Bangun Rejo. Tahap uji coba dilakukan setelah proses
pengembangan sistem selesai agar seluruh fitur yang tersedia dapat diperiksa
dan digunakan secara langsung oleh pengguna sistem, yaitu pemilik dan
karyawan peternakan.
Pada tahap ini, pengguna melakukan pengujian terhadap fitur-fitur utama
sistem, seperti proses login, pencatatan produksi telur harian, pengelolaan stok
telur, pencatatan transaksi penjualan, pengelolaan data pelanggan, pencatatan
pengeluaran operasional, serta pembuatan laporan produksi dan penjualan.
Selain itu, dilakukan juga pengujian terhadap dashboard sistem untuk
memastikan informasi operasional dapat ditampilkan dengan baik dan mudah
dipahami oleh pengguna.
Metode pengujian yang digunakan dalam penelitian ini adalah Black
Box Testing dan User Acceptance Testing (UAT). Black Box Testing
dilakukan dengan memeriksa fungsi sistem berdasarkan masukan (input) dan
keluaran (output) tanpa melihat kode program yang digunakan. Melalui metode
ini, setiap fitur diuji untuk memastikan bahwa sistem dapat berjalan sesuai
dengan kebutuhan dan alur operasional yang telah dirancang sebelumnya.
Selain Black Box Testing, dilakukan juga User Acceptance Testing
(UAT) yang melibatkan pemilik dan karyawan Peternakan Rohmat Ayam
Bangun Rejo sebagai pengguna sistem. UAT dilakukan untuk mengetahui
tingkat kesesuaian sistem dengan kebutuhan operasional peternakan serta
memastikan bahwa sistem dapat digunakan dengan baik oleh pengguna.
Pengujian dilakukan dengan mencoba secara langsung seluruh fitur sistem dan
memberikan penilaian berdasarkan pengalaman penggunaan selama proses uji
coba.Selain pengujian fungsional sistem, dilakukan juga uji coba
menggunakan data produksi dan penjualan yang terdapat pada Peternakan
Rohmat Ayam Bangun Rejo. Uji coba ini bertujuan untuk mengetahui tingkat

49
keakuratan pencatatan data, kemudahan penggunaan sistem, serta kesesuaian
sistem terhadap aktivitas operasional peternakan sehari-hari.
Hasil dari tahap uji coba produk berupa laporan hasil pengujian yang
mencakup tingkat keberhasilan fungsi sistem, kendala yang ditemukan selama
pengujian, serta masukan dari pengguna sistem. Hasil pengujian tersebut
digunakan sebagai dasar dalam melakukan perbaikan dan penyempurnaan
sistem sebelum sistem diterapkan pada operasional Peternakan Rohmat Ayam
Bangun Rejo.
H. Teknik Analisis Data
Teknik analisis data dalam penelitian ini dilakukan untuk mengevaluasi
hasil pengembangan Sistem Informasi Manajemen Produksi dan Penjualan
Telur berbasis website pada Peternakan Rohmat Ayam Bangun Rejo. Analisis
data dilakukan terhadap data yang diperoleh dari hasil observasi, wawancara,
dokumentasi, Black Box Testing, dan User Acceptance Testing (UAT).
Data hasil observasi, wawancara, dan dokumentasi dianalisis secara
deskriptif untuk mengidentifikasi kebutuhan pengguna, permasalahan yang
terjadi pada sistem yang sedang berjalan, serta kebutuhan fungsional sistem
yang akan dikembangkan. Hasil analisis tersebut digunakan sebagai dasar
dalam proses perancangan dan pengembangan sistem.
Analisis juga dilakukan terhadap hasil pengujian menggunakan
metode Black Box Testing. Pengujian ini bertujuan untuk mengetahui apakah
setiap fungsi yang terdapat pada sistem dapat berjalan sesuai dengan kebutuhan
yang telah ditentukan. Hasil pengujian dianalisis berdasarkan kesesuaian antara
hasil yang diharapkan dengan hasil yang diperoleh pada saat sistem dijalankan.
Selain itu, analisis dilakukan terhadap hasil User Acceptance Testing (UAT)
yang melibatkan pemilik dan karyawan Peternakan Rohmat Ayam Bangun
Rejo sebagai pengguna sistem. Hasil UAT digunakan untuk mengetahui
tingkat kesesuaian sistem dengan kebutuhan operasional peternakan serta
penerimaan pengguna terhadap sistem yang telah dikembangkan.

50
Hasil analisis data digunakan sebagai dasar untuk menilai kualitas dan kelayakan
sistem sebelum diterapkan pada operasional Peternakan Rohmat Ayam Bangun
Rejo.

51
DAFTAR RUJUKAN
Abtokhi, Ahmad, Hisyam Fahmi, dan Wina Permana Sari. "The Efficiency of
Scrum Model for Developing Research and Publication Management
Systems in Indonesia." International Journal of Computing and Digital
Systems 1, no. 1 (2023).
Armah, Safira, dan Rayyan Firdaus. "Konsep Dan Penerapan Sistem Informasi
Manajemen." Jurnal Inovasi Manajemen, Kewirausahaan, Bisnis Dan
Digital 1, no. 3 (2024): 50–56.
Arthalia, Ika, dan Rendi Prasetyo. "Penggunaan Website Sebagai Sarana Evaluasi
Kegiatan Akademik Siswa Di SMA Negeri 1 Punggur Lampung Tengah."
Jurnal Ilmu Komputer & Informatika 1, no. 2 (2020).
Atallah, Nico Abrarsyah, dan Mardi. "Penggunaan Metode Agile Scrum Pada
Perancangan Sistem Informasi Surat Izin Penelitian Di BAKESBANGPOL
Lombok Tengah." Neptunus: Jurnal Ilmu Komputer Dan Teknologi
Informasi 2, no. 3 (2024): 371–84.
Dhafa, Muhammad, dkk. "Pemodelan Sistem Informasi Penjualan Berbasis Web
Pada Usaha Ternak Heli Farm Menggunakan Metode Waterfall." 4, no. 3
(2024).
Futri, Resya, dkk. "Pengembangan Sistem Informasi Manajemen Produksi Telur
PT. Vega Nusa Argita Berbasis Web (Studi Kasus: Desa Watukebo
Kecamatan Rogojampi Banyuwangi)." Jurnal Pengembangan Teknologi
Informasi Dan Ilmu Komputer 4, no. 11 (2020): 4038–46.

52
Hadiwinata, Septian Nur. "Rancang Bangun Sistem Informasi Manajemen
Penjualan Kopi Pada Coffee Shop Konamu Menggunakan Sistem Point Of
Sale." 8, no. 2 (t.t.): 1–10.
Hasan, A. R., Chotimah, C., & Junaris, I. (2023). "Analisis Metode Perancangan
Sistem Informasi Akademik Berbasis Web: Systematic Literature Review."
Jurnal Manajemen Mutu Pendidikan 11, no. 2 (2023).
Heizer, Jay, dan Barry Render. Operations Management. United States: Pearson
Education, 2014.
Hendartie, S., S. Jayanti, dan H. Sutejo. "Pengujian Aplikasi Menggunakan Metode
Black Box Testing." Jurnal Sains Komputer dan Teknologi Informasi
(2023).
Herlambang, Fajar, Dicky Kusuma, dan Muhammad Khoiri. "Analisis Deskriptif
Terhadap Strategi Peningkatan Bisnis Peternakan Ayam Petelur."
TALENTA Conference Series: Energy and Engineering (EE) 7, no. 1
(2024): 1–7. https://doi.org/10.32734/ee.v7i1.2211.
Kadir, Abdul. Pengenalan Sistem Informasi Edisi Revisi. Yogyakarta: Andi Offset,
2014.
Kotler, Philip, dan Kevin Lane Keller. Marketing Management. United States:
Pearson Education, 2016.
Kurniawan, Dendy. Belajar Pemograman Web Dasar: HTML, CSS, & Javascript
Untuk Pemula. Semarang: Yayasan Prima Agus Teknik, 2021.

53
Laudon, Kenneth C., dan Jane P. Laudon. Management Information Systems:
Managing the Digital Firm. Pearson Education, 2018.
Ma'ady, Mochamad Nizar Palefi, dkk. "Pengembangan Budidaya Ayam Petelur
Dengan Pendekatan Smart Farming Pada Peternakan Ayam Desa Sarirogo
Kabupaten Sidoarjo." Jurnal Pengabdian Polinema Kepada Masyarakat 12,
no. 2 (2025): 194–200.
Mertha, Petelur, dkk. "PKM Pemberdayaan Kelompok Peternak Ayam." 6 (2025):
153–64. https://doi.org/10.36733/jadma.v6i2.12401.
Murniawati, Mita, Arief Susanto, dan Aditya Akbar Riadi. "Sistem Informasi
Pengelolaan Peternakan Ayam (Studi Kasus Pada Peternakan Ayam
Basiron Kudus)." 8, no. 1 (2024): 1200–1206.
Nilam, Shinta, dan Sari Muslim. "Implementasi Sistem Informasi Berbasis Web
Untuk Optimalisasi Operasional Pada UMKM Krupuk Singkong Nusantara
Putra." 2, no. 3 (2024): 287–96.
Pratiwi, A. D. "Sistem Informasi Manajemen Keuangan Berbasis Web
Menggunakan Framework Laravel." 2023.
Pressman, Roger S. Software Engineering: A Practitioner's Approach. New York:
McGraw-Hill Education, 2015.
Rismawati, Riris, dkk. "Peran Sistem Informasi Dalam Meningkatkan Mutu
Layanan Pendidikan." Jurnal Tasinia 5, no. 7 (2024): 1099–1122.
Rosa, A.S., dan M. Shalahuddin. Rekayasa Perangkat Lunak Terstruktur dan
Berorientasi Objek. Bandung: Informatika, 2018.

54
Schwaber, Ken, dan Jeff Sutherland. The Scrum Guide. 2020.
Subowo, Edy, dan Meidika Saputra. "Sistem Informasi Peternakan Ayam Broiler
di Kabupaten Pekalongan Berbasis Web dan Android." Jurnal Surya
Informatika 6, no. 1 (2019): 53–65.
Suharni, Eel Susilowati, dan Fahrial Pakusadewa. "Perancangan Website Rumah
Makan Ninik Sebagai Media Promosi Menggunakan Unified Modelling
Language." Jurnal Rekayasa Informasi 12, no. 1 (2023): 1–12.
Sumantri, R. Bagus Bambang, Willy Setiawan, dan Deny Nugroho Triwibowo.
"Rancang Bangun Aplikasi Media Jasa Desain Logo Dengan Metode
Waterfall Berbasis Website." METHOMIKA: Jurnal Manajemen
Informatika & Komputerisasi Akuntansi 6, no. 2 (2022): 157–63.
Suryani, Ade Irma, dan Indah Anggraini. "Sistem Informasi Pengolahan Data
Peternakan Ayam Merah Petelur Pada Astipel Farm Berbasis Web." 8, no.
4 (2024): 1090–1102.
Tim Penulis Universitas Pelita Harapan. "Pengembangan Dan Penelitian Sistem
Informasi Manajemen Produksi (Mitra: PT. Maju Bersama Persada Dayamu
(MBPD) Tangerang)." 1, no. 1 (2022): 37–47.
Udayana, I Putu Agus Eka Darma, I Gusti Agung Indrawan, dan Bagus Kusuma
Wijaya. "Peningkatan Efektivitas Bisnis Pada Kelompok Peternakan Ayam
Petelur Melalui Penerapan Sistem Informasi." Jurnal Pengabdian
Masyarakat Bangsa 1, no. 8 (2023): 1494–1500.

55
Yoraeni, Ani, dkk. Sistem Informasi Manajemen. Bandung: Widina Bhakti Persada
Bandung, 2023.
Zulkarnaini, F., dkk. "User Acceptance Testing through Black Box Evaluation for
Information System." bit-Tech Journal 6, no. 2 (2023).