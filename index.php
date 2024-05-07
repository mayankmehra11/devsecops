<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poorly Developed PHP App</title>
</head>
<body>
    <h1>Poorly Developed PHP App</h1>

    <form method="GET" action="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter your search term...">
        <button type="submit">Search</button>
    </form>

    <hr>

    <?php
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        $conn = mysqli_connect("localhost", "root", "", "students");

        // SQL Injection vulnerability
        $query = "SELECT * FROM students WHERE name LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<ul>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row['name'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No results found.</p>";
        }

        mysqli_close($conn);
    }
    ?>

</body>
</html>
