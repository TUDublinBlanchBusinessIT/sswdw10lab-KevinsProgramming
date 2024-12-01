<?php
include("finalStepHeader.html");
session_start();

// Check if the form was submitted and the confirmation checkbox was checked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
    include('dbcon.php');  // Include the database connection file

    // Get the session variables
    $firstName = $_SESSION['passengerFN'];
    $lastName = $_SESSION['passengerSN'];
    $luggage = isset($_SESSION['luggage']) ? $_SESSION['luggage'] : 0;
    $subTenKG = isset($_SESSION['subTenKG']) ? $_SESSION['subTenKG'] : 0;
    $overTenKG = isset($_SESSION['overTenKG']) ? $_SESSION['overTenKG'] : 0;

    // Prepare the SQL statement for inserting data
    $sql = "INSERT INTO bookings (first_name, last_name, luggage, sub_ten_kg, over_ten_kg) 
            VALUES (:first_name, :last_name, :luggage, :sub_ten_kg, :over_ten_kg)";
    
    $stmt = $pdo->prepare($sql);
    
    // Bind the parameters to the query
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':luggage', $luggage);
    $stmt->bindParam(':sub_ten_kg', $subTenKG);
    $stmt->bindParam(':over_ten_kg', $overTenKG);

    // Execute the query
    if ($stmt->execute()) {
        echo "<p>Booking information saved successfully!</p>";
        // Redirect to the confirmation page or a success page
        header('Location: confirm.php');
        exit();
    } else {
        echo "<p>Failed to save booking information.</p>";
    }
}
?>

<!-- Form to confirm details (already included in the page) -->
<form method="POST" action="finalStep.php">
    <div class="form-group">
        <label class="control-label col-sm-12 text-center">Is the above information correct?</label>
        <div class="checkbox col-sm-12 text-center">
          <label><input type="checkbox" name="confirm">Yes</input></label>
        </div>
    </div>

    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-default">Continue</button>
    </div>
</form>
