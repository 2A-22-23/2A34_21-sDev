<?php
require_once('md.php');
$model = new Model();

if (isset($_POST['q'])) {
    $searchTerm = $_POST['q'];
    $searchResults = $model->search($searchTerm);
} else {
    // Redirect to the desired page if the search term is not provided
    header('Location: defid.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <!-- Add your CSS stylesheets and other head elements -->
</head>
<body>
    <h2>Search Results for "<?php echo $searchTerm; ?>"</h2>

    <?php if (!empty($searchResults)) { ?>
        <table>
            <thead>
                <tr>
                    <th>n</th>
                    <th>J2</th>
                    <th>jeu</th>
                    <th>recompance</th>
                    <th>detail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchResults as $row) { ?>
                    <tr>
                        <td><?php echo $row['n']; ?></td>
                        <td><?php echo $row['j2']; ?></td>
                        <td><?php echo $row['datess']; ?></td>
                        <td><?php echo $row['jeu']; ?></td>
                        <td><?php echo $row['recompance']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td>
                            <!-- Add your actions for each search result -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>

    <!-- Add your footer and any other necessary HTML elements -->

    <!-- Add your JavaScript code if needed -->
</body>
</html>
