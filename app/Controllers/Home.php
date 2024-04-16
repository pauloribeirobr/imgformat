<?php

namespace App\Controllers;

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

        /*
            Regrinha de três básica

            $imagemOriginalLargura   $imagemOriginalAltura
            --------------------- = ----------------------
            1440                     $imagemAltura

            $imagemAltura = $imagemOriginalLargura * (1440 / $imagemOriginalAltura )
        */

        $imagemLargura = 770;
        $imagemAltura = $imagemOriginalAltura * ($imagemLargura / $imagemOriginalLargura);
        
        //var_dump($imagemLargura, $imagemAltura);
        //dd($imagemAltura);
        
        $newImage = imagecreatetruecolor($imagemLargura, $imagemAltura);

        
        // Resize the image 
        imagecopyresized($newImage, $image, 0, 0, 0, 0, $imagemLargura, $imagemAltura, $imagemOriginalLargura, $imagemOriginalAltura); 
        
        $imageDirectory = FCPATH . "temp/" . $session->session_id . "/";
        $imageDirectoryDisplay = "temp/" . $session->session_id . "/";

        if(!file_exists($imageDirectory)) {
            mkdir($imageDirectory);
        }

        $imageName = $this->getBaseName($postData["imageName"]) . ".webp";
        
        imagewebp($newImage, $imageDirectory . $imageName);

        $data = [
            'image'   => $imageDirectoryDisplay . $imageName,
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
