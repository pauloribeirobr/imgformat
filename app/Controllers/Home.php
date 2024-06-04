<?php

namespace App\Controllers;

use App\Libraries\Util;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function optimizeToWeb(): string
    {
        return view('optimize_to_web');
    }

    public function optimizeToWebPost(): string
    {
        helper('filesystem');


        $session = session();

        $request = service('request');
        $postData = $request->getPost();

        $image = $this->decodeImage($postData["imageCroppedUpload"]);

        $imagemOriginalLargura = $postData["imageLargura"];
        $imagemOriginalAltura = $postData["imageAltura"];

        //var_dump($request);

        /*
            Regrinha de três básica

            $imagemOriginalLargura   $imagemOriginalAltura
            --------------------- = ----------------------
            1440                     $imagemAltura

            $imagemAltura = $imagemOriginalLargura * (1440 / $imagemOriginalAltura )
        */

        $imagemLargura = 770;
        $imagemAltura = $imagemOriginalAltura * ($imagemLargura / $imagemOriginalLargura);
        
        $newImage = imagecreatetruecolor($imagemLargura, $imagemAltura);
        //preservar a transparência
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
        imagefilledrectangle($newImage, 0, 0, $imagemLargura, $imagemAltura, $transparent);
        
        // Resize the image 
        //imagecopyresized($newImage, $image, 0, 0, 0, 0, $imagemLargura, $imagemAltura, $imagemOriginalLargura, $imagemOriginalAltura); 
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $imagemLargura, $imagemAltura, $imagemOriginalLargura, $imagemOriginalAltura); 
        
        $imageDirectory = FCPATH . "temp/" . $session->session_id . "/";
        $imageDirectoryDisplay = "temp/" . $session->session_id . "/";

        if(!file_exists($imageDirectory)) {
            mkdir($imageDirectory);
        }

        $imageName = $this->getBaseName($postData["imageName"]) . "." . $postData["imageExtension"];

        if($postData["imageExtension"] == "png") {
            imagepng($newImage, $imageDirectory . $imageName, $postData["imageQualityPNG"]);
        }

        if($postData["imageExtension"] == "webp") {
            imagewebp($newImage, $imageDirectory . $imageName, $postData["imageQualityWEBP"]);
        }

        $data = [
            'image'                 => $imageDirectoryDisplay . $imageName,
            'imageName'             => $imageName,
            'imageSize'             => Util::humanFilesize(filesize($imageDirectoryDisplay . $imageName), 2),
            'imageDimensions'       => round($imagemAltura,2) . "px x " . round($imagemLargura,2) . "px"
        ];
        
        return view('optimize_to_web_post', $data);
    }


    private function decodeImage($base64)
    {
        $explodeBase64 = explode(";base64,", $base64);
        $imageData = base64_decode($explodeBase64[1]);
        return imagecreatefromstring($imageData);
    }

    private function getBaseName($fileName)
    {
        return preg_replace('/\.\w+$/', '', $fileName);
    }
}
