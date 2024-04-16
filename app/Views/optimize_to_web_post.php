<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>imgFORMAT.com - Editor de Imagens Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"
        integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css"
        integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        img {
            display: block;
            max-width: 100%;
        }
    </style>

</head>

<body>
    <div class="container">
        <?= $this->include('navbar') ?>
    </div>

    <div class="columns is-multiline">

        <div class="column is-8 is-offset-2">
            <div class="card has-text-centered">
                <div class="card-content">

                        <h2>Imagem Final</h2>
                        <figure class="image">
                            <img id="imageCropped" src="<?= esc($image) ?>" alt="<?= esc($image) ?>" style="border: 1px solid #555;">
                        </figure>

                        <a class="button is-fullwidth is-link" href="<?= esc($image) ?>" download>Download</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>