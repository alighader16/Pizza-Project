<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include __DIR__ . '/../DAL/Repository/MenuItemRepository.php';
    include __DIR__ . '/../DAL/Repository/ReviewRepository.php';

    $menuitem_id = isset($_POST["menuitem_id"]) ? $_POST["menuitem_id"] : null;

    if ($menuitem_id !== null) {

        // Get average rating for the menu item
        $averageRating = getAverageRatingByMenuItem($menuitem_id);

        // Get the count of reviews for each rating for the menu item
        $reviewCounts = getReviewCountsByRating($menuitem_id);

        $response = [
            'averageRating' => $averageRating,
            'reviewCounts' => $reviewCounts
        ];

        // Encode the array as JSON and send it to the client
        $resultx = json_encode($response, JSON_NUMERIC_CHECK);
        $resultx = trim($resultx, "\r\n-*");
        echo json_encode($resultx, JSON_NUMERIC_CHECK);

    } else {
        // If menuitem_id is not provided, return an error message
        echo json_encode(['error' => 'Menu item ID is missing.']);
    }
}
?>