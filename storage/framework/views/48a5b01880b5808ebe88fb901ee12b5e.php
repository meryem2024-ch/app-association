<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
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
            max-width: 400px;
            margin: 80px auto;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #5c4631;
        }

        .form-label {
            font-weight: bold;
            color: #5c4631;
        }

        .form-control {
            border: 2px solid #d4b89b;
            border-radius: 8px;
            padding: 10px;
            font-size: 1em;
            color: #5c4631;
        }

        .form-control:focus {
            border-color: #8c7156;
            box-shadow: 0 0 5px rgba(140, 113, 86, 0.5);
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            color: white;
            background: #8c7156;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            text-decoration: none;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .alert {
            background-color: #f8c471;
            color: #5c4631;
            border: none;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert ul li {
            list-style-type: disc;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Connexion Administrateur</h1>

    
    <?php if($errors->any()): ?>
        <div class="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.login.post')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" name="email" class="form-control" id="email" required value="<?php echo e(old('email')); ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/admin/login.blade.php ENDPATH**/ ?>