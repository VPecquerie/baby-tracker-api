<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use \Sonata\UserBundle\Admin\Model\UserAdmin as SonataUserAdmin;
use Sonata\UserBundle\Form\Type\SecurityRolesType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

final class UserAdmin extends SonataUserAdmin
{

  protected function configureFormFields(FormMapper $formMapper): void
  {
    // define group zoning
    $formMapper
      ->tab('User')
        ->with('Profile', ['class' => 'col-md-6'])->end()
        ->with('General', ['class' => 'col-md-6'])->end()
        ->with('Babies', ['class' => 'col-md-6'])->end()
      ->end()
      ->tab('Security')
        ->with('Status', ['class' => 'col-md-4'])->end()
        ->with('Groups', ['class' => 'col-md-4'])->end()
        ->with('Keys', ['class' => 'col-md-4'])->end()
        ->with('Roles', ['class' => 'col-md-12'])->end()
      ->end()
      ->tab('Social')
        ->with('Social', ['class' => 'col-md-6'])->end()
      ->end();

    $now = new \DateTime();

    $genderOptions = [
      'choices' => \call_user_func([$this->getUserManager()->getClass(), 'getGenderList']),
      'required' => true,
      'translation_domain' => $this->getTranslationDomain(),
    ];

    $formMapper
      ->tab('User')
        ->with('General')
          ->add('username')
          ->add('email')
          ->add('plainPassword', TextType::class, [
            'required' => (!$this->getSubject() || null === $this->getSubject()->getId()),
          ])
        ->end()
        ->with('Profile')
          ->add('dateOfBirth', DatePickerType::class, [
            'years' => range(1900, $now->format('Y')),
            'dp_min_date' => '1-1-1900',
            'dp_max_date' => $now->format('c'),
            'required' => false,
          ])
          ->add('firstname', null, ['required' => false])
          ->add('lastname', null, ['required' => false])
          ->add('website', UrlType::class, ['required' => false])
          // ->add('biography', TextType::class, ['required' => false])
          ->add('gender', ChoiceType::class, $genderOptions)
          ->add('locale', LocaleType::class, ['required' => false])
          ->add('timezone', TimezoneType::class, ['required' => false])
          ->add('phone', null, ['required' => false])
        ->end()
        ->with('Babies')
          ->add('babies', ModelAutocompleteType::class, [
            'property' => 'firstname',
            'multiple' => true,
            'btn_add' => true,
            'to_string_callback' => function ($entity, $property) {
              return $entity->getFirstname();
            },
          ])
        ->end()
      ->end()
      ->tab('Security')
        ->with('Status')
          ->add('enabled', null, ['required' => false])
        ->end()
        ->with('Groups')
          ->add('groups', ModelType::class, [
            'required' => false,
            'expanded' => true,
            'multiple' => true,
          ])
        ->end()
        ->with('Roles')
        ->add('realRoles', SecurityRolesType::class, [
          'label' => 'form.label_roles',
          'expanded' => true,
          'multiple' => true,
          'required' => false,
        ])
        ->end()
        ->with('Keys')
          ->add('token', null, ['required' => false])
          ->add('twoStepVerificationCode', null, ['required' => false])
        ->end()
      ->end()
      ->tab('Social')
        ->with('Social')
          ->add('facebookUid', null, ['required' => false])
          ->add('facebookName', null, ['required' => false])
          ->add('twitterUid', null, ['required' => false])
          ->add('twitterName', null, ['required' => false])
          ->add('gplusUid', null, ['required' => false])
          ->add('gplusName', null, ['required' => false])
        ->end()
      ->end();
  }


  protected function configureShowFields(ShowMapper $showMapper): void
  {
    $showMapper
      ->with('General')
        ->add('username')
        ->add('email')
      ->end()
      ->with('Groups')
        ->add('groups')
      ->end()
      ->with('Profile')
        ->add('dateOfBirth')
        ->add('firstname')
        ->add('lastname')
        ->add('website')
        ->add('biography')
        ->add('gender')
        ->add('locale')
        ->add('timezone')
        ->add('phone')
      ->end()
      ->with('Social')
        ->add('facebookUid')
        ->add('facebookName')
        ->add('twitterUid')
        ->add('twitterName')
        ->add('gplusUid')
        ->add('gplusName')
      ->end()
      ->with('Babies')
        ->add('babies')
      ->end()
      ->with('Security')
        ->add('token')
        ->add('twoStepVerificationCode')
      ->end()
    ;
  }


}
