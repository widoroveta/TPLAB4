<?php
namespace Models;

class Career
{
    private $careerId;
    private $description;
    private $active;


    
    public function getCareerId()
    {
        return $this->careerId;
    }

    
    public function setCareerId($careerId)
    {
        $this->careerId = $careerId;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

   
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public function getActive()
    {
        return $this->active;
    }

    
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}

?>