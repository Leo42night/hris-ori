# Tools for Developer
# Mengambil semua file PHP berdasarkan path yang diinputkan, lalu mencari file tersebut di folder[]. 
# Jika ditemukan, file akan dipindahkan ke folder nama_folder/.
import os
import re
import shutil

def scan_php_files(file_path):
    """Membaca file dan mencari semua file dengan ekstensi .php"""
    with open(file_path, "r", encoding="utf-8") as file:
        content = file.read()
    return list(set(re.findall(r'\b[\w/-]+\.php\b', content)))

def move_files(php_files, source_dirs, destination_dir):
    """Memindahkan file dari folder sumber jika ditemukan ke folder tujuan"""
    os.makedirs(destination_dir, exist_ok=True)
    moved_files = []
    
    for php_file in php_files:
        for source_dir in source_dirs:
            source_path = os.path.join(source_dir, php_file)
            destination_path = os.path.join(destination_dir, php_file)
            
            if os.path.exists(source_path):
                shutil.move(source_path, destination_path)
                moved_files.append(php_file)
                break  # Jika sudah ditemukan di satu folder, hentikan pencarian
    
    return moved_files

# Input path file
file_path = "./views/tabs/kepegawaian/master.php"
source_dirs = ["./unsorted-n-backup/", "./unsorted-n-backup/sipeg/","./api/","./api/kepegawaian/"]
destination_dir = "./api/kepegawaian/master/"

# Scan file PHP dan pindahkan jika ditemukan
php_files = scan_php_files(file_path)
moved_files = move_files(php_files, source_dirs, destination_dir)

# Output hasil
print("File yang dipindahkan:")
print("\n".join(moved_files) if moved_files else "Tidak ada file yang ditemukan dan dipindahkan.")
