<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient */
            color: #5c4631;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1em;
            color: #5c4631;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #d4b89b;
            background-color: #fdf5e6;
            color: #5c4631;
        }

        .form-group input:focus {
            outline: none;
            border-color: #8c7156;
            background-color: #fff;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #8c7156;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        .text-center a {
            color: #8c7156;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscription</h1>

        <!-- Affichage des erreurs de validation -->
        <?php if($errors->any()): ?>
            <div class="error-message">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">S'inscrire</button>
        </form>

        <div class="text-center">
            <p>Déjà un compte ? <a href="<?php echo e(route('login')); ?>">Se connecter</a></p>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient */
            color: #5c4631;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1em;
            color: #5c4631;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #d4b89b;
            background-color: #fdf5e6;
            color: #5c4631;
        }

        .form-group input:focus {
            outline: none;
            border-color: #8c7156;
            background-color: #fff;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #8c7156;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        .text-center a {
            color: #8c7156;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscription</h1>

        <!-- Affichage des erreurs de validation -->
        <?php if($errors->any()): ?>
            <div class="error-message">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">S'inscrire</button>
        </form>

        <div class="text-center">
            <p>Déjà un compte ? <a href="<?php echo e(route('login')); ?>">Se connecter</a></p>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient */
            color: #5c4631;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1em;
            color: #5c4631;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #d4b89b;
            background-color: #fdf5e6;
            color: #5c4631;
        }

        .form-group input:focus {
            outline: none;
            border-color: #8c7156;
            background-color: #fff;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #8c7156;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
        }

        .text-center a {
            color: #8c7156;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscription</h1>

        <!-- Affichage des erreurs de validation -->
        <?php if($errors->any()): ?>
            <div class="error-message">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">S'inscrire</button>
        </form>

        <div class="text-center">
            <p>Déjà un compte ? <a href="<?php echo e(route('login')); ?>">Se connecter</a></p>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/auth/register.blade.php ENDPATH**/ ?>