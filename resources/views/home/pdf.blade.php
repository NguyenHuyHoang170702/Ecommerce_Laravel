<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Poster</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{$data->product_title}}</h3>
        </div>
        <div class="card-body">
            <div class="product-info">
                <span>Name: {{$data->name}}</span>
                <span>Email: {{$data->email}}</span>
                <span>Price: {{$data->price}}$</span>
                <span>Quantity: {{$data->quantity}}</span>
            </div>
            <div class="product-image">
                <img src="product/{{$data->image}}" alt="Product Image" class="product-image">
            </div>
            <div>
                <p>
                    Dear Customer and Everyone who contributed,

                    We would like to express our deepest gratitude and sincere thanks to all the members who have devoted their time and effort to support us in this project. Your support not only helped us successfully complete the project but also created a memorable and meaningful experience.

                    We understand that no project can succeed without the dedication and expertise of a committed and passionate team like yours. The effort, knowledge, and experience of everyone involved have been a great source of encouragement and made a difference in the project's development process.

                    With heartfelt appreciation, we extend our thanks to each individual and group who contributed to the success of this project. We hope that we will continue to have the opportunity to collaborate on future projects and build new successes together.

                    Once again, thank you sincerely, and we look forward to our continued relationship and growth in the future.

                    Warm regards,
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
