<?php
# DEVELOPED BY CHAD CZILLI
# 2018-04-9
session_start();

include('model/database.php');
include('model/models.php');
include('model/time.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'custom';
        $_SESSION['toggle'] = '';
        $_SESSION['initials'] = '';
        $_SESSION['part_number'] = '';
        $_SESSION['description'] = '';
        $_SESSION['dept_code'] = '';
        $_SESSION['task'] = '';
        $_SESSION['quantity'] = '';
    }
}

switch ($action) {

    case 'custom':
        $title = 'Custom Job';
        $active_custom = 'active';
        $models = get_models();
        $initials = filter_input(INPUT_POST, 'initials');
        $part_number = filter_input(INPUT_POST, 'part_number');
        $description = filter_input(INPUT_POST, 'description');
        $start_id = get_start_id();
        if (isset($_POST['submit'])) {
            $toggle_text = toggle($initials, $part_number, $description, $start_id);
        }

        include('view/main.php');
        break;

    case 'chris_craft':
        $title = 'Repeat Job';
        $active_chris_craft = 'active';
        $models = get_models();
        $initials = filter_input(INPUT_POST, 'initials');
        $part = filter_input(INPUT_POST, 'part');
        if (isset($part)) {
            $exploded_part = explode('|', $part);
            $part_number = $exploded_part[0];
            $description = $exploded_part[1];
        } else {
            $part_number = '';
            $description = '';
        }

        $start_id = get_start_id();
        if (isset($_POST)) {
            $toggle_text = toggle($initials, $part_number, $description, $start_id);
        }

        include('view/main.php');
        break;

    case 'edit':
        $title = 'Edit Repeat Job List';
        $active_edit = 'active';
        $models = get_models();
        $msg = '';
        include('view/edit.php');
        break;

    case 'add':
        $title = 'Edit Repeat Job List';
        $part_number = filter_input(INPUT_POST, 'part_number');
        $description = filter_input(INPUT_POST, 'description');
        $msg = add_chris_craft($part_number, $description);
        $models = get_models();
        include('view/edit.php');
        break;

    case 'delete':
        $ID = filter_input(INPUT_POST, 'ID');
        $title = 'Edit Repeat Job List';
        delete_chris_craft($ID);
        $msg_deleted = "Part Deleted!";
        $models = get_models();
        // include('view/edit.php');
        include('view/edit.php');
        break;

    case 'delete_entry':
        $title = 'Daily Entries';
        $active_table = 'active';
        $start_id = filter_input(INPUT_POST, 'delete_entry');
        delete_entry($start_id);
        $entries = get_entry();
        // include('view/table.php');
        header('Location: view/refresh.php');
        break;

    case 'table':
        $title = 'Daily Entries';
        $active_table = 'active';
        $entries = get_entry();
        header('Location: view/refresh.php');
        // include('view/table.php');
        break;

    case 'tableviewer':
      $title = 'Daily Entries';
      $active_table = 'active';
      $entries = get_entry();
      include('view/tableviewer.php');
      break;

    case 'excel':
        $entries = get_entry();
        include('excel.php');
        break;

    default:
        $msg_error = "<h1>Error: No Action Found!</h1>";
        break;
}
