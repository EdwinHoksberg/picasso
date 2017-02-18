<?php

namespace App\Traits;

trait EntityUpdatedAtTrait
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated_at = new \DateTime();
    }
}
