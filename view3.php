<?php include 'controller.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewEmployee</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="height:100%; margin:10px; display:flex; justify-content:center; align-items:center; font-family:Roboto, Arial, sans-serif; background:white; color:#000;">
 
  <div style="width:600px; max-width:300%; box-sizing:border-box; background:#fff; border:1px solid #555; box-shadow:0 2px 10px rgba(0,0,0,.25);">
 

    <div style="background:#c9e9fb; border-bottom:1px solid #5f7484; padding:8px 10px; font-weight:700; font-size:12px;">
  <a href="view.php" style="color:#000; text-decoration:none;">List Employees</a>
  <span style="margin:0 8px; font-weight:400;">|</span>
  <a href="view2.php" style="color:#000; text-decoration:none;">Office</a>
  <span style="margin:0 8px; font-weight:400;">|</span>
  <a href="view3.php" style="color:#000; text-decoration:none;">Office Employee</a>
</div>
 
    <div style="padding:16px 24px 24px;">
 
      <h1 style="text-align:center; color:#23358f; font-weight:400; font-size:26px; margin:0 0 14px;">Office Employees</h1>
 

      <table style="width:100%; border-collapse:collapse; border:1px solid #b5b5b5; font-size:12px;">
        <thead>
          <tr>
            <th style="border:1px solid #b5b5b5; padding:10px; text-align:left; background:#9edcfc; font-weight:400;">Employee</th>
            <th style="border:1px solid #b5b5b5; padding:10px; text-align:left; background:#9edcfc; font-weight:400;">Office</th>
          </tr>
        </thead>
        <tbody id="tabel-body">
          <?php
          $allEmployees = getAllEmployees();
          $allOffices = getAllOffices();
          $pairs = getAllOfficeEmployees();
          foreach ($allEmployees as $employee) {
            $office = $pairs[$employee->nama] ?? '-';
          ?>
          <tr>
            <td style="border:1px solid #b5b5b5; padding:10px; text-align:left;"><?php echo htmlspecialchars($employee->nama); ?></td>
            <td style="border:1px solid #b5b5b5; padding:10px; text-align:left;"><?php echo htmlspecialchars($office); ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
 
      <form id="form-office-employee" method="POST" action="controller.php" style="margin-top:32px; display:flex; flex-direction:column; align-items:center;">
        <div style="display:flex; align-items:center; gap:16px;">
          <label for="employee" style="width:52px; text-align:right; font-size:12px;">Employee</label>
          <select id="employee" name="employee" style="width:110px; height:30px; padding:0 8px; font-size:12px; border:1px solid #999; background-color:#fff; cursor:pointer;">
            <?php foreach ($allEmployees as $employee) { ?>
              <option><?php echo htmlspecialchars($employee->nama); ?></option>
            <?php } ?>
          </select>
        </div>
 
        <div style="display:flex; align-items:center; gap:16px; margin-top:-1px;">
          <label for="office" style="width:52px; text-align:right; font-size:12px;">Office</label>
          <select id="office" name="office" style="width:110px; height:30px; padding:0 8px; font-size:12px; border:1px solid #999; background-color:#fff; cursor:pointer;">
            <?php foreach ($allOffices as $office) { ?>
              <option><?php echo htmlspecialchars($office->nama); ?></option>
            <?php } ?>
          </select>
        </div>
 
        <button type="submit" name="save_office_employee" style="margin-top:14px; width:72px; height:26px; background:#9edcfc; border:1px solid #2b3a4a; border-radius:6px; font-size:12px; cursor:pointer;">SAVE</button>
      </form>
 
    </div>
  </div>
</body>
</html>