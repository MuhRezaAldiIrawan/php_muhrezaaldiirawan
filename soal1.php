<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Soal 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_POST['step']) && $_POST['step'] == 1) {
                    $baris = (int) $_POST['baris'];
                    $kolom = (int) $_POST['kolom'];
                ?>

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            Form Input Data (Tampilan 2)
                        </div>
                        <div class="card-body">
                            <form method="post" class="row g-3">
                                <?php
                                for ($i = 1; $i <= $baris; $i++) {
                                    for ($j = 1; $j <= $kolom; $j++) {
                                ?>
                                        <div class="col-md-4">
                                            <label class="form-label"><?= $i . "." . $j ?></label>
                                            <input type="text" class="form-control" name="data[<?= $i ?>][<?= $j ?>]">
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <input type="hidden" name="baris" value="<?= $baris ?>">
                                <input type="hidden" name="kolom" value="<?= $kolom ?>">
                                <input type="hidden" name="step" value="2">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php

                } elseif (isset($_POST['step']) && $_POST['step'] == 2) {
                    $baris = (int) $_POST['baris'];
                    $kolom = (int) $_POST['kolom'];
                    $data = $_POST['data'];
                ?>

                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            Hasil Input Data (Tampilan 3)
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php
                                for ($i = 1; $i <= $baris; $i++) {
                                    for ($j = 1; $j <= $kolom; $j++) {
                                        $isi = htmlspecialchars($data[$i][$j]);
                                        echo "<li class='list-group-item'><b>$i.$j</b> : $isi</li>";
                                    }
                                }
                                ?>
                            </ul>
                            <p class="mt-3 fst-italic text-muted">dst</p>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">
                            Form Jumlah Baris & Kolom (Tampilan 1)
                        </div>
                        <div class="card-body">
                            <form method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Inputkan Jumlah Baris</label>
                                    <input type="number" class="form-control" name="baris" required>
                                    <small class="text-muted">Contoh: 1</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Inputkan Jumlah Kolom</label>
                                    <input type="number" class="form-control" name="kolom" required>
                                    <small class="text-muted">Contoh: 3</small>
                                </div>
                                <input type="hidden" name="step" value="1">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>