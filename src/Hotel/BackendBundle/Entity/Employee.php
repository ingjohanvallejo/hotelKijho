<?php

namespace Hotel\BackendBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
/*
 * Esta entidad permite manejar la informacion de los empleados
 */

/*@author Kijho Technologies - felipe Vallejo
*/

/** 
 * @ORM\Table("employees")
 * @ORM\Entity
 */

class Employee extends Person implements UserInterface,  \Serializable
{
    const USER_ADMINISTRATOR    =   1;
    const USER_RECEPTIONIST    =   2;
    
    /**
     * @ORM\ManyToOne(targetEntity="Hotel\BackendBundle\Entity\Ocupation")
     * @ORM\JoinColumn(name="emplo_id_ocupation", referencedColumnName="ocu_id")
     */
    protected $ocupation;
    /**
     * password del empleado
     * @ORM\Column(name="emplo_password",type="text")
     */
    protected $password;
    /**
     * salt del empleado
     * @ORM\Column(name="emplo_salt",type="text")
     */
    protected $salt;
    /**
     * tipo del empleado
     * @ORM\Column(name="emplo_type",type="integer")
     */
    protected $type;
    
    public function getOcupation() {
        return $this->ocupation;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setOcupation(\Hotel\BackendBundle\Entity\Ocupation $ocupation) {
        $this->ocupation = $ocupation;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setSalt() {
        $this->salt = $this->generateSalt();
    }

    
    public function eraseCredentials() {
        
    }

    public function getRoles() {
        if($this->isActive==true){
            if($this->type == self::USER_ADMINISTRATOR)
                return array('ROLE_ADMINISTRATOR');
            elseif($this->type == self::USER_RECEPTIONIST)
                return array('ROLE_RECEPCIONIST');
            else{
                 return array('ROLE_INACTIVE');
            }
        }
        else{
            return array('ROLE_INACTIVE');
        }
        
    }

    public function getSalt() {
        return $this->salt;
    }  
    
    public function generateSalt() {
        return md5(time().mt_rand());
    }

    public function getUsername() {
        return $this->email;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    
      public function getTextType($type=null) {
        if($type == null)
            $typeUser = $this->type;
        else
            $typeUser = $type;
        
        $text = '';
        
        switch ($typeUser) {
            case self::USER_ADMINISTRATOR:
                $text = 'Administrator';
                break;
            
            case self::USER_RECEPTIONIST:
                $text = 'Recepcionist';
                break;
            
            default:
                break;
         }
        return $text;
       }

    public function serialize() {
        
        return serialize(array(
                $this->id,
                $this->name,
                $this->lastname,
                $this->email
            ));
        
    }

    public function unserialize($serialized) {
        list(
        $this->id,
        $this->name,
        $this->lastname,
        $this->email,
        ) = unserialize($serialized);
        
    }

}
?>