<?php 
include '../config/layout.php'; 
include '../config/Database.php';

include '../object/Kategori.php';
include '../object/Penerbit.php';

$database = new Database();
$db = $database->getConnection();

$kategori = new Kategori($db);
$penerbit = new Penerbit($db);

$dataKategori = $kategori->readAll();
$dataPenerbit = $penerbit->readAll();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="mb-4 text-xl font-bold text-black-900 dark:text-black">Tambah Buku</h2>
        <form action="proses-tambah.php" method="POST">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="isbn" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ISBN" required="">
                </div>
                <div class="w-full">
                    <label for="" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Judul</label>
                    <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Judul Buku" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Pengarang" required="">
                </div>
                <form class="w-full">
                <div>
                    <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="kategori_id" name="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pilih Kategori">
                        <?php
                        while ($row = $dataKategori->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                        ?>
                            <option value="<?= $ID ?>"><?= $NamaKategori ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="penerbit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                    <select id="penerbit_id" name="penerbit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pilih Penerbit">
                        <?php
                        while ($row = $dataPenerbit->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                        ?>
                            <option value="<?= $ID ?>"><?= $NamaPenerbit ?></option>
                        <?php
                        
                        }
                        ?>
                        
                    </select>
                    
                </div>
                </form>
                <div class="sm:col-span-2">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi Buku" required=""></textarea>
                </div>
                <div class="w-full">
                    <label for="stok" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Stok</label>
                    <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jumlah Stok" required="">
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <button type="button" onclick="history.back()" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>