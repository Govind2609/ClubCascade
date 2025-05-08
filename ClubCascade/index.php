<?php
$servername = "localhost";
$username = "root"; // replace with your username
$password = ""; // replace with your password
$dbname = "clubcascade"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events ORDER BY event_id DESC LIMIT 3"; // Fetch the latest 3 events by event_id in descending order
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Management | MIT ADT</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1>ClubCascade</h1>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="add-events.html" class="btn-add">Add Event</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
    <div class="auth-buttons">
      <button class="nav-btn" onclick="location.href='login.html'">Login</button>
      <button class="nav-btn" onclick="location.href='signup.html'">Sign Up</button>
    </div>
  </header>

  <section id="home" class="hero">
    <h2>Welcome to ClubCascade</h2>
    <p>Stay updated with all upcoming events at MIT ADT University.</p>
  </section>

  <section id="events" class="events">
    <h2>Upcoming Events</h2>
    <div class="event-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="event">';
                echo '<h3>' . $row['event_name'] . '</h3>';
                echo '<p><strong>Date:</strong> ' . $row['event_date'] . '</p>';
                echo '<p><strong>Venue:</strong> ' . $row['venue'] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No upcoming events found.</p>';
        }
        ?>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 ClubCascade | MIT ADT University</p>
  </footer>

</body>
</html>
