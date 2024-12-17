<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> 
    <style>
        
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0056b3;
            padding: 1rem;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
        .navbar-nav .nav-item:not(:last-child) {
            margin-right: 1rem;
        }
        .nav-link:hover {
            color: #d1e0f0 !important;
        }
     

        /* Footer */
        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 1rem;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }

                /* styles.css */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1, h2 {
            color: #1a1818;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Pet Shelter Flensburg</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/adopt">Adopt</a></li>
                    <li class="nav-item"><a class="nav-link" href="/guidelines">Guidelines</a></li>
                    <li class="nav-item"><a class="nav-link" href="/donate">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="/volunteer">Volunteer</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/signin">Sign-in</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <section id="intro">
            <h1>Guidelines</h1>
            <p>Welcome to our guidelines page. Here are the rules and expectations for contributing to and using our site.</p>
        </section>

        <section id="code-of-conduct">
            <h2>Code of Conduct</h2>
            <p>Respect others and foster a welcoming environment. Love your pussys and pet them dogs </p>
            
        </section>

        <!-- Add more sections as needed -->
    </main>


 

    <!-- Should this be removed? 
    <?php echo $__env->make('info-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    -->
    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Users/leventesohar/webtech/webtech-app/resources/views/guidelines.blade.php ENDPATH**/ ?>