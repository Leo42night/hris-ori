# Original project for HRIS
- using PHP Native
- For developer of new version, migrate to [Laravel](https://github.com/ikhsanhmr/hris_backend)
- Real Sites: https://hris.sintech.co.id/ 

## How to use
- Requirement: Local Server & MySQL Database (simple use Laragon or XAMPP)
- Procedure:
  - prepare database in `database/hrisori.sql`, (bersama 2 file .sql backup jika struktur table yang dipanggil berbeda (2 file backup tidak perlu di jalankan, hanya untuk cadangan apabila tidak ada tabel ditemukan atau struktur kolom tabel berbeda))
  - `composer install`
    - Jika Menggunakan composer install tidak berhasil bisa menggunakan perintah `composer install --ignore-platform-reqs`
  - running localhost server 

## Konfigurasi for next Developers
- `unsorted-n-backup/` isinya file yang belum tau apakah dipakai atau tidak, opsi peletakkan nya berada di pilihan tampilan atau api di bawah ⬇️
- `views/[menu_name]` files EasyUI Tree untuk list sub menu.
- `views/tabs/[menu_name]` isian konten file yang dipanggil
- `api/[menu_name]/` file CRUD (`get_`,`create_`,`update_`,`destroy_`) untuk dipanggil oleh query EasyUI