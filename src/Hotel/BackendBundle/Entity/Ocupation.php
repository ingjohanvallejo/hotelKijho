<?php

namespace Hotel\BackendBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
 use Symfony\Component\Validator\Constraints as Assert;
/*
 * Esta entidad permite manejar la informacion de las ocupaciones
 * de los empleados del hotel
 */

/*@author Kijho Technologies - felipe Vallejo
*/

/** 
 * @ORM\Table("ocupations")
 * @ORM\Entity
 */

class Ocupation
{
    /**
     * Identificador de la ocupacion
     * @ORM\Id
     * @ORM\Column(name="ocu_id",type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * Nombre que describe la ocupacion
     * @ORM\Column(name="ocu_user",type="string", length=20)
     * @Assert\NotBlank(message = "Please enter the ocupation name")
     */
    protected $name;
    /**
     * Descripcion detallada de la ocupacion
     * @ORM\Column(name="ocu_description",type="text")
     * @Assert\NotBlank(message = "Please enter the ocupation description")
     */
    protected $description;
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }


    public function __toString() {
    return $this->name;
    
    }
    
}
