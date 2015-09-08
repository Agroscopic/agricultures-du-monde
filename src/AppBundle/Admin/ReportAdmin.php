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
            ->add('authors','sonata_type_model', array(
            'multiple' => true,
                'by_reference' => false
            ))
            ->add('tags','sonata_type_model', array(
                'multiple' => true,
                'by_reference' => false
            ))
            ->add('studyPeriodStart', 'collot_datetime', array( 'pickerOptions' =>
                array('format' => 'MM yyyy',
                    'weekStart' => 0,
                    'autoclose' => true,
                    'startView' => 'year',
                    'minView' => 'decade',
                    'maxView' => 'year',
                    'keyboardNavigation' => true,
                    'language' => 'fr',
                    'forceParse' => true,
                    'pickerPosition' => 'top-right',
                )))
            ->add('studyPeriodEnd', 'collot_datetime', array( 'pickerOptions' =>
                array('format' => 'MM yyyy',
                    'weekStart' => 0,
                    'autoclose' => true,
                    'startView' => 'year',
                    'minView' => 'decade',
                    'maxView' => 'year',
                    'keyboardNavigation' => true,
                    'language' => 'fr',
                    'forceParse' => true,
                    'pickerPosition' => 'top-right',
                )))
            ->add('description','ckeditor', array(
                'plugins' => array(
                    'uploadimage' => array(
                        'path'     => '/bundles/app/js/plugins/ckeeditor/upload/',
                        'filename' => 'plugin.js',
                    ),
                ),
            ))
            ->add('body','ckeditor')
            ->add('inLanguage','language')
            ->add('latlng', 'oh_google_maps')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('authors')
            ->add('slug')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('slug')
            ->add('authors')

        ;
    }
}