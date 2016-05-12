# ImpressJSWrapper
This is a wrapper class to make it easier to work with [impress.js](https://github.com/impress/impress.js) library.  
It uses PHP 5.3+ and nothing else, it's pretty simple.  

Since you need to tell impress.js the coordinates and rotations for each slide, if you would want to change or move a slide it becomes an almost impossible task because you need to rewrite the coords for each and every single slide... With this wrapper, the Impress class handles that for you so can easily move or add slides without worrying about the rest of them: it manages the slides with relative coords and rotations.  

Read the code, is fully commented and easy to undestand.  If you don't know how to use PHP, check the example, it's very straight forward.  

You don't even need a server to run this: [PHP implements an internal server](http://php.net/manual/en/features.commandline.webserver.php) so once you've finished developing, simply copy the html code from the browser and paste it in a html file, and that's it.  

If you have any ideas, fork this and pull-request me without question, or create an issue :)  

## How to use it
Include/require or autoload impress class:  
`include ('hackan' . DIRECTORY_SEPARATOR . 'impressjswrapper' . DIRECTORY_SEPARATOR . 'impress.class.php');`

## Quick start guide
```
$impress = new \HacKan\ImpressJSWrapper\Impress();

...

<div id="impress">
        <?= $impress->printSlideDiv('step', 'title', 3); ?>
			...
		</div>
...

        <?= $impress->moveThenPrintSlideDiv(['y' => 500], -20); ?>
			...
		</div>
...
```

Basically, once you have the object, the most used method is `moveThenPrintSlideDiv()` which does what is says: moves current coords and rotation values by adding them to the offset provided, then spits the requiered html for a new slide, meaning, a div element like this: `<div id="title" class="step" data-x="0" data-y="0" data-z="0" data-rotate-x="0" data-rotate-y="0" data-rotate-z="0" data-scale="3" >`

# License
Impress class (impress.class.php) is licensed under GNU GPL v3.0.  
The files in example directory are licensed to public domain, except for [impress.js](https://github.com/impress/impress.js) and [reset.css](https://github.com/murtaugh/HTML5-Reset) which are not mine.
