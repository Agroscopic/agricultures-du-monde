<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReportAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Titre'))
            ->add('description','ckeditor', array(
                'plugins' => array(
                    'uploadimage' => array(
                        'path'     => '/bundles/app/js/plugins/ckeeditor/upload/',
                        'filename' => 'plugin.js',
                    ),
                ),
            ))
            ->add('body','ckeditor')
            ->add('inLanguage','text')
            ->add('latitude')
            ->add('longitude')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('slug')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('slug')

        ;
    }
}