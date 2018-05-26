<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">

    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="css/mainstyle.css">

    <title><?php echo $title; ?></title>
  </head>
  <body>
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CNC RUNTIME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo $active_custom; ?>">
            <a class="nav-link" href="index.php?action=custom">Custom Part</a>
          </li>
          <li class="nav-item <?php echo $active_chris_craft; ?>">
            <a class="nav-link" href="index.php?action=chris_craft">Chris Craft</a>
          </li>
          <li class="nav-item <?php echo $active_edit; ?>">
            <a class="nav-link" href="index.php?action=edit">Edit Chris Craft List</a>
          </li>
          <li class="nav-item <?php echo $active_table; ?>">
            <a class="nav-link" href="index.php?action=table">Daily Entries</a>
          </li>
        </ul>

      </div>
    </nav>
    <!-- NAV BAR END -->

    <div class="container" align="center">
