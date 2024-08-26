<?php
session_start();
require 'DATABASE/function.php'; // Include the function.php file

$db = new DBFunctions(); // Assuming this initializes the $conn property

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action']; // Get the action (add or edit)
    $gameData = [
        'game_name' => $_POST['game_name'],
        'genre' => $_POST['genre'],
        'popularity' => $_POST['popularity'],
        'platform' => $_POST['platform'],
        'featured' => $_POST['featured'],
    ];

    // Check if there's an image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = 'assets/img/game/' . $_FILES['image']['name']; // Define image path
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath); // Upload the image
        $gameData['image'] = $imagePath; // Add image path to the data
    }

    if ($action === 'add') {
        // Insert the new game into the database
        $insertSuccess = $db->insert('games', $gameData);
        if ($insertSuccess) {
            echo "<script>alert('Game added successfully!'); window.location.href='gamelist.php';</script>";
        } else {
            echo "<script>alert('Failed to add game.'); window.location.href='gamelist.php';</script>";
        }
    } elseif ($action === 'edit' && isset($_POST['id'])) {
        // Update an existing game in the database
        $gameData['id'] = $_POST['id']; // Add the ID for the update
        $updateSuccess = $db->update('games', $gameData, ['id' => $_POST['id']]);
        if ($updateSuccess) {
            echo "<script>alert('Game updated successfully!'); window.location.href='gamelist.php';</script>";
        } else {
            echo "<script>alert('Failed to update game.'); window.location.href='gamelist.php';</script>";
        }
    }
}
$games = $db->select('games', '*');

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
    $conditions = ['id' => $id];
    try {
        $affected_rows = $db->delete($table, $conditions);
        if ($affected_rows > 0) {
            echo "<script>                         alert('Record deleted successfully.');                         window.location.href = window.location.href;                       </script>";
        } else {
            echo "No record found with the provided ID.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <title>GAMELIST</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="assets/img/favicon.png" rel="shortcut icon" type="image/x-icon" />

    <!-- CSS here -->
    <link href="./css/plugins.css" rel="stylesheet" />
    <link href="./css/main.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        .dataTables_wrapper .dataTables_length select {
            background-color: white !important;
        }

        table.dataTable tbody tr:nth-child(odd) {
            background-color: #343a40 !important;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #212529 !important;
        }

        table.dataTable tbody tr.even>.sorting_1 {
            background-color: inherit !important;
        }

        .dataTables_length,
        .dataTables_filter {
            margin-bottom: 1%;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: white !important;
        }

        .modal-content {
            background-color: black !important;
        }

        .shop__ordering select {
            background-color: white !important;
            color: #212529 !important;
            background-image: none !important;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>


    <main class="main--area">
        <section class="breadcrumb-area" data-background="assets/img/bg/breadcrumb_bg01.jpg">
            <div class="container">
                <div class="breadcrumb__wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="breadcrumb__content">
                                <h2 class="title">Game List</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li aria-current="page" class="breadcrumb-item active">Game List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="game-info-area section-pt-120 section-pb-120">
            <div class="container">

                <h2 class="title text-center">Good day <?php echo $_SESSION['name'] ?>!</h2>
                <!-- Add Game Button if Session Type is 0 -->
                <?php if ($_SESSION['type'] == 0): ?>
                    <div class="mb-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGameModal">Add
                            Game</button>
                    </div>
                <?php endif; ?>

                <table id="gameTable" class="table table-responsive table-striped table-dark mt-4 display"
                    style="width:100%">

                    <thead>
                        <tr>
                            <th>Game Name</th>
                            <th>Genre</th>
                            <th>Popularity</th>
                            <th>Platform</th>
                            <th>Featured</th>
                            <th>Image</th>
                            <?php if ($_SESSION['type'] == 0): ?>
                                <th>Action</th> <!-- Action column -->
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($games as $game): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($game['game_name']); ?></td>
                                <td><?php echo htmlspecialchars($game['genre']); ?></td>
                                <td><?php echo htmlspecialchars($game['popularity']); ?></td>
                                <td><?php echo htmlspecialchars($game['platform']); ?></td>
                                <td><?php echo ($game['featured'] == 0) ? 'Not Featured' : 'Featured'; ?></td>

                                <td><img src="<?php echo htmlspecialchars($game['image']); ?>" alt="Game Image" width="100">
                                </td>

                                <?php if ($_SESSION['type'] == 0): ?>
                                    <td>
                                        <!-- Dropdown for Edit and Delete -->
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#editGameModal" data-id="<?php echo $game['id']; ?>"
                                                        data-name="<?php echo $game['game_name']; ?>"
                                                        data-genre="<?php echo $game['genre']; ?>"
                                                        data-popularity="<?php echo $game['popularity']; ?>"
                                                        data-platform="<?php echo $game['platform']; ?>"
                                                        data-image="<?php echo $game['image']; ?>">Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="gamelist.php?action=delete&id=<?php echo $game['id']; ?>&table=games"
                                                        onclick="return confirm('Are you sure you want to delete this game?');">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>


    <!-- Modal for Add Game -->
    <div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGameModalLabel">Add Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="gamelist.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add"> <!-- Hidden input for action -->
                        <div class="mb-3">
                            <label for="gameName" class="form-label">Game Name</label>
                            <input type="text" class="form-control" id="gameName" name="game_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editGenre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="editGenre" name="genre" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender">Featured</label>
                            <div class="shop__ordering" style="width: 100% !important;">
                                <select name="featured" class="orderby" required>
                                    <option value="0">Not Featured</option>
                                    <option value="1">Featured</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="popularity" class="form-label">Popularity</label>
                            <input type="text" class="form-control" id="popularity" name="popularity" required>
                        </div>
                        <div class="mb-3">
                            <label for="platform" class="form-label">Platform</label>
                            <input type="text" class="form-control" id="platform" name="platform" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Game</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for Edit Game -->
    <div class="modal fade" id="editGameModal" tabindex="-1" aria-labelledby="editGameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGameModalLabel">Edit Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="gamelist.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="edit"> <!-- Hidden input for action -->
                        <input type="hidden" id="editGameId" name="id"> <!-- Hidden input for game ID -->
                        <div class="mb-3">
                            <label for="editGameName" class="form-label">Game Name</label>
                            <input type="text" class="form-control" id="editGameName" name="game_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender">Featured</label>
                            <div class="shop__ordering" style="width: 100% !important;">
                                <select name="featured" class="orderby" required>
                                    <option value="0">Not Featured</option>
                                    <option value="1">Featured</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editGenre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="editGenre" name="genre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPopularity" class="form-label">Popularity</label>
                            <input type="text" class="form-control" id="editPopularity" name="popularity" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPlatform" class="form-label">Platform</label>
                            <input type="text" class="form-control" id="editPlatform" name="platform" required>
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editImage" name="image" accept="image/*">
                            <img id="editImagePreview" src="" alt="Current Image" width="100" style="margin-top: 10px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        // Set modal data for editing
        var editGameModal = document.getElementById('editGameModal');
        editGameModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var gameId = button.getAttribute('data-id');
            var gameName = button.getAttribute('data-name');
            var genre = button.getAttribute('data-genre');
            var popularity = button.getAttribute('data-popularity');
            var platform = button.getAttribute('data-platform');
            var image = button.getAttribute('data-image');

            var modal = editGameModal.querySelector('form');
            modal.querySelector('#editGameId').value = gameId;
            modal.querySelector('#editGameName').value = gameName;
            modal.querySelector('#editGenre').value = genre;
            modal.querySelector('#editPopularity').value = popularity;
            modal.querySelector('#editPlatform').value = platform;
            modal.querySelector('#editImagePreview').src = '' + image;
        });
    </script>


    <?php require "footer.php"; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            $('#gameTable').DataTable();
        });
    </script>
</body>

</html>