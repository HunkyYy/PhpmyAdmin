# PHP-BootstrapGenerator
# Boostrap HTML elements geration PHP class.
The Bootstrap Generator allows you to creat HTML Bootstrap elements without having to type them.

You can generate : 
* Jumbotron
* Container
* Navbar
* Navbar elements
* Row divs
* Glyphicons
* Col divs
* Tables

You can add content, classes, an id and any other attributes to those php generated elements.

## Getting Started

Just download the BootstrapGenerator.php file (or download the whole zip in order to get Bootstrap V.3.3.7 files) and put it in your project.

Note : meant to work with Bootstrap V3.3.7 and jQuery V3.3.1 


### Prerequisites

This class uses three files :
* Bootsrap css file
* Bootstrap JS file
* jQuery file

those three files MUST be in the same folder in order to use the class

```
Folder with files
          |
          |--bootstrap.css
          |
          |--bootstrap.js
          |
          |--jQuery.js
```


## Usage

### Setting up sources

Don't forget to include the BootstrapGenerator.php file !

The fisrt static function that has to be called and echoed in the html head in order to setup css and js file is the setSources() method.
This method need 4 arguments :
* The directory path
* The Bootstrap css file
* The jQuery file
* The Bootstrap js file

example :


```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
        require_once "BootstrapGenerator.php";

        echo BootstrapGenerator::setSources("bootstrap-3.3.7-dist/", "css/bootstrap.css", "js/jquery-3.3.1.js", "js/bootstrap.js");
    ?>
</head>
```

It will display the <link> and <script> tag with the attributes needed to lod the css and JS files.

### Generate elements
#### Generate jumbotron

Use the method **genJumbotron()** in order to generate a Jumbotron HTML element.
This method needs 4 attributes :
* $content : content displayed in the Jumbotron
* $class : class(es) to add to the Jumbotron
* $id : id of the Jumbotron
* $attributes : other attriubutes to add to the Jumbotron

Example :
```php
echo BootstrapGenerator::genJumbotron($nav."<h1>Hello, world!</h1>", "myClass1 myClass2", "myID", "style:'color: blue;'");
```

#### Generate container

Use the method **genContainer()** in order to generate a Container HTML element.
This method needs 5 attributes :
* $content : content displayed in the Container
* $fluid : boolean that indicates if the Container is fluid (true => fluid, false => not fluid)
* $class : class(es) to add to the Container
* $id : id of the Container
* $attributes : other attriubutes to add to the Container

Example :
```php
echo BootstrapGenerator::genContainer("<p>My content</p>", true, null, "myContainer", null);
```
#### Generate Navbar

Use the method **genNavbar()** in order to generate a Navbar HTML element.
This method needs 5 attributes :
* $content : content displayed in the Navbar
* $inverse : boolean that indicates if the Navbar is inversed (true => invered, false => not inversed)
* $class : class(es) to add to the Navbar
* $id : id of the Navbar
* $attributes : other attriubutes to add to the Navbar

Example :
```php
echo BootstrapGenerator::genNavbar($form, false, null, null, null);
```

#### Generate Navbar elements

Use the method **genNavbarElement()** in order to generate a Navbar element.
This method needs 5 attributes :
* $content : content displayed in the Navbar element
* $type : sring that indicates the type of the Navbar element ("brand", "form", "form-group", "text", "button")
* $class : class(es) to add to the Navbar element
* $id : id of the Navbar element
* $attributes : other attriubutes to add to the Navbar element

Example :
```php
echo BootstrapGenerator::genNavbarElement("Submit", "button", "btn-primary", null, null);
```

#### Generate GlyphIcons 

Use the method **genGlyphIcon()** in order to generate a GlyphIcon element.
This method needs 4 attributes :
* $type : sring that indicates the type of the GlyphIcon element ("home", "star" ...)
* $class : class(es) to add to the GlyphIcon element
* $id : id of the GlyphIcon element
* $attributes : other attriubutes to add to the GlyphIcon element

Example :
```php
echo BootstrapGenerator::genGlyphIcon("home", null, null, null);
```

#### Generate Col divs 

Use the method **genColDiv()** in order to generate a Col div element.
This method needs 5 attributes :
* $content : content displayed in the Col div element
* $size : int that indicates the size of the Col div element (1 to 12)
* $class : class(es) to add to the Col div element
* $id : id of the Col div element
* $attributes : other attriubutes to add to the Col div element

Example :
```php
echo BootstrapGenerator::genColDiv("<h1>Hello world</h1>", 10, null, null, null);
```

#### Generate Table 

Use the method **genTable()** in order to generate a Table element.
This method needs 7 attributes :
* $content : array that indicates the content displayed in the Table element
  * Each array represents a row. The first element should be the style of the row (success, danger, info or even null)
* $type : string that indicates the type of the Table element (table-bordered, table-hover ...)
* $head : strings array with table head elements
* $center : boolean that indicates if the cells' content are centered
* $class : class(es) to add to the Table element
* $id : id of the Table element
* $attributes : other attriubutes to add to the Table element

Example :
```php
$Thead = array(1, 2, 3);
$Tcontent = array(array("danger", "A", "B", "C"), array("success", "D", "E", "F"));
echo BootstrapGenerator::genTable($Tcontent, "table-hover", $Thead, true, null, null, null);
```


## Mix the possibilities !!!

You can of course mix all of those possibilities in order to create a full page, without having to write any html code for bootstrap elements !

Example :
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
        //Include the class
        require_once "BootstrapGenerator.php";

        //Display the <link> and <source> tags
        echo BootstrapGenerator::setSources("bootstrap-3.3.7-dist/", "css/bootstrap.css",
            "js/jquery-3.3.1.js", "js/bootstrap.js");
    ?>
</head>
<body>

<?php

    //Creates a navbar button
    $button = BootstrapGenerator::genNavbarElement("Submit", "button", "btn-primary", null, null);

    //Creates a custom navbar brand
    $brand = BootstrapGenerator::genNavbarElement("My Brand", "brand", null, null, null);

    //Concatenate the elements in order to make one
    $formContent = $brand.$button;

    //Generates the form group
    $formGroup = BootstrapGenerator::genNavbarElement($formContent, "form-group", null, null, null);

    //Generates the nav form
    $form = BootstrapGenerator::genNavbarElement($formGroup, "form", null, null, "method='post'");

    //Generates the nav bar
    $nav = BootstrapGenerator::genNavbar($form, true, null, null, null);

    //Generates the jumbotron
    $jumbotron =  BootstrapGenerator::genJumbotron($nav."<br><h1>Hello, world!</h1>",
                    null, null, null);

    //Generates the container
    $container =  BootstrapGenerator::genContainer($jumbotron, true, null, null, null);

    //Displays the whole thing !
    echo $container;
?>

</body>
</html>
```

## Author

* **Tony Piton** - *Initial work* - [TonyPtn](https://github.com/TonyPtn)

## License

This project is licensed under the version 3 of the GNU Lesser General Public License - see the [LICENSE.md](LICENSE.md) file for details

