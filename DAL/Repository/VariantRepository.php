<?php 

function getVariantsOfMenuItem($MenuItem) {
    global $conn;
    $query = "SELECT * FROM variant WHERE MenuItemID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $MenuItem->menuitem_id);
    $stmt->execute();

    $result = $stmt->get_result();
    
    while($row = $result->fetch_assoc()){
        $variant = new Variant();
        $variant->title = ($row['Title']);
        $variant->variant_id = ($row['VariantID']);
        $variant->price = ($row['Price']);
        $MenuItem->variants[] = $variant;
    }

    mysqli_free_result($result);

    return $MenuItem;
}

?>