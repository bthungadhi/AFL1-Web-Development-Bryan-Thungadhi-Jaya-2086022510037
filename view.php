<?php include 'controller.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ListEmployee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="card text-center m-5 px-md-5">
    <ul class="nav justify-content-center" style="background-color: black; padding: 5px;">
      <li class="nav-item" style="font: size 1000px; font-weight: bold; color: white;">
        <a class="nav-link active" aria-current="page" href="view.php">List Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view2.php" style="font: size 1000px; font-weight: bold; color: white;">Office</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view3.php" style="font: size 1000px; font-weight: bold; color: white;">Office Employee</a>
      </li>
    </ul>

    <table class="table" style="margin-top: 20px;">
       <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Umur</th>
      <th scope="col">Alamat</th>
      <th scope="col">No HP</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  
      <tbody>
        <?php
        $counter = 0;
        $allEmployees = getAllEmployees();
        foreach ($allEmployees as $index => $employee) {
          $counter++;
        }
        ?>
          <tr>
          <?php foreach ($allEmployees as $index => $employee) { ?>
        <tr>
          <th scope="row"><?php echo $index + 1; ?></th>
          <td><?php echo htmlspecialchars($employee->nama); ?></td>
          <td><?php echo htmlspecialchars($employee->umur); ?></td>
          <td><?php echo htmlspecialchars($employee->alamat); ?></td>
          <td><?php echo htmlspecialchars($employee->no_hp); ?></td>
          <td><?php echo htmlspecialchars($employee->email); ?></td>
          <td>
        <button type="button" class="btn btn-warning btn-sm">Update</button>
        <form method="POST" action="controller.php" style="display:inline;">
          <input type="hidden" name="index" value="<?php echo $index; ?>">
          <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</button>
        </form>
      </td>
                </tr>
                <?php } ?>
        <form method="POST" action="controller.php">
          <div class="mb-3">
            <label for="exampleInputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="exampleInputNama">
          </div>
          <div class="mb-3">
            <label for="exampleInputUmur" class="form-label">Umur</label>
            <input type="number" class="form-control" name="exampleInputUmur">
          </div>
          <div class="mb-3">
            <label for="exampleInputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="exampleInputAlamat">
          </div>
          <div class="mb-3">
            <label for="exampleInputNOHP" class="form-label">No HP</label>
            <input type="text" class="form-control" name="exampleInputNOHP">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </tbody>
    </table>
  </div>

</body>

</html>