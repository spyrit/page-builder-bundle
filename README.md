SpyritPageBuilderBundle
=======================

# About

A page builder for Symfony and Doctrine.

**Notice**: this bundle is highly experimental, there may be important changes without warning.

# Installation

Require the bundle with composer:

`composer require spyrit/page-builder-bundle`

**Warning**: In yout composer.json you may need to set "minimum-stability" to "dev".

# Database

You will need to set up your .env file to set up a database.

# How to use

#### Add a widget

* Add a new Widget that heritate from BaseWidget.
* Add templates for your widget (one editor template and one front template if needed)
* Create your widget's form

#### Render

* To render a page you will need to call the renderPage method from the renderManager Class.
```
return $this->render('template.html.twig', [
    'html' => $renderManager->renderPage($page),
]);
```
* The first argument is the page, the second one is a boolean (true for editor, false (default) for front)
