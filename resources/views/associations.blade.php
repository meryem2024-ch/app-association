<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associations de la ville : {{ $ville->nom }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b);
            color: #5c4631;
        }

        .container {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 20px;
        }

        .alert-success {
            color: green;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        .associations-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: flex-start;
        }

        .association-card {
            border: 1px solid #ddd;
            width: calc(33% - 10px);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .association-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .association-card h3 {
            color: #5c4631;
        }

        .association-card p {
            color: #8c7156;
        }

        .comment-section, .rating-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f7f1e9;
            border-radius: 8px;
        }

        .interactive-stars {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        .interactive-stars .star {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .interactive-stars .star.active {
            color: #ffd700;
            transform: scale(1.2);
        }

        .interactive-stars .rating-value {
            font-size: 16px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #8c7156;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1em;
            margin-top: 10px;
            display: inline-block;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .auth-warning {
            font-size: 1.1em;
            color: #bf6d5d;
        }

        .comment-input {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
        }

        .comment-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #8c7156;
            color: white;
            border-radius: 8px;
            font-size: 1.1em;
            transition: transform 0.2s;
        }

        .comment-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .association-card {
                width: calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .association-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('home') }}" class="btn">Retour à la page d'accueil</a> <!-- Bouton en haut -->

    @auth
        <h2>Bonjour, {{ Auth::user()->name }} !</h2>
    @endauth

    <h1>Associations à {{ $ville->nom }}</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @auth
        <a href="{{ route('association.create', $ville->id) }}" class="btn">Ajouter une nouvelle association</a>
    @else
        <p class="auth-warning">Vous devez être connecté pour ajouter une association.</p>
        <a href="{{ route('login') }}" class="btn">Se connecter</a>
    @endauth

    <h2>Liste des associations</h2>

    <div class="associations-wrapper">
        @foreach($associations as $association)
            <div class="association-card">
                <h3>{{ $association->nom }}</h3>
                <p>{{ $association->description }}</p>
                <p><strong>Contact :</strong> {{ $association->contact }}</p>
                <p><strong>Status :</strong> {{ $association->status }}</p>

                <div class="comment-section">
                    <h4>Commentaires :</h4>
                    @foreach($association->comments as $comment)
                        <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>
                    @endforeach

                    @auth
                        <form action="{{ route('association.comment.store', $association->id) }}" method="POST">
                            @csrf
                            <textarea name="comment" class="comment-input" placeholder="Écrivez votre commentaire..." required></textarea>
                            <button type="submit" class="comment-btn">Ajouter un commentaire</button>
                        </form>
                    @else
                        <p class="auth-warning">Vous devez être connecté pour écrire un commentaire.</p>
                    @endauth
                </div>

                <div class="rating-section">
                    <h4>Évaluations :</h4>
                    <div class="interactive-stars" data-association-id="{{ $association->id }}">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="far fa-star star" data-value="{{ $i }}" 
                               @if ($association->ratings->where('user_id', auth()->id())->first() && $association->ratings->where('user_id', auth()->id())->first()->rating >= $i) 
                                   class="star active" 
                               @endif></i>
                        @endfor
                        <span class="rating-value">
                            ({{ $association->ratings->avg('rating') ? round($association->ratings->avg('rating'), 1) : '0' }} étoiles)
                        </span>
                    </div>

                    @auth
                        <form action="{{ route('association.rating.store', $association->id) }}" method="POST" class="rating-form">
                            @csrf
                            <input type="hidden" name="rating" value="0" class="rating-input">
                            <button type="submit" class="btn">Confirmer l'évaluation</button>
                        </form>
                    @else
                        <p class="auth-warning">Vous devez être connecté pour évaluer.</p>
                    @endauth
                </div>

            </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('.interactive-stars').forEach(container => {
        const stars = container.querySelectorAll('.star');
        const ratingInput = container.nextElementSibling.querySelector('.rating-input');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;

                // Activer les étoiles jusqu'à la sélection
                stars.forEach(s => s.classList.remove('active'));
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('active');
                }
            });

            // Hover effect
            star.addEventListener('mouseenter', function () {
                const value = this.getAttribute('data-value');
                stars.forEach((s, index) => {
                    s.style.color = index < value ? '#ffd700' : '#ddd';
                });
            });

            star.addEventListener('mouseleave', function () {
                stars.forEach(s => s.style.color = s.classList.contains('active') ? '#ffd700' : '#ddd');
            });
        });
    });
</script>

</body>
</html>
