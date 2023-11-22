<?php
include __DIR__ . "/../config.php";
include __DIR__ . "/../Models/Review.php";

function getReviews($query, $parameter)
{
    global $conn;
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        return array();
    }

    mysqli_stmt_bind_param($stmt, "i", $parameter);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $reviews = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $review = new Review();
        $review->review_id = $row['ID'];
        $review->title = $row['Title'];
        $review->rating = $row['Rating'];
        $review->description = $row['Description'];
        $review->review_date = $row['ReviewDate'];
        $review->customer_id = $row['CustomerID'];
        $review->menuitem_id = $row['MenuItemID'];
        $reviews[] = $review;
    }

    mysqli_free_result($result);

    return $reviews;
}

//get reviews for a specific menu item
function getReviewsByMenuItem($menuitem_id)
{
    $query = "SELECT * FROM review WHERE MenuItemID = ?";
    return getReviews($query, $menuitem_id);
}

//get average rating for a specific menu item
function getAverageRatingByMenuItem($menuitem_id)
{
    $query = "SELECT AVG(Rating) AS AverageRating FROM review WHERE MenuItemID = ?";
    global $conn;
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $menuitem_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $averageRating);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return $averageRating ? round($averageRating, 1) : 0;
}

//get the count of reviews for each rating for a specific menu item
function getReviewCountsByRating($menuitem_id)
{
    $query = "SELECT Rating, COUNT(*) AS Quantity FROM review WHERE MenuItemID = ? GROUP BY Rating";
    global $conn;
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $menuitem_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $reviewCounts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $reviewCounts['rating_' . $row['Rating']] = $row['Quantity'];
    }

    mysqli_stmt_close($stmt);

    return $reviewCounts;
}
?>
-*