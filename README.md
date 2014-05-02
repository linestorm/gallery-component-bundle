Gallery Component for LineStormCMS
==================================

Gallery Component for LineStormCMS.

Installation
============
This module will provide functionality to add galleries to your content modules in LineStorm CMS.

1. Download bundle using composer
2. Enable the Bundle
3. Configure the Bundle
4. Installing Assets
5. Configuring Assets

Step 1: Download bundle using composer
--------------------------------------

Add `linestorm/gallery-component-bundle` to your `composer.json` file, or download it by running the command:

```bash
$ php composer.phar require linestorm/gallery-component-bundle
```

Step 2: Enable the bundle
-------------------------

Enable the poll bundle to your `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = array(
        // ...
        new LineStorm\GalleryComponentBundle\LineStormGalleryComponentBundle(),
    );
}
```

Step 3: Configure the Bundle
----------------------------

Add the class entity definitions in the line_storm_cms namespace and the media namespace
inside the `app/config/config.yml` file:

```yml
line_storm_cms:
  ...
  entity_classes:
    ...

    # Gallery Component
    content_gallery:      Acme\DemoBundle\Entity\ContentGallery
```

Step 4: Installing Assets
-------------------------

###Bower
Add [.bower.json](.bower.json) to the dependencies

###Manual
Download the modules in [.bower.json](.bower.json) to your assets folder


Step 5: Configuring Assets
--------------------------

You will need to add these dependency paths to your requirejs config:

```js
requirejs.config({
    paths: {
        // ...

        // article component
        cms_gallery:        '/path/to/bundles/linestormgallerycomponent/js/gallery',
    }
});
```


Documentation
=============

[Read Documentation](docs/index.md)
