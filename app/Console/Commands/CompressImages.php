<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CompressImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:opt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for optimizing the images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {

        ini_set('memory_limit', '-1');
        foreach (glob(storage_path('app/public/img/*')) as $file) {

            $filename = basename($file);
            $path = storage_path('app/public/img/' . $filename);

            if ($this->getImage($path) != NULL) {

                $withoutExtension = pathinfo($file)['filename'];
                $extension = pathinfo($file)['extension'];

                $newFilename = 'public/storage/img/thumbs/' . $withoutExtension . '_thumb' . '.' . $extension;
                $source = $this->getImage($path);
                list($width, $height) = getimagesize($path);

                $newWidth = 400;
                $newHeight = ($height / $width) * $newWidth;


                $destination = imagecreatetruecolor($newWidth, $newHeight);


                imagecopyresampled($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                $this->imageExt($destination, $newFilename, $path);
            }
        }
    }

    function getImage($path)
    {
        switch (mime_content_type($path)) {
            case 'image/png':
                $source = imagecreatefrompng($path);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($path);
                break;
            case 'image/jpeg':
                $source = imagecreatefromjpeg($path);
                break;
            case 'image/bmp':
                $source = imagecreatefrombmp($path);
                break;
            default:
                $source = null;
        }
        return $source;
    }

    function imageExt($destination, $newFilename, $path, $quality = 70)
    {
        switch (mime_content_type($path)) {
            case 'image/png':
                $transparentIndex = imagecolorallocate($destination, 0, 0, 0); //for png background
                imagecolortransparent($destination, $transparentIndex); //for transparent background

                return imagepng($destination, $newFilename, $quality / 10);
                break;
            case 'image/gif':
                $transparent = imagecolorallocatealpha($destination, 255, 255, 255, 127);
                imagefill($destination, 0, 0, $transparent);
                imagealphablending($destination, true);

                return imagegif($destination, $newFilename);
                break;
            case 'image/jpeg':

                return imagejpeg($destination, $newFilename, $quality);
                break;
            case 'image/bmp':

                return imagebmp($destination, $newFilename, $quality);
                break;
            default:
                return null;
        }
    }

    public function cropImg()
    {

        //Cropping image

        $filename = 'public/img/_MG_1085.jpg';
        $newFilename = 'public/img/test2.jpg';
        $image = imagecreatefromjpeg($filename);

        $given_width = 3500;
        $width = imagesx($image);
        $height = imagesy($image);

        $new_width = $given_width;
        $new_height = ($height / $width) * $new_width;
        $thumb = imagecreatetruecolor($new_width, $new_height);

        // Resize and compress
        imagecopy($thumb, $image, 0, 0, 0, 0, $new_width, $new_height);
        imagejpeg($thumb, $newFilename, 40);
    }
}
