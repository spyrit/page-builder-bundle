SpyritPageBuilderBundle
=======================

#About 

A page builder for Symfony and Doctrine.

**Notice**: this bundle is highly experimental, there may be important changes without warning.

#Installation

Require the bundle with composer:

'composer require spyrit/page-builder-bundle'

**Warning**: In yout composer.json you may need to set "minimum-stability" to "dev".

#Database

You will need to set up you .env file to set up a database.

#How to use

* **Add a widget**

	* Add a new Widget that heritate from BaseWidget.
	* Add templates for your widget (one editor template and one front template if needed)
	* Create your widget's form


* **Render**
	
	* To render a page you will need to call the renderPage method from the renderManager Class.
	* '''$html = $renderManager->renderPage($page);
	return $this->render('home/first_page.html.twig', ['html'=>$html]);'''
	* The first argument is the page, the seconf one is a boolean (true for editor, false or nothing for front)




