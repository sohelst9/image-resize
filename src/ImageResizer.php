<?php

namespace Sohel\ImageProcessor;

class ImageResizer
{
    public function downloadAndResize($url, $width, $height)
    {
        // ইমেজ ডাউনলোড করুন
        $imageContent = file_get_contents($url);
        if ($imageContent === false) {
            throw new \Exception("Unable to download image from URL: $url");
        }

        // ইমেজ তৈরি করুন
        $image = imagecreatefromstring($imageContent);
        if ($image === false) {
            throw new \Exception("Unable to create image from downloaded content.");
        }

        // নতুন ইমেজ তৈরি করুন
        $resizedImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));

        // WebP ফরম্যাটে সেভ করুন
        $fileName = 'image_' . time() . '.webp';
        imagewebp($resizedImage, $fileName);
        
        // ইমেজগুলি পরিষ্কার করুন
        imagedestroy($image);
        imagedestroy($resizedImage);

        return $fileName;
    }
}
