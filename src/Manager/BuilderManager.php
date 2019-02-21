<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\BlockInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\PageInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\ZoneInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class BuilderManager
{
    protected $entityManager;
    protected $formFactory;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
    }

    public function createBlockForm(BlockInterface $block)
    {
        $widget = $block->getWidget();
        $config = $block->getConfiguration() ?: $widget->getDefaultConfiguration();

        return $this->formFactory->create($widget->getFormType(), $config);
    }

    public function createLineForm(PageInterface $page)
    {
        return $this->formFactory->create($page->getLineFormType(), [], [
            'lines' => count($page->getLines()),
        ]);
    }

    public function deleteBlock(BlockInterface $block) {
        $this->entityManager->remove($block);
        $this->entityManager->flush();
    }

    public function deleteLine(PageInterface $page, $line) {
        $lines = $page->getLines();

        foreach ($lines as $line_) {
            if ($line_ = $line) {
                foreach ($line_->getZones() as $zone_) {
                    foreach ($zone_->getBlocks() as $block) {
                        $this->entityManager->remove($block);
                    }
                    $this->entityManager->remove($zone_);
                }
            }
        }
        $this->entityManager->flush();
    }

    public function validateBlockForm(FormInterface $form, BlockInterface $block)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $config = $form->getData();
            $block->setConfiguration($config);
            $this->entityManager->persist($block);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}