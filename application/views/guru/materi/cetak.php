 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h5><?= $cetakMateri[0]['nama_ruangan'] ?></h5>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul Pertemuan</th>
      <th scope="col">Tanggal Pertemuan</th>
      <th scope="col">Status Absen</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($cetakMateri as $row) : ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $row['judul_pertemuan'] ?></td>
      <td><?= $row['tanggal_pertemuan'] ?></td>
      <td><?= $row['absen'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>