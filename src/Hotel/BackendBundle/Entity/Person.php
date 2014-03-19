<?php

namespace Hotel\BackendBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/*
 * Esta entidad permite manejar la informacion de los personas
 */

/*@author Kijho Technologies - felipe Vallejo
*/

/** 
 * @ORM\Table("persons")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap({"client" = "Client","employee" = "Employee"})
 */

class Person
{
    const  MARITAL_STATUS_SINGLE = 1;
    const  MARITAL_STATUS_MARRIED = 2;
    const  MARITAL_STATUS_DIVORCED = 3;
    const  MARITAL_STATUS_WIDOW = 4;
    
    /**
     * Identificador del persona
     * @ORM\Id
     * @ORM\Column(name="pers_id",type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * Nombre del persona
     * @ORM\Column(name="pers_user",type="string", length=20)
     * @Assert\NotBlank(message = "Please enter the person name")
     */
    protected $name;
    /**
     * apellido del persona
     * @ORM\Column(name="pers_lastname",type="text")
     * @Assert\NotBlank(message = "Please enter the persona lastname")
     */
    protected $lastname;
    /**
     * telefono del persona
     * @ORM\Column(name="pers_phone",type="string")
     * @Assert\NotBlank(message = "Please enter the persona phone number")
     */
    protected $phone;
    /**
     * direccion de la persona
     * @ORM\Column(name="pers_address",type="string",nullable=true)
     */
    protected $address;
     /**
     * edad del persona
     * @ORM\Column(name="pers_age",type="string",nullable=true)
     */
    protected $age;
     /**
     * estado civil del persona
     * @ORM\Column(name="pers_marital_status",type="integer",nullable=true)
     */
    protected $maritalStatus;
    /**
     * email del persona
     * @ORM\Column(name="pers_email",type="string")
     * @Assert\Email(message = "Please enter the email")
     */
    protected $email;
    /**
     * estado de la persona
     * @ORM\Column(name="pers_is_Active",type="boolean",nullable=true)
     */
    protected $isActive;


    public function __toString() {
    return $this->getName().' '.$this->getLastname();
    
    }
    
    public function getTextMaritalStatus($maritalStatus = null){
        
        if($maritalStatus == null){
            
             $type = $this->maritalStatus;
        }
        else{
            $type = $maritalStatus;
        }
       
        
        $text='';
        switch ($type) {
            case self::MARITAL_STATUS_SINGLE:
                $text='single';
                break;
            case self::MARITAL_STATUS_MARRIED:
                $text='Married';
                break;
            case self::MARITAL_STATUS_DIVORCED:
                $text='Divorcied';
                break;
            case self::MARITAL_STATUS_WIDOW:
                $text='Widow';
                break;

            default:
                break;
        }
        
        return $text;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAge() {
        return $this->age;
    }

    public function getMaritalStatus() {
        return $this->maritalStatus;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIsActive() {
        return $this->isActive;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    

    public function setAge($age) {
        $this->age = $age;
    }

    public function setMaritalStatus($maritalStatus) {
        $this->maritalStatus = $maritalStatus;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }


    
}
?>