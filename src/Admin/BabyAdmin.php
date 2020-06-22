<?php

declare(strict_types=1);

namespace App\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class BabyAdmin extends AbstractAdmin
{

  protected function configureTabMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
  {
    if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
      return;
    }

    $admin = $this->isChild() ? $this->getParent() : $this;
    $id = $admin->getRequest()->get('id');

    $menu->addChild('View Baby', [
      'uri' => $admin->generateUrl('show', ['id' => $id])
    ]);

    if ($this->isGranted('EDIT')) {
      $menu->addChild('Edit Baby', [
        'uri' => $admin->generateUrl('edit', ['id' => $id])
      ]);
    }

    if ($this->isGranted('LIST')) {
      $menu->addChild('Manage Feeds', [
        'route' => 'admin_app_baby_feed_list',
        'routeParameters' => ['id' => $id]
      ]);
    }

    if ($this->isGranted('LIST')) {
      $menu->addChild('Manage Sleeps', [
        'route' => 'admin_app_baby_sleep_list',
        'routeParameters' => ['id' => $id]
      ]);
    }
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
  {
    $datagridMapper
      ->add('id')
      ->add('firstname')
      ->add('birthDate');
  }

  protected function configureListFields(ListMapper $listMapper): void
  {
    $listMapper
      ->add('id')
      ->add('firstname')
      ->add('birthDate')
      ->add('_action', null, [
        'actions' => [
          'show' => [],
          'edit' => [],
          'delete' => [],
        ],
      ]);
  }

  protected function configureFormFields(FormMapper $formMapper): void
  {
    $formMapper
      ->add('firstname')
      ->add('birthDate');
  }

  protected function configureShowFields(ShowMapper $showMapper): void
  {
    $showMapper
      ->add('id')
      ->add('firstname')
      ->add('birthDate');
  }


}
