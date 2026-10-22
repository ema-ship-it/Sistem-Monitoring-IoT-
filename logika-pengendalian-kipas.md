Perancangan Logika Pengendalian Kipas

1. Tujuan

Merancang logika pengendalian kipas berdasarkan suhu ruangan pada sistem monitoring dan pengendalian ruangan berbasis Internet of Things (IoT).

2. Pengendalian Otomatis

Sistem membaca suhu ruangan melalui sensor.

Kipas menyala apabila suhu mencapai atau melebihi batas suhu yang ditentukan.

Kipas mati apabila suhu berada di bawah batas yang ditentukan.

Batas suhu ditetapkan berdasarkan kebutuhan dan hasil pengujian sistem.

3. Pengendalian Manual

Pengguna dapat menyalakan kipas melalui tombol ON pada antarmuka sistem.

Pengguna dapat mematikan kipas melalui tombol OFF pada antarmuka sistem.

Sistem menjalankan perintah sesuai pilihan pengguna ketika mode manual digunakan.

4. Alur Pengendalian

Sistem mulai berjalan.

Sensor membaca suhu ruangan.

Sistem memeriksa mode pengendalian.

Jika mode otomatis aktif, sistem membandingkan suhu dengan batas yang ditentukan.

Kipas menyala jika suhu mencapai atau melebihi batas; jika tidak, kipas mati.

Jika mode manual aktif, sistem mengikuti perintah ON atau OFF dari pengguna.

Proses pemantauan diulangi selama sistem beroperasi.

5. Kriteria Penerimaan

Diagram alir pengendalian kipas tersedia.

Kondisi kipas menyala dan mati ditentukan.

Pengendalian otomatis dan manual terdokumentasi.