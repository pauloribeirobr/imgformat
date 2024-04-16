<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>imgFORMAT.com - Editor de Imagens Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>

<body>
    
    <div class="container">
        <?= $this->include('navbar') ?>
    </div>


    <div class="columns">
        <div class="column is-8 is-offset-2">
            <section class="hero">
                <div class="container">
                    <div class="hero-body has-text-centered">
                        <p class="title">Edite suas imagens sem instalar nada</p>
                        <p class="subtitle">E o principal... de graça para sempre!</p>
                    </div>
                </div>

            </section>
        </div>
    </div>
    <div class="columns">
        <div class="column is-4 is-offset-4">

            <div class="card">
                <div class="card-image">
                    <a href="optimize-to-web">
                        <figure class="image is-4by3">
                            <img src="images/optimize-to-web.webp" alt="Otimizar para WEB" />
                        </figure>
                    </a>
                </div>
                <div class="card-content">
                    <div class="content has-text-centered">
                        <a href="optimize-to-web">
                            <h2>Otimizar para WEB</h2>
                        </a>
                        <!--  no futuro - 400px, 700px e 1440 px-->
                        <p>Importe uma imagem, corte e converta para o formato webp em 1400px de largura</p>
                    </div>
                </div>
            </div>

        </div>
    </div>



</body>

</html>