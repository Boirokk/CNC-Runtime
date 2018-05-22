<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">

    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="css/mainstyle.css">

    <title><?php echo $title; ?></title>
  </head>
  <body>
    <br>

    <div class="container">
        <p align="center">CNC RUN TIME FOR <?php echo date('Y-m-d'); ?></p><br>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Operator</th>
                  <th scope="col">Job #</th>
                  <th scope="col">Description</th>
                  <th scope="col">Total Runtime</th>
                </tr>
              </thead>
              <tbody>
                <?php $array_start = array();
                       $array_stop = array();
                 ?>
                <?php foreach ($entries as $entry): ?>
                  <?php array_push($array_start, $entry['start_time']);
                    array_push($array_stop, $entry['stop_time']);
                   ?>
                  <tr>
                  <td><?php echo htmlspecialchars($entry['initials']); ?></td>
                  <td><?php echo htmlspecialchars($entry['part_number']); ?></td>
                  <td><?php echo htmlspecialchars($entry['description']); ?></td>
                  <td>
                    <?php
                      $id = $entry['start_id'];
                      $time = get_row($id);
                      $datetime1 = new DateTime($time['stop_time']);
                      $datetime2 = new DateTime($time['start_time']);
                      $interval = $datetime1->diff($datetime2);
                      echo $interval->format('%H:%I:%S');
                     ?>
                  </td>
                  </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
            <?php
              $datetime1 = new DateTime(end($array_stop));
              $datetime2 = new DateTime(current($array_start));
              $interval_total = $datetime1->diff($datetime2);

              echo 'Total Operating Time: <br />'.$interval_total->format('%H:%I:%S');

             ?>
    </div>
