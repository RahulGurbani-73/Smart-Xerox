<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #28a745, #218838);
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .order-text {
            font-size: 28px;
            font-weight: bold;
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .token {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
            background: white;
            color: #218838;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-text">🎉 Order Placed Successfully! 🎉</div>
        <div class="token">Your Token: <span id="tokenNumber"></span></div>
    </div>
    
    <script>
        // Generate a random token number
        document.getElementById('tokenNumber').textContent = Math.floor(1000 + Math.random() * 9000);
        
        // Redirect after 8 seconds
        setTimeout(function() {
            window.location.href = 'homepage.php'; // Change to your next page
        }, 8000);
    </script>
</body>
</html>