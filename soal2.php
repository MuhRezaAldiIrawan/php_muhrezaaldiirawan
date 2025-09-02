<?php

require_once "dbconnetion.php";

$search = "";
$where  = "";
if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $mysqli->real_escape_string($_GET['search']);
    $where  = "WHERE h.hobi LIKE '%$search%'";
}


$query = "
    SELECT h.hobi, COUNT(DISTINCT p.id) as jumlah_person
    FROM hobi h
    JOIN person p ON p.id = h.person_id
    $where
    GROUP BY h.hobi
    ORDER BY jumlah_person DESC
";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Laporan Hobi dan Jumlah Person
                    </div>
                    <div class="card-body">

                        <form method="get" class="mb-3 d-flex">
                            <input type="text" class="form-control me-2" name="search" placeholder="Cari hobi..." value="<?= htmlspecialchars($search) ?>">
                            <button type="submit" class="btn btn-success">Search</button>
                            <a href="soal2.php" class="btn btn-secondary ms-2">Reset</a>
                        </form>

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Hobi</th>
                                    <th>Jumlah Person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result && $result->num_rows > 0) : ?>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['hobi']) ?></td>
                                            <td><?= $row['jumlah_person'] ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">Data tidak ditemukan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>