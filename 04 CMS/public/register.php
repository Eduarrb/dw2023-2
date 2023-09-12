<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Rajdhani:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kompi</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <section class="auth">
        <div class="auth__data">
            <img src="img/logo-kompi-dark.png" alt="" class="auth__data__logo mb-10">
            <h1 class="titulo-n2 text-center mb-5">Costumer Register</h1>
            <p class="descri text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget ultricies nibh mattis tortor egestas dis at ipsum.</p>
            <form action="" class="auth__data__form mt-4">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Name">
                    <div class="auth__data__form--error">Este campo no puede estar vacio</div>
                </div>
                <div class="form-group mb-2">
                    <input type="text" placeholder="Email">
                </div>
                <div class="form-group mb-2">
                    <input type="password" placeholder="Password">
                </div>
                <div class="form-group mb-5">
                    <input type="password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Log In" class="btnFullWidth color-blanco">
                </div>
            </form>
        </div>
        <div class="auth__loginImgBox"></div>
    </section>
</body>
</html>