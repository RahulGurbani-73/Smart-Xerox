<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdfs = $_POST['pdfs']; // Array of PDFs with their details
    $totalAmount = 0;
    
    foreach ($pdfs as $pdf) {
        $size = $pdf['size']; // e.g., A4, A3
        $pages = $pdf['pages']; // Number of pages in the PDF
        $side = $pdf['side']; // One-sided or Two-sided
        $color = $pdf['color']; // Color or Black & White
        
        // Define base price per page
        $pricePerPage = 3;
        
        // Define additional cost for one-sided or two-sided printing
        if ($side == "one") {
            $sidePrice = 4;
        } elseif ($side == "two") {
            $sidePrice = 2;
        } else {
            $sidePrice = 3; // Default price
        }
        
        // Define additional cost for color or black & white printing
        if ($color == "color") {
            $colorPrice = 10;
        } else {
            $colorPrice = $pricePerPage; // Black & White follows base price
        }
        
        // Calculate total for this PDF
        $totalAmount += $pages * ($pricePerPage + $sidePrice + $colorPrice);
    }
    
    // Return response
    echo json_encode([
        "totalAmount" => $totalAmount,
        "deliveryCharges" => "Free",
        "finalAmount" => $totalAmount
    ]);
}
?>
