<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle association</title>
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
            max-width: 1000px;
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

        /* Formulaire et erreurs */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1.1em;
            color: #5c4631;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Style des boutons */
        button[type="submit"] {
            padding: 10px 20px;
            font-size: 1.1em;
            background-color: #8c7156;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Affichage des erreurs */
        .error-message {
            color: red;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        /* Lien de retour */
        a {
            color: #8c7156;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-size: 1.2em;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Ajouter une nouvelle association pour la ville : {{ $ville->nom }}</h1>

        <!-- Afficher les erreurs de validation -->
        @if($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Formulaire d'ajout d'association -->
        <form action="{{ route('association.store', $ville->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'association</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" value="{{ old('contact') }}">
            </div>

            <button type="submit">Ajouter l'association</button>
        </form>

        <a href="{{ route('ville.associations', $ville->id) }}">Retour aux associations</a>
    </div>

</body>
</html>
