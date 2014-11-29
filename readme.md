[![Build Status](https://travis-ci.org/alfred-nutile-inc/fixturizer.svg?branch=master)](https://travis-ci.org/alfred-nutile-inc/fixturizer)

# Fixturizer 

Quick way to write and read fixture data. 

Takes php arrays and quickly puts them on the filesystem as yaml files and vice versa.

See tests folder for Test Examples

## If you are using Laravel

config/app.php load under Providers

~~~
'AlfredNutileInc/Fixturizer/FixturizerServiceProvider'
~~~

Load under Facades

~~~
'Fixturizer' => 'AlfredNutileInc/Fixturizer/FixturizerFacade'
~~~


## Roadmap 

Add Facade
