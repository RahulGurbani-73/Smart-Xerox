<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhonePe Scanner</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4A90E2, #9013FE);
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .scanner {
            width: 250px;
            height: 250px;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin: 20px auto;
        }
        .scanner img {
            width: 80%;
            height: auto;
        }
        #timer {
            font-size: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Scan to Pay with PhonePe</h1>
        <div class="scanner">
            <img src="images/phonepe_qr.jpg" alt="PhonePe Scanner">
        </div>
        <p>Scan this QR code using PhonePe to make a payment.</p>
        <p>When your Payment Success. Check the Order history to Accept your order</p>
        <p id="timer">Redirecting in 15 seconds...</p>
    </div>
    
    <script>
        let countdown = 45;
        const timerElement = document.getElementById('timer');
        
        const interval = setInterval(function() {
            countdown--;
            timerElement.textContent = `Redirecting in ${countdown} seconds...`;
            
            if (countdown === 0) {
                clearInterval(interval);
                window.location.href = 'order_page.php'; // Redirect after 15 seconds
            }
        }, 1000);
    </script>
</body>
</html>
