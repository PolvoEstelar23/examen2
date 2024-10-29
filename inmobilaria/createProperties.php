<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "includes/header.php";
require "includes/config/conexion.php";

$db = conexion();
var_dump($_POST);

$title = isset($_POST["title"]) ? mysqli_real_escape_string($db, $_POST["title"]) : null;
$price = isset($_POST["price"]) ? mysqli_real_escape_string($db, $_POST["price"]) : null;
$image = isset($_POST["image"]) ? mysqli_real_escape_string($db, $_POST["image"]) : null;
$description = isset($_POST["description"]) ? mysqli_real_escape_string($db, $_POST["description"]) : null;
$rooms = isset($_POST["rooms"]) ? mysqli_real_escape_string($db, $_POST["rooms"]) : null;
$wc = isset($_POST["wc"]) ? mysqli_real_escape_string($db, $_POST["wc"]) : null;
$garage = isset($_POST["garage"]) ? mysqli_real_escape_string($db, $_POST["garage"]) : null;
$timestamp = isset($_POST["timestamp"]) ? mysqli_real_escape_string($db, $_POST["timestamp"]) : null;
$seller = isset($_POST["seller"]) ? mysqli_real_escape_string($db, $_POST["seller"]) : null;

if ($title && $price && $image && $description && $rooms && $wc && $garage && $timestamp && $seller) {
    // campo id es autoincrementable
    $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, garages, timestamp, id_seller) VALUES ('$title', '$price', '$image', '$description', '$rooms', '$wc', '$garage', '$timestamp', '$seller')";
    $response = mysqli_query($db, $query);

    if ($response) {
        echo "Propertie created correctly";
    } else {
        echo "Propertie not created: " . mysqli_error($db);
    }
}

?>

<section>
    <h2>Propierties form</h2>
    <div>
        <form action="createProperties.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill al the form fields</legend>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Propierty Title">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price">
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input type="image" accept="image" id="image" name="image">
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div>
                        <label for="rooms">Rooms</label>
                        <input type="number" name="rooms" id="rooms">
                    </div>
                    <div>
                        <label for="wc">WC</label>
                        <input type="number" name="wc" id="wc">
                    </div>
                    <div>
                        <label for="garage">Garage</label>
                        <input type="number" name="garage" id="garage">
                    </div>
                    <div>
                        <label for="timestamp">TimeStamp</label>
                        <input type="date" name="timestamp" id="timestamp">
                    </div>
                    <div>
                        <label for="seller">Seller</label>
                        <input type="number" name="seller" id="seller">
                    </div>
                    <div>
                        <button type="submit">Create a new propierty</button>
                    </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
    include "includes/footer.php";
?>