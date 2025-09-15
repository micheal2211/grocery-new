<!-- resources/views/success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>worksuc</title>
    <style>
        body {
            background-color: #f8fafc;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-box {
            background: white;
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .message-box h1 {
            color: green;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h1>✅ Success!</h1>
        <p>{{ session('message') ?? 'Form submitted successfully.' }}</p>
        <a href="{{ route('workers.form') }}">← Go back to form</a>
    </div>
</body>
</html>
