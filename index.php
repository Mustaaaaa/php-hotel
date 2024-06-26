<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// foreach ($hotels as $hotel) {
//     echo $hotel['name'] . ' - ' . $hotel['description'] . ' - ' . $hotel['vote'] . ' - ' . $hotel['distance_to_center'] . '<br/>';
// }

$filtered_hotels = $hotels;

if (isset($_GET['parking'])) {
    $parking_filter = $_GET['parking'];
    if ($parking_filter == '1') {
        $filtered_hotels = array_filter($filtered_hotels, function ($hotel) {
            return $hotel['parking'] == true;
        });
    } elseif ($parking_filter == '0') {
        $filtered_hotels = array_filter($filtered_hotels, function ($hotel) {
            return $hotel['parking'] == false;
        });
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>PHP Hotel</h1>
        <form method="get">
            <div class="pb-3">
                <label for="parking_filter">Filter by Parking:</label>
                <select name="parking" id="parking_filter" class="form-select">
                    <option value="">All</option>
                    <option value="1" <?php echo $_GET['parking'] == '1' ? 'selected' : '' ?>>With Parking</option>
                    <option value="0" <?php echo $_GET['parking'] == '0' ? 'selected' : '' ?>>Without Parking</option>
                </select>
            </div>
            <button class="btn btn-danger">Apply</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filtered_hotels as $hotel) : ?>
                    <tr>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>