<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

final class FeedAdmin extends AbstractAdmin
{
  protected function configureRoutes(RouteCollection $collection)
  {
    if ($this->isChild()) {
      return;
    }

    // This is the route configuration as a parent
    $collection->clear();

  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
  {
    $datagridMapper
      ->add('id')
      ->add('start')
      ->add('finish')
      ->add('quantity')
      ->add('comments');
  }

  protected function configureListFields(ListMapper $listMapper): void
  {
    $listMapper
      ->add('id')
      ->add('start')
      ->add('finish')
      ->add('quantity')
      ->add('comments')
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
      ->add('start')
      ->add('finish')
      ->add('quantity')
      ->add('comments');
  }

  protected function configureShowFields(ShowMapper $showMapper): void
  {
    $showMapper
      ->add('id')
      ->add('start')
      ->add('finish')
      ->add('quantity')
      ->add('comments');
  }
}
