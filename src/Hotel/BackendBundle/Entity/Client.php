<?php

namespace Hotel\BackendBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
 use Symfony\Component\Validator\Constraints as Assert;
/*
 * Esta entidad permite manejar la informacion de los empleados
 */

/*@author Kijho Technologies - felipe Vallejo
*/

/** 
 * @ORM\Table("clients")
 * @ORM\Entity
 */

    class Client extends Person
    {
        
        const CLIENT_TYPE_COMMON      = 1;
        const CLIENT_TYPE_OCATIONAL   = 2;
        const CLIENT_TYPE_PREFERENCE  = 3;

    /**
     * tipo de cliente
     * @ORM\Column(name="clie_type",type="string", length=20,nullable=true)
     */
        protected $type;
        
        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

      public function getTextType($type=null) {
        if($type == null)
            $typeClient = $this->type;
        else
            $typeClient = $type;
        
        $text = '';
        
        switch ($typeClient) {
            case self::CLIENT_TYPE_COMMON:
                $text = 'Common';
                break;
            
            case self::CLIENT_TYPE_OCATIONAL:
                $text = 'Ocational';
                break;
            
            case self::CLIENT_TYPE_PREFERENCE:
                $text = 'Preference';
                break;
            
            default:
                break;
         }
        return $text;
       }

    }
?>