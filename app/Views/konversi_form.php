<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Konversi Nilai</h2>
        <form action="<?= site_url('konversi') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="text" class="form-control" id="partisipasi" name="partisipasi" value="<?= old('partisipasi') ?>" required>
            </div>
            <div class="form-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= old('tugas') ?>" required>
            </div>
            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="text" class="form-control" id="uts" name="uts" value="<?= old('uts') ?>" required>
            </div>
            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="text" class="form-control" id="uas" name="uas" value="<?= old('uas') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Konversi</button>
        </form>
        <?php if(session()->has('validation')): ?>
            <div class="alert alert-danger mt-4">
                <?= \Config\Services::validation()->listErrors() ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
