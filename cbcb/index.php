<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS | TI-2C</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php">Perpus</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Menu</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="?page=buku">Data Buku</a>
                        <a class="navbar-item" href="?page=buku-resep-masakan">Buku Resep Masakan</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php
        include_once 'buku.php';
        include_once 'loker_buku.php';

        $buku = new Buku();
        $loker_buku = new LokerBuku();

        $pages = [
            'buku' => [
                'title' => 'Data Buku',
                'data' => $buku->tampilSemuaBuku()
            ],
            'buku-resep-masakan' => [
                'title' => 'Buku Resep Masakan',
                'data' => $loker_buku->tampilDataBuku("Buku Resep Masakan")
            ]
        ];

        $page = $_GET['page'] ?? null;
        $content = $pages[$page] ?? null;

        if ($content) {
            echo "<h2 class='title has-text-centered'>{$content['title']}</h2>";
            if ($content['data']) {
                echo "<table class='table is-striped is-fullwidth'>
                        <thead>
                            <tr>
                                <th>Loker Buku</th>
                                <th>Judul Buku</th>
                                <th>Nama Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Penerbit</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach ($content['data'] as $row) {
                    echo "<tr>
                            <td>{$row['loker_buku']}</td>
                            <td>{$row['judul_buku']}</td>
                            <td>{$row['nama_pengarang']}</td>
                            <td>{$row['tahun_terbit']}</td>
                            <td>{$row['penerbit']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Data tidak ditemukan.</p>";
            }
        } else {
            echo "<h2 class='title'>Selamat datang di sistem perpustakaan!</h2>
                  <p>Silakan pilih menu di atas untuk melihat data yang diinginkan.</p>";
        }
        ?>
    </div>

</body>

</html>
