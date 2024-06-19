<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delayed events</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Top 10 delayed events</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Project ID (shop)</th>
                    <th>Delay</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event['project_id'] }}</td>
                    <td>{{ $event['delay'] }} sec</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
