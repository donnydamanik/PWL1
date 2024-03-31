<?php
include 'Connect.php';
$pdo = pdo_connect_mysql();

spl_autoload_register(function ($class) {
    $deniedClasses = ['PerhitunganNA', 'KonversiNH'];
    if (!in_array($class, $deniedClasses))
        include $class . '.php';
});

if (!empty($_POST)) {
    Create::insert($pdo);
}

$posts = Read::get_contacts($pdo);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perhitungan NA dan Koversi NH</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">

</head>

<body>
    <section class="intro">
        <div class="bg-image h-100" style="">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card mask-custom">
                                <div class="card-body">
                                    <div class="table-responsive rounded-4 bg-light p-3">
                                        <table class="table table-light table-borderless text-white mb-5">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Nilai Partisipasi</th>
                                                    <th scope="col" class="text-center">Nilai Tugas</th>
                                                    <th scope="col" class="text-center">Nilai UTS</th>
                                                    <th scope="col" class="text-center">Nilai UAS</th>
                                                    <th scope="col" class="text-center">Nilai Akhir (NA)</th>
                                                    <th scope="col" class="text-center">Nilai Konversi Huruf (NH)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($posts as $post) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $post['partisipasi'] ?></td>
                                                        <td class="text-center"><?= $post['tugas'] ?></td>
                                                        <td class="text-center"><?= $post['uts'] ?></td>
                                                        <td class="text-center"><?= $post['uas'] ?></td>
                                                        <td class="text-center"><?= $post['na'] ?></td>
                                                        <td class="text-center"><?= $post['nh'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <form action="index.php" method="post" class="d-flex flex-column align-items-center gap-3 p-3 rounded-4 bg-white">
                                            <h4>Tambahkan Nilai</h4>
                                            <table class="table bg-light table-borderless text-white mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Nilai Partisipasi</th>
                                                        <th scope="col" class="text-center">Nilai Tugas</th>
                                                        <th scope="col" class="text-center">Nilai UTS</th>
                                                        <th scope="col" class="text-center">Nilai UAS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="partisipasi" class="form-control" placeholder="Nilai Partisipasi"></td>
                                                        <td><input type="text" name="tugas" class="form-control" placeholder="Nilai Tugas"></td>
                                                        <td><input type="text" name="uts" class="form-control" placeholder="Nilai UTS"></td>
                                                        <td><input type="text" name="uas" class="form-control" placeholder="Nilai UAS"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary px-5" type="submit">Hitung</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>