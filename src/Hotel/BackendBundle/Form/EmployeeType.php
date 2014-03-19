<?php

namespace Hotel\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Hotel\BackendBundle\Entity\Employee;

class EmployeeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $employees = new Employee();
        
        $builder
            ->add('name')
            ->add('lastname')
            ->add('phone')
            ->add('address')
            ->add('age')
            ->add('maritalStatus','choice', array(
                'choices'=>array(Employee::MARITAL_STATUS_SINGLE=>$employees->getTextMaritalStatus(Employee::MARITAL_STATUS_SINGLE),
                    Employee::MARITAL_STATUS_MARRIED=>$employees->getTextMaritalStatus(Employee::MARITAL_STATUS_MARRIED),  
                    Employee::MARITAL_STATUS_DIVORCED=>$employees->getTextMaritalStatus(Employee::MARITAL_STATUS_DIVORCED),  
                    Employee::MARITAL_STATUS_WIDOW=>$employees->getTextMaritalStatus(Employee::MARITAL_STATUS_WIDOW))
                
            ))
                
             ->add('email', 'email', array(
                'attr' => array(
                    'placeholder' => 'example@domain.com'
                )))
            ->add('password','repeated',array(
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Confirm Password'),
                'required'=>true,
                'type' => 'password',
                'invalid_message' => 'The two passwords must match',
                'options' => array('label' => 'Password')
                ))
            ->add('isActive')
            ->add('ocupation')
                
             ->add('type','choice', array(
                    'choices'=> array(Employee::USER_ADMINISTRATOR=>$employees->getTextType(Employee::USER_ADMINISTRATOR),
                    Employee::USER_RECEPTIONIST=>$employees->getTextType(Employee::USER_RECEPTIONIST))
                       
                    
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\BackendBundle\Entity\Employee'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_backendbundle_employee';
    }
}
