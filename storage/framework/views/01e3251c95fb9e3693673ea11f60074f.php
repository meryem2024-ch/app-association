<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Fonts & Colors */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b);
            color: #5c4631;
        }

        header {
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .title {
            font-size: 1.8em;
            font-weight: 700;
            color: #5c4631;
        }

        header .buttons {
            display: flex;
            gap: 15px;
        }

        header .btn {
            padding: 10px 15px;
            font-size: 1em;
            color: #fff;
            background: #8c7156;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        header .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            height: 250px;
            border-radius: 12px;
            background-size: cover;
            background-position: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Transparent overlay */
            z-index: 1;
        }

        .card-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .card h3 {
            margin: 0;
            font-size: 1.8em;
            font-weight: 700;
            color: #fdf5e6; /* Soft color for contrast */
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            background: #8c7156; /* Button matches existing palette */
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .card a:hover {
            background: #6e5640; /* Darker shade for hover effect */
            transform: translateY(-2px);
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            background: #f7f1e9;
            border-top: 2px solid rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #8c7156;
            text-decoration: none;
        }

        .welcome-message {
            font-size: 1.5em;
            font-weight: 700;
            color: #5c4631;
            margin-bottom: 30px;
        }

        .explore-message {
            font-size: 1.8em;
            font-weight: 700;
            color: #5c4631;
            margin-bottom: 40px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <header>
        <div class="title">Bienvenue sur notre site</div>
        <div class="buttons">
            <a href="/" class="btn"><i class="fas fa-home"></i> Accueil</a>
            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="container">
        <div class="explore-message">Explorez nos villes avec leurs associations</div>
        
        <?php if(auth()->guard()->check()): ?>
            <div class="welcome-message">Bonjour, <?php echo e(Auth::user()->name); ?> !</div>
        <?php endif; ?>

        <h2 style="margin-bottom: 30px;">Liste des Villes</h2>
        <div class="card-container">
            <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card" style="background-image: url('<?php echo e(asset('images/' . strtolower(str_replace('é', 'e', $ville->nom)) . '.jpg')); ?>');">
                    <div class="card-content">
                        <h3><?php echo e($ville->nom); ?></h3>
                        <a href="<?php echo e(route('ville.associations', $ville->id)); ?>">
                            <i class="fas fa-arrow-right"></i> Voir les associations
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 - Notre Site. Tous droits réservés. <a href="#">Contactez-nous</a></p>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/welcome.blade.php ENDPATH**/ ?>