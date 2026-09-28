<?php include 'controller.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Office</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="card text-center m-5 px-md-5">
    <ul class="nav justify-content-center" style="background-color: black; padding: 5px;">
      <li class="nav-item" style="font: size 1000px;">
        <a class="nav-link" href="view.php" style="font: size 1000px; font-weight: bold; color: white;">List Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="view2.php" style="font: size 1000px; font-weight: bold; color: blue;">Office</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view3.php" style="font: size 1000px; font-weight: bold; color: white;">Office Employee</a>
      </li>
    </ul>

    <table class="table" style="margin-top: 20px;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Kota</th>
          <th scope="col">Alamat</th>
          <th scope="col">No HP</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $allOffices = getAllOffices();
        foreach ($allOffices as $index => $office) { ?>
          <tr>
            <th scope="row"><?php echo $index + 1; ?></th>
            <td><?php echo htmlspecialchars($office->nama); ?></td>
            <td><?php echo htmlspecialchars($office->kota); ?></td>
            <td><?php echo htmlspecialchars($office->alamat); ?></td>
            <td><?php echo htmlspecialchars($office->no_hp); ?></td>
            <td>
              <button type="button" class="btn btn-warning btn-sm">Update</button>
              <form method="POST" action="controller.php" style="display:inline;">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" name="delete_office" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</button>
              </form>
            </td>
          </tr>
        <?php } ?>
        <form method="POST" action="controller.php">
          <div class="mb-3">
            <label for="inputNamaOffice" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNamaOffice" name="inputNamaOffice">
          </div>
          <div class="mb-3">
            <label for="inputKotaOffice" class="form-label">Kota</label>
            <input type="text" class="form-control" id="inputKotaOffice" name="inputKotaOffice">
          </div>
          <div class="mb-3">
            <label for="inputAlamatOffice" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="inputAlamatOffice" name="inputAlamatOffice">
          </div>
          <div class="mb-3">
            <label for="inputNoHPOffice" class="form-label">No HP</label>
            <input type="text" class="form-control" id="inputNoHPOffice" name="inputNoHPOffice">
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary" name="submit_office">Submit</button>
        </form>
      </tbody>
    </table>
  </div>

</body>

</html>