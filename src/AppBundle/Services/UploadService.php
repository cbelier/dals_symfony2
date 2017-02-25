<?php

namespace AppBundle\Services;

use AppBundle\Services\Utils\StringService;


class UploadService
{
    private $stringUtilService;
    private $uploadDir;


    public function __construct(StringService $stringUtilService, $uploadDir)
    {
        $this->stringUtilService = $stringUtilService;

        $this->uploadDir = $uploadDir;
    }

    public function upLoadService($image){

        //$servicesUtils = $this->get('admin.services.utils.string');
        $imageName = $this->stringUtilService->generateUniqId();

        $file = $imageName.'.'.$image->guessExtension();
        $image->move($this->uploadDir, $file);


        return $file;

    }

}