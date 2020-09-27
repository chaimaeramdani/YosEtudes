<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class RegistrationType extends AbstractType
{
/**
 * @param string $label
 * @param string $placeholder
 * @param array $options
 * @return array
 *
 */
    private function getConfiguration($label, $placeholder, $options=[])
    {
        return array_merge([
            'label' =>$label,
            'attr' =>[
                'placeholder' =>$placeholder]
            ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom' ,TextType::class, $this->getConfiguration("nom","votre nom.."))
            ->add('prenom' ,TextType::class, $this->getConfiguration("prenom","votre prenom.."))
            ->add('telephone' ,TextType::class, $this->getConfiguration("telephone","votre numero.."))
            ->add('email' ,TextType::class, $this->getConfiguration("email","votre email.."))
            ->add('adresse' ,TextType::class, $this->getConfiguration("adresse","votre adresse.."))
            ->add('date_naissance',TextType::class, $this->getConfiguration("date_naissance","votre date_naisance.."))
            ->add('password' ,PasswordType::class, $this->getConfiguration("password","taper un mdp.."))
            ->add('confirm_password' ,PasswordType::class, $this->getConfiguration("confirm_pasword","retaper mdp.."))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
