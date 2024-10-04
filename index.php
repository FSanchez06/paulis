<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="applications/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Fabricacion Saltos</title>
</head>
<body>
    <!--Header - menu-->
    <header>
        <div class="header-content">
            <div class="logo">
                <a href="index.php"><h1>Fabrica<b>Saltos</b></h1></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i>Inicio</a></li>
                        <li><a href="#About"><i class="fas fa-info-circle"></i>Sobre Nosotros</a></li>
                        <li><a href="#Productos" class="text-menu-selected"><i class="fas fa-file-alt"></i>Productos</a></li>
                        <li><a href="#Contacto"><i class="fas fa-headset"></i>Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="icon">
                <a href="view/LoginRegister.php" title="Login"><i class="fas fa-user-circle"></i></a>
            </div>
        </div>
    </header>

    <!--Portada-->
    <div class="article-container-cover">
        <div class="container-info-cover">
            <h1>¡Los Productos son de Excelente Calidad!</h1>
            <p>Descubre las últimas tendencias en bolsos, maletas, morrales, billeteras y mucho más.</p>
            <div class="main_btn">
                <a href="#Productos">¡Pide ya!</a>
            </div>
        </div>
    </div>

    <div class="" id="About">
        <section>
            <div class="main">
                <div class="men_text">
                    <h1>Las mejores <span>Maletas</span><br> de la ciudad</h1>
                    <p>Las mejores maletas de la ciudad hechas completamente a mano por nuestros confeccionistas para asegurar la mejor calidad para todos nuestros clientes. Si buscas un morral que se ajuste a tus necesidades, estás en el lugar correcto. Contáctanos y pide ahora tu morral preferido.</p>
                    <div class="main_btn">
                        <a href="Productos">¡Pide ya!</a>
                    </div>
                </div>
                <div class="main_image">
                    <img src="image/er_foto.png" alt="Maletas">
                </div>
            </div>
        </section>

        <!--About-->
        <div class="about" id="About">
            <div class="about_main">
                <div class="main_image">
                    <img src="image/about.png" alt="Sobre Nosotros">
                </div>
                <div class="about_text">
                    <h1><span>Sobre</span> Nosotros</h1>
                    <h3>¿Por qué nuestras maletas son las mejores?</h3>
                    <p>Porque están hechas a mano por costureros experimentados en la confección de maletas de alta calidad, que gracias a su buena mano y la pasión con la cual hacen su trabajo garantizan una mayor calidad para todos nuestros clientes.</p>
                </div>
            </div>
        </div>
    </div>

    <!--productos-->
    <div id="Productos">
        <div class="product-container">
            <div class="product-card">
                <img src="image/imagen1.png" alt="maleta totto">
                <h2>Maleta totto</h2>
                <div class="product-info">
                    <p>Precio por unidad: $50.000</p>
                    <p>Categoria: Morrales</p>
                </div>
                <div class="product-btn">
                    <a href="#" onclick="addToCart(1, 'Maleta totto', 50000)">Agregar al carrito</a>
                </div>
            </div>
            <div class="product-card">
                <img src="image/imagen2.png" alt="Bolso Dolce & Gabbana">
                <h2>Bolso Dolce & Gabbana</h2>
                <div class="product-info">
                    <p>Precio por unidad: $6.000.000</p>
                    <p>Categoria: Bolsos</p>
                </div>
                <div class="product-btn">
                    <a href="#" onclick="addToCart(2, 'Bolso Dolce & Gabbana', 6000000)">Agregar al carrito</a>
                </div>
            </div>
            <div class="product-card">
                <img src="image/imagen3.png" alt="Tula Adidas">
                <h2>Tula Adidas</h2>
                <div class="product-info">
                    <p>Precio por unidad: $5.000</p>
                    <p>Categoria: Tulas</p>
                </div>
                <div class="product-btn">
                    <a href="#" onclick="addToCart(3, 'Tula Adidas', 5000)">Agregar al carrito</a>
                </div>
            </div>
            <div class="product-card">
                <img src="image/imagen4.png" alt="Maleta de Viajes">
                <h2>Maleta de Viaje</h2>
                <div class="product-info">
                    <p>Precio por unidad: $100.000</p>
                    <p>Categoria: Morrales</p>
                </div>
                <div class="product-btn">
                    <a href="#" onclick="addToCart(4, 'Maleta de Viaje', 100000)">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de contacto -->
    <div class="contact-section" id="Contacto">
        <h2>Contáctanos</h2>
        <p>Si tienes alguna pregunta, no dudes en contactarnos:</p>
        
        <form action="enviar_mensaje.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <!--Footer-->
    <?php require_once ('applications/assets/Footer.php')  ?>

</body>
</html>
