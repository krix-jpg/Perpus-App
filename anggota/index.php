<?php
include '../config/layout.php';
include '../config/Database.php';
include '../object/Anggota.php';

$database = new Database();
$db = $database->getConnection();

$anggota = new Anggota($db);

//ambil data anggota
$result = $anggota->readAll();
$num = $result->rowCount();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-4xl font-extrabold dark:text-gray">Data Anggota</h2>
            <a href="form-tambah.php" class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus: ring-4 focus: outline-none focus: ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-grey-700 dark: focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23" fill="currentColor" class="w-3.5 h-3.5 me-2">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                </svg>
                Tambah          
    
        <?php
            if ($num > 0) {
                
            }
        ?>
            </a>
    </div>
    <div class="relative overflow-x-auto mt-3 shadow-md">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-white bg-blue-800 border-b border-blue-800 dark:bg-gray-800 dark:border-blue-800">
                                            No.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-white bg-blue-800 border-b border-blue-800 dark:bg-gray-800 dark:border-blue-800">
                                            Nama lengkap
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-white bg-blue-800 border-b border-blue-800 dark:bg-gray-800 dark:border-blue-800">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-white bg-blue-800 border-b border-blue-800 dark:bg-gray-800 dark:border-blue-800">
                                            No. Telepon
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-white bg-blue-800 border-b border-blue-800 dark:bg-gray-800 dark:border-blue-800">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
        <?php
        $no = 1;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
        ?>
        <tbody>
            <tr class="bg-white border-b dark:bg-white-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                    <?= $no ?>
                </th>
                <td class="px-6 py-4">
                    <?= $NamaLengkap ?>
                </td>
                <td class="px-6 py-4">
                    <?= $Alamat ?>
                </td>
                <td class="px-6 py-4">
                    <?= $NoTelp ?>
                </td>
                <td class="px-6 py-4">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="form-ubah.php?ID=<?= $ID ?>" class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 border border-yellow-600 rounded-s-lg hover:bg-yellow-600 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-yellow-900 focus:text-white dark:border-gray dark:text-gray dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:bg-yellow-600">
                         Ubah
                        </a>
                        <a onclick="confirmDelete(<?= $ID ?>)" href="#" class="px-4 py-2 text-sm font-medium text-red-800 bg-white border border-red-800 rounded-e-lg hover:bg-red-800 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-900 focus:text-white dark:border-gray dark:text-gray dark:hover:text-white dark:hover:bg-red-800 dark:focus:bg-red-800">
                         Hapus
                        </a>
                    </div>
                </td>
            </tr>
        <?php
            $no += 1;
        }
        ?>
        </tbody>
    </table>
    </div>
</div>






<script>
    function confirmDelete(id) {
        var confirmation = confirm("Anda yakin ingin menghapus data");

        if(confirmation) {
            window.location.href = "proses-hapus.php?ID=" + id
        }
    }
</script>

</body>
</html>