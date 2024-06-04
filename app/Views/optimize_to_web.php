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
        .checkerboard {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #555;
            background-image:
                linear-gradient(45deg, #777 25%, transparent 25%, transparent 75%, #777 75%),
                linear-gradient(45deg, #777 25%, transparent 25%, transparent 75%, #777 75%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }

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
            <section class="hero">
                <div class="container">
                    <div class="hero-body has-text-centered">
                        <p class="title">Otimizar para WEB</p>
                        <p class="subtitle">Envie uma imagem para iniciar a otimização</p>
                    </div>
                </div>

            </section>
        </div>
    </div>
    <div class="columns is-multiline">
        <div class="column is-8 is-offset-2">

            <div class="card">
                <div class="card-content">

                        Clique aqui e pressione<span class="file-icon"><i class="fa-solid fa-clipboard"></i></span> CTRL + V para colar a imagem copiada na sua Área de Transferência

                </div>
            </div>

            <div class="card">
                <div class="card-content">

                    <div id="fileUploader" class="file is-boxed is-fullwidth">
                        <label class="file-label">
                            <input class="file-input" type="file" id="imageToUpload"
                                accept="image/png, image/gif, image/jpeg image/bmp" onchange="onFileUploaded(event)" />
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label has-text-centered"> Selecionar imagem… </span>
                            </span>
                            <span class="file-name"> Nenhum arquivo selecionado </span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="column is-4 is-offset-2">
            <div class="card">
                <div class="card-content">

                    <div class="buttons has-addons is-centered">
                        <button id="grid16x9" class="button" onclick="grid16x9()" disabled>
                            <span>16 x 9</span>
                        </button>
                        <button id="grid4x3" class="button" onclick="grid4x3()">
                            <span>4 x 3</span>
                        </button>

                        <button id="grid1x1" class="button" onclick="grid1x1()">
                            <span>1 x 1</span>
                        </button>

                        <button id="grid3x4" class="button" onclick="grid3x4()">
                            <span>3 x 4</span>
                        </button>
                    </div>

                    <div class="buttons has-addons is-centered">
                        <button class="button" onclick="rotate()">
                            <span class="icon is-small">
                                <i class="fa-solid fa-rotate-right"></i>
                            </span>
                        </button>
                        <button class="button" onclick="zoomIn()">
                            <span class="icon is-small">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </button>
                        <button class="button" onclick="zoomOut()">
                            <span class="icon is-small">
                                <i class="fa-solid fa-minus"></i>
                            </span>
                        </button>
                    </div>

                    <figure class="image">
                        <img id="imageToCrop" src="" alt="">
                    </figure>

                </div>
            </div>
        </div>


        <div class="column is-4">
            <div class="card has-text-centered">
                <div class="card-content">
                    <form method="post">
                        <div class="field">
                            <label for="imageExtension" class="label">Formato de Imagem</label>
                            <div class="select is-fullwidth">
                                <select name="imageExtension" id="imageExtension" onchange="loadQualityImageField()">
                                    <option>png</option>
                                    <option>webp</option>
                                </select>
                            </div>
                        </div>

                        <div class="field" id="blockQualityPNG" style="display:none">
                            <label for="imageQualityPNG" class="label">Qualidade do PNG</label>
                            <div class="select is-fullwidth">
                                <select name="imageQualityPNG" id="imageQualityPNG">
                                    <option>9</option>
                                    <option>5</option>
                                    <option>0</option>
                                </select>
                            </div>
                        </div>

                        <div class="field" id="blockQualityWEBP" style="display:none">
                            <label for="imageQualityWEBP" class="label">Qualidade do WebP</label>
                            <div class="select is-fullwidth">
                                <select name="imageQualityWEBP" id="imageQualityWEBP">
                                    <option>100</option>
                                    <option>50</option>
                                    <option>0</option>
                                </select>
                            </div>
                        </div>

                        <button class="button is-fullwidth is-link" id="btnEnviar" disabled>Enviar</button>

                        <h2>Preview</h2>
                        <p id="altura">0 px</p>
                        <p id="largura">0 px</p>

                        <input type="hidden" id="imageAltura" name="imageAltura" value=""/>
                        <input type="hidden" id="imageLargura" name="imageLargura" value=""/>
                        <input type="hidden" id="imageCroppedUpload" name="imageCroppedUpload" value=""/>
                        <input type="hidden" id="imageName" name="imageName" value=""/>
                        <div class="checkerboard">
                        <figure class="image">
                            <img id="imageCropped" src="" alt="" style="border: 1px solid #555;">
                        </figure>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

        let cropper;
        let aspectRatio = 1.777777778; //"16x9";

        window.addEventListener("paste", function(e){

            var item = Array.from(e.clipboardData.items).find(x => /^image\//.test(x.type));
      
            var blob = item.getAsFile();

            const imgtag = document.getElementById("imageToCrop");

            var img = new Image();

            img.onload = function(){
                //document.body.appendChild(this);
                imgtag.src = img.src;
            };

            img.src = URL.createObjectURL(blob);

            if (cropper) {
                cropper.destroy();
            }

            setTimeout(loadCropper, 500);
        });

        function onFileUploaded(event) {

            if (cropper) {
                cropper.destroy();
            }

            const selectedFile = event.target.files[0];
            let reader = new FileReader();
            const imgtag = document.getElementById("imageToCrop");

            imgtag.title = selectedFile.name;

            const fileName = document.querySelector("#fileUploader .file-name");
            fileName.textContent = selectedFile.name;

            const imageName = document.getElementById("imageName");
            imageName.value =selectedFile.name;

            reader.onload = function (event) {
                imgtag.src = event.target.result;
            };

            reader.readAsDataURL(selectedFile);

            setTimeout(loadCropper, 500);
        }

        function loadCropper() {
            
            document.getElementById('btnEnviar').removeAttribute("disabled");
            
            const imgCropped = document.getElementById("imageCropped");
            const image = document.getElementById('imageToCrop');
            const imgCroppedUpload = document.getElementById("imageCroppedUpload");
            document.getElementById('grid16x9').disabled = true;
            cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                dragMode: 'move',
                cropBoxMovable: false,
                cropBoxResizable: false,
                center: true,
                crop(event) {
                    imgCropped.src = this.cropper.getCroppedCanvas().toDataURL();
                    imgCroppedUpload.value = this.cropper.getCroppedCanvas().toDataURL();

                    //console.log("Largura: " + this.cropper.getCroppedCanvas().width + " px");
                    document.getElementById('largura').textContent = "Largura: " + this.cropper.getCroppedCanvas().width + " px";
                    document.getElementById('imageLargura').value = this.cropper.getCroppedCanvas().width
                    //console.log("Altura: " + this.cropper.getCroppedCanvas().height + " px");
                    document.getElementById('altura').textContent = "Altura: " + this.cropper.getCroppedCanvas().height + " px";
                    document.getElementById('imageAltura').value = this.cropper.getCroppedCanvas().height

                },
            });

            cropper.getCroppedCanvas().toDataURL();
        }

        function rotate() {

            if (cropper) {
                cropper.rotate(90);
            }

        }

        function zoomIn() {

            if (cropper) {
                cropper.zoom(0.1);
            }
        }

        function zoomOut() {

            if (cropper) {
                cropper.zoom(-0.1);
            }
        }

        function grid16x9() {

            if (cropper) {

                cropper.setAspectRatio(1.777777778);
                enableBtn();
                document.getElementById('grid16x9').disabled = true;
            }

        }

        function grid4x3() {

            if (cropper) {
                cropper.setAspectRatio(1.333333333);
                enableBtn();
                document.getElementById('grid4x3').disabled = true;
            }

        }

        function grid1x1() {

            if (cropper) {
                cropper.setAspectRatio(1);
                enableBtn();
                document.getElementById('grid1x1').disabled = true;
            }

        }

        function grid3x4() {

            if (cropper) {
                cropper.setAspectRatio(0.75);
                enableBtn();
                document.getElementById('grid3x4').disabled = true;
            }

        }

        function enableBtn() {
            const buttons = document.querySelectorAll(".button");

            for(let i = 0; i < buttons.length; i++) {
                buttons[i].removeAttribute("disabled");
            }
            document.getElementById('btnEnviar').removeAttribute("disabled");
        }

        function loadQualityImageField() {

            const fileExtension = document.getElementById('imageExtension');

            const blockWebp = document.getElementById('blockQualityWEBP');
            const blockPng = document.getElementById('blockQualityPNG');

            if(fileExtension.value === "png") {
                document.getElementById('blockQualityWEBP').style.display = "none";
                document.getElementById('blockQualityPNG').style.display = "block"
            }else{
                document.getElementById('blockQualityWEBP').style.display = "block";
                document.getElementById('blockQualityPNG').style.display = "none"
            }
            console.log(fileExtension.value);
        }

    </script>
</body>

</html>