<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Fonts & Colors */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient: light to deeper beige */
            color: #5c4631;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #fff7f0;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #5c4631;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fdf5e6;
        }

        .form-group input:focus {
            outline: none;
            border-color: #8c7156;
            box-shadow: 0 0 5px rgba(140, 113, 86, 0.5);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            color: #fff;
            background: #8c7156;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            background: #fbe4d5;
            color: #bf6d5d;
            border-left: 5px solid #bf6d5d;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        .link a {
            color: #8c7156;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>

        
        <?php if($errors->any()): ?>
            <div class="error-message">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>

        <div class="link">
            <p>Vous n'avez pas de compte ? <a href="<?php echo e(route('register')); ?>">Inscrivez-vous ici</a>.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/auth/login.blade.php ENDPATH**/ ?>