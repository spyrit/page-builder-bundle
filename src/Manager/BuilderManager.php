<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\BlockInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\PageInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class BuilderManager
{
    protected $entityManager;
    protected $formFactory;
    protected $widgetManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory,
        WidgetManager $widgetManager
    ) {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->widgetManager = $widgetManager;
    }

    public function createBlockForm(BlockInterface $block)
    {
        $widgetId = $block->getWidgetId();
        $widget = $this->widgetManager->instantiate($widgetId);
        $config = $widget->decodeConfiguration($block->getConfiguration()) ?: $widget->getDefaultConfiguration();

        return $this->formFactory->create($widget->getFormType(), $config);
    }

    public function createLineForm(PageInterface $page)
    {
        return $this->formFactory->create($page->getLineFormType(), [], [
            'lines' => count($page->getLines()),
        ]);
    }

    public function deleteBlock(BlockInterface $block)
    {
        $this->entityManager->remove($block);
        $this->entityManager->flush();
    }

    public function deleteLine(PageInterface $page, $line)
    {
        $lines = $page->getLines();

        foreach ($lines as $key => $zones) {
            if ($key == $line) {
                foreach ($zones as $zone_) {
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
            $widgetId = $block->getWidgetId();
            $widget = $this->widgetManager->instantiate($widgetId);
            $configuration = $widget->encodeConfiguration($config);
            $block->setConfiguration($configuration);
            $this->entityManager->persist($block);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}
