<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Our Product</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f5f5f5;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        
        .rating-container {
            display: inline-flex;
            flex-direction: row-reverse; /* Reverse order for easier rating logic */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .star {
            font-size: 40px;
            color: #e4e4e4;
            cursor: pointer;
            padding: 0 5px;
            transition: all 0.2s ease;
        }
        
        input[type="radio"] {
            display: none;
        }
        
        /* Highlight stars on hover */
        input[type="radio"]:not(:checked) + label:hover,
        input[type="radio"]:not(:checked) + label:hover ~ label {
            color: #ffa41c; /* Amazon/Flipkart orange color */
            transform: scale(1.1);
        }
        
        /* Highlight selected stars */
        input[type="radio"]:checked ~ label {
            color: #ffa41c;
        }
        
        /* Add slight bounce effect on hover */
        label:hover {
            transform: scale(1.1);
        }
        
        .submit-btn {
            margin-top: 25px;
            padding: 12px 30px;
            font-size: 16px;
            background-color: #ffa41c;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
            font-weight: 500;
        }
        
        .submit-btn:hover {
            background-color: #ff9100;
            transform: translateY(-1px);
        }
        
        .submit-btn:active {
            transform: translateY(1px);
        }

        /* Rating tooltip */
        .rating-text {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
            min-height: 20px;
        }
    </style>
</head>
<body>
    <h1>Rate Our Product</h1>
    <form action="submit_rating.php" method="POST">
        <div class="rating-container">
            <input type="radio" name="rating" id="rate-5" value="5">
            <label class="star" for="rate-5" title="Excellent">★</label>
            
            <input type="radio" name="rating" id="rate-4" value="4">
            <label class="star" for="rate-4" title="Good">★</label>
            
            <input type="radio" name="rating" id="rate-3" value="3">
            <label class="star" for="rate-3" title="Average">★</label>
            
            <input type="radio" name="rating" id="rate-2" value="2">
            <label class="star" for="rate-2" title="Poor">★</label>
            
            <input type="radio" name="rating" id="rate-1" value="1">
            <label class="star" for="rate-1" title="Terrible">★</label>
        </div>
        <div class="rating-text"></div>
        <button type="submit" class="submit-btn">Submit Rating</button>
    </form>

    <script>
        const stars = document.querySelectorAll('.star');
        const ratingText = document.querySelector('.rating-text');
        const ratingTexts = {
            5: "Excellent! Loved it",
            4: "Good! Recommended",
            3: "Average, Could be better",
            2: "Poor, Needs improvement",
            1: "Terrible, Not recommended"
        };

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.previousElementSibling.value;
                ratingText.textContent = ratingTexts[rating];
            });
        });
    </script>
</body>
</html>