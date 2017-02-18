<?php

namespace App\Traits;

trait EntityCreatedAtTrait
{
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created_at = new \DateTime();
    }
}
