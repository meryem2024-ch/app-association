<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Association</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient */
            color: #5c4631;
        }

        .container {
            padding: 40px 20px;
            max-width: 800px;
            margin: auto;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            margin-bottom: 15px;
            color: #5c4631;
        }

        strong {
            color: #8c7156;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background: #8c7156;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            text-decoration: none;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $details['Nom'] }}</h1>
        <p><strong>Description :</strong> {{ $details['Description'] }}</p>
        <p><strong>Contact :</strong> {{ $details['Contact'] }}</p>
        
        <div class="text-center mt-4">
            <a href="{{ route('welcome') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
</body>
</html>
