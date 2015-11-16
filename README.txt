16 November 2015
Tugas 2 PPW
George Albert - 1406569781

- [Jika akan diupload di kawung] maka cara mengakses Tugas 2 adalah kawung.cs.ui.ac.id/~george.albert/tugas2 atau kawung.mhs.cs.ui.ac.id/~george.albert/tugas2

- Agar bisa dijalankan, perlu di localhost seperti XAMPP.

- Bentuk database yang digunakan sama dengan template di scele, yang juga disertakan dalam .zip ini dengan nama "Tugas3_DB.sql"

- Untuk menyesuaikan dengan database yang digunakan, silahkan edit halaman 'php/database.php', yang bisa dikatakan merupakan config. Database default yang digunakan bernama 'ppw', untuk menggantinya tinggal perlu mengganti variable $dbname.

- Halaman yang diimplementasikan fitur komentar yang disimpan di database adalah halaman guestbook yang baru, yaitu di 'pages/guestbook.php', atau kawung.cs.ui.ac.id/~george.albert/tugas2/pages/guestbook.php

- Halaman yang menghandle baik fitur login dan register adalah 'pages/login.php', untuk logout ada di 'pages/logout.php'

- Halaman-halaman selain halaman-halaman utama (terutama yang berextension .html) tidak diimplementasikan untuk fitur 'required login', karena memang juga seharusnya tidak dapat dijangkau kecuali pengguna mengetahui direct linknya.

------

- Code yang dipakai untuk source code berasal dari:

- contoh2 di scele PPW 
- w3schools bagian PHP validation (contoh: http://www.w3schools.com/php/php_form_url_email.asp) - beberapa pertanyaan stack overflow 
- code dari www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html tidak jadi digunakan tetapi membantu untuk memahami fungsi-fungsi yang diperlukan.
- API PHP