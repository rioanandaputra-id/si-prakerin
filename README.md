# Persiapan
- install xampp atau laragon [https://www.apachefriends.org/download.html] atau [https://laragon.org/download/index.html]
- install composer [https://getcomposer.org/Composer-Setup.exe]
- install git [https://github.com/git-for-windows/git/releases/download/v2.37.0.windows.1/Git-2.37.0-64-bit.exe]

# Jalankan project
- aktifkan xampp atau laragon
- buat database baru beri nama 'db_siprakerin'
- kemudian buka folder 'C:\xampp\htdocs' (jika pakai xampp) atau buka folder 'C:\laragon\www' (jika pakai laragon)
- klik kanan pilih 'git bash here'
- jalankan perintah berikut ber-urutan
- 'git clone https://github.com/rioanandaputra-id/si-prakerin.git'
- 'cd si-prakerin'
- 'composer install'
- 'php spark migrate'
- 'php spark db:seed' kemudian ketik 'AllSeeder'
- 'php spark serve'
- buka browser ketik 'http://localhost:8080/login'
- username & password default -> admin::admin | mahasiswa1::mahasiswa1 | mahasiswa2:mahasiswa2 | dosen:dosen