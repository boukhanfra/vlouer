<?php

namespace GsmLot\IndexBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class FilterType extends AbstractType 
{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('country','entity',array('class' => 'GsmLotTraderBundle:Country','required'=>false))
				->setMethod('get')
				->add('brand','entity',array('class'=>'GsmLotOfferBundle:Brand','empty_data'=>null,'empty_value'=>'','required'=>false))->setMethod('get')
				->add('norm','entity',array('class'=>'GsmLotOfferBundle:Norm','label'=>'Specification','required'=>false));
		
		$formUpdateBrand = function(FormInterface $form, $data)
		{
			$modelOptions = array(
					'required'=>false,
					'class'=>'GsmLotOfferBundle:Model',
					'empty_data'=>null,
					'empty_value'=>'',
					'query_builder'=> function(EntityRepository $er) use($data)
					{
						return $er->createQueryBuilder('m')
								->where('m.brand = :brand_id')
								->setParameter('brand_id', $data)
								->orderBy('m.name','asc');
					}
			);
			
		$form->add('model','entity',$modelOptions);
			
		};		
		
		
		$formUpdateCountry = function(FormInterface $form, $data)
		{
	
			$cityOptions = array(
					'required' =>false,
					'class' => 'GsmLotTraderBundle:City',
					'empty_data'=>null,
					'empty_value'=>'',
					'query_builder'=>function(EntityRepository $er) use($data)
					{
						return $er->createQueryBuilder('c')
						->where('c.country = :country_id')
						->setParameter('country_id',$data)
						->orderBy('c.name','asc');
			}
			);
			
			$form->add('city','entity',$cityOptions);
		};
		
		$builder->addEventListener ( FormEvents::PRE_SET_DATA, function (FormEvent $event) use($formUpdateBrand,$formUpdateCountry) 
		{
			$data = $event->getData ();	
	
			$formUpdateBrand($event->getForm (),$data);
			$formUpdateCountry($event->getForm(),$data);
		});
		
		$builder->get ( 'brand' )->addEventListener ( FormEvents::POST_SUBMIT, function (FormEvent $event) use($formUpdateBrand)
		{
			
			$data = $event->getForm()->getData();

			$formUpdateBrand($event->getForm()->getParent(),$data);
		});
		
		$builder->get ( 'country' )->addEventListener ( FormEvents::POST_SUBMIT, function (FormEvent $event) use($formUpdateCountry) 
		{
					
				$data = $event->getForm()->getData();
			
				$formUpdateCountry($event->getForm()->getParent(),$data);
			});
		
	}
	
	
	public function getName() 
	{
		return 'offer_filter';
	}
}