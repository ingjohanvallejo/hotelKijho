<?php

namespace Hotel\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Hotel\BackendBundle\Entity\Client;

class ClientType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $client = new Client();

        
        $builder
            ->add('name')
            ->add('lastname')
            ->add('phone')
            ->add('address')
            ->add('age')
            ->add('maritalStatus','choice', array(
                'choices'=>array(Client::MARITAL_STATUS_SINGLE=>$client->getTextMaritalStatus(Client::MARITAL_STATUS_SINGLE),
                    Client::MARITAL_STATUS_MARRIED=>$client->getTextMaritalStatus(Client::MARITAL_STATUS_MARRIED),  
                    Client::MARITAL_STATUS_DIVORCED=>$client->getTextMaritalStatus(Client::MARITAL_STATUS_DIVORCED),  
                    Client::MARITAL_STATUS_WIDOW=>$client->getTextMaritalStatus(Client::MARITAL_STATUS_WIDOW))))                
                
            ->add('type','choice', array(
                    'choices'=> array(Client::CLIENT_TYPE_COMMON=>$client->getTextType(Client::CLIENT_TYPE_COMMON)),
                    Client::CLIENT_TYPE_OCATIONAL=>$client->getTextType(Client::CLIENT_TYPE_OCATIONAL),
                        Client::CLIENT_TYPE_PREFERENCE=>$client->getTextType(Client::CLIENT_TYPE_PREFERENCE)
                    
                ))
            ->add('email', 'email', array(
                'attr' => array(
                    'placeholder' => 'example@domain.com'
                )))
            ->add('isActive')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\BackendBundle\Entity\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_backendbundle_client';
    }
}
