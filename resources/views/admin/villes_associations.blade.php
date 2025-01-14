<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villes avec Associations en Attente</title>
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
            padding: 20px 40px;
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #5c4631;
        }

        .city-card {
            background: #fff7f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .city-card h3 {
            margin-top: 0;
            color: #5c4631;
        }

        .association-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .association-item {
            background-color: #f8f1e8;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .association-item strong {
            color: #5c4631;
        }

        .btn-confirm {
            background-color: #82e0aa;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .btn-confirm:hover {
            background-color: #66c28b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-confirm i {
            margin-right: 5px;
        }

        .no-data {
            text-align: center;
            margin-top: 40px;
            font-size: 1.2em;
            color: #8c7156;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Villes avec Associations en Attente</h1>

        {{-- Liste des villes --}}
        @foreach ($villes as $ville)
            <div class="city-card">
                <h3>{{ $ville->nom }}</h3>

                <ul class="association-list">
                    {{-- Liste des associations en attente pour la ville --}}
                    @foreach ($ville->associations as $association)
                        @if($association->status == 'en attente')
                            <li class="association-item">
                                <strong>{{ $association->nom }}</strong><br>
                                <em>{{ $association->description }}</em><br>
                                <span>Contact: {{ $association->contact }}</span><br>

                                {{-- Bouton de confirmation --}}
                                <form action="{{ route('admin.association.confirm', $association->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-confirm">
                                        <i class="fas fa-check"></i> Confirmer
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach

        {{-- Message si aucune ville ou association en attente --}}
        @if($villes->isEmpty())
            <p class="no-data">Aucune ville avec des associations en attente.</p>
        @endif
    </div>
</body>
</html>
