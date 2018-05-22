
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

    <title>CNC Entries</title>
</head>
<body>
<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CNC RUNTIME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo $active_custom; ?>">
                <a class="nav-link" href="../index.php?action=custom">Custom Job</a>
            </li>
            <li class="nav-item <?php echo $active_chris_craft; ?>">
                <a class="nav-link" href="../index.php?action=chris_craft">Repeat Job</a>
            </li>
            <li class="nav-item <?php echo $active_edit; ?>">
                <a class="nav-link" href="../index.php?action=edit">Edit Repeat List</a>
            </li>
            <li class="nav-item <?php echo $active_table; ?>">
                <a class="nav-link" href="../index.php?action=table">Daily Entries</a>
            </li>
        </ul>

    </div>
</nav>
<!-- NAV BAR END -->

<div class="container" align="center">


<br>
<form class="no-mobile" action="../" method="post">
    <input id="response" type="hidden" name="action" value="excel">
    <input onclick="myFunction()" class="btn btn-lg btn-success btn-block" type="submit" name="export_excel"
           value="Export to Excel">
</form>
<br>


	<div id="show"></div>



	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('data.php')
			}, 1000);
		});

    function myFunction() {
        var txt = document.getElementById('response');
        var r = confirm("This will erase the current data.\nDo you wish to proceed?\nThis cannot be undone!");
        if (r == true) {
            txt.value = "excel";
        } else {
            txt.value = "table";
        }
        document.getElementById("demo").innerHTML = txt;
    }
	</script>


</div><!-- container close -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
