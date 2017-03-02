<?php

namespace AppBundle\Listener;


use AppBundle\Entity\Video;
use AppBundle\Services\DeleteImgService;
use AppBundle\Services\UploadService;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class VideoListener
{
    private $uploadService;
    private $imageLoad;
    private $deleteImgService;


    public function __construct(UploadService $uploadService, DeleteImgService $deleteImgService)
    {
        $this->uploadService = $uploadService;
        $this->deleteImgService = $deleteImgService;
    }

    /**
     * @param Video $entity
     * @param LifecycleEventArgs $args
     */
    public function prePersist(Video $entity, LifecycleEventArgs $args){

        $image = $entity->getNameVideo();

        $fileName = $this->uploadService->upload($image);

        $entity->setNameVideo($fileName);
    }

    public function preUpdate(Video $entity, LifecycleEventArgs $args){

        $image = $entity->getNameVideo();

        $fileName = $this->uploadService->upload($image);


        $entity->setNameVideo($fileName);
    }

    public function postLoad(Video $entity, LifecycleEventArgs $args){
        $this->imageLoad = $entity->getNameVideo();
    }

    public function postRemove(Video $entity, LifecycleEventArgs $args){
        $this->deleteImgService->removeImg($this->imageLoad);

    }

}