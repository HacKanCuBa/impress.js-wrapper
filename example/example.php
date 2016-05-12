<?php
/* vim: set tabstop=8 softtabstop=0 smarttab shiftwidth=4 expandtab fenc=utf-8 ff=unix : */

/**
 * Impress.JS Wrapper example.  
 * This file and css's have a CC-0 public domain license, so do what you want :)
 * reset.css isn't mine so check its header to know more.
 * impress.js is copyright of Bartek Szopka (@bartaz), check its header.
 * Nothing is minified because everything here is "in dev mode".
 * Note that the impress.class does have a GNU GPL v3 license.
 * @author HacKan (@hackancuba)
 * @license CC-0 public domain
 */

error_reporting(E_ALL);

// An autoloader could be used instead... if you don't know what that is, 
// simply use this requiere sentence.  Adjust the path accordingly.
require_once ('..' .DIRECTORY_SEPARATOR . 'hackan' . DIRECTORY_SEPARATOR 
    . 'impressjswrapper' . DIRECTORY_SEPARATOR . 'impress.class.php'
);

$impress = new \HacKan\ImpressJSWrapper\Impress();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Awesomness with Impress.JS</title>
    <meta name="author" content="@hackancuba" />
    <meta name="description" content="Neat example of my Impress.JS PHP wrapper" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@hackancuba" />
    <meta name="twitter:title" content="Awesomness with Impress.JS" />
    <meta name="twitter:description" content="Neat example of my Impress.JS PHP wrapper" />
    <meta name="twitter:image" content="img/logo.png" />

    <meta property="og:title" content="Awesomness with Impress.JS" />
    <meta property="og:description" content="Neat example of my Impress.JS PHP wrapper" />
    <meta property="og:locale" content="en_GB" />
    
    <link href="css/reset.css" rel="stylesheet" />
    <link href="css/example.css" rel="stylesheet" />
    <link href="css/opensans.css" rel="stylesheet" />
    <link href="css/oswald.css" rel="stylesheet" />
    <link href="css/anonymouspro.css" rel="stylesheet" />
</head>

<body class="impress-not-supported">

    <?=
        /* 
         * Instead of writing in html:
         * <div class="fallback-message">the fallback message</div>
         * you can simply pass the html-formated message to this method.
         */
        $impress->echoFallbackMessage(
            "        <p>Your browser <em>doesn't support the characteristics " 
            . "required</em> for this presentation, so a simplified version "
            . "will be shown.</p>" . PHP_EOL
            . "        <p>For a better experience, please use "
            . "<strong>Firefox</strong>, <strong>Chrome</strong> or "
            . "<strong>Safari</strong>.</p>"
        );
    ?>

    <div id="impress">
        <?= 
            /*
             * There are many ways to output text from the wrapper.
             * You can do this to print the whole <div> slide header:
             */
            $impress->printSlideDiv('step', 'title', 3);
            /*
             * The initial default coords and rotations are all 0.  Go see the
             * html source code to see what was printed by that method.
             */
        ?>
            <h1 class="centered">What is this ImpressJSWrapper?</h1>
            <h3>It's a simple life-saver wrapper to with 
                <strong>impress.js</strong>.
            </h3>
            <p>Why? Because otherwise you need to set coordinates and 
                rotations manually, and then, if you want to add a slide in 
                the middle, it turns out impossible!</p>
        </div>

        <div class="step anim" <?= 
            /*
             * You can write the <div> header and let the wrapper print only 
             * coords and rotations:
             */
            $impress->moveThenPrintData(['y' => 900], 10, 'step anim');
            /*
             * What for, instead of using printSlideDiv()? I don't know, but if
             * you need it/want it, it's there.
             */
        ?> data-scale="1" >
            <h1>So, impres.js is...</h1>
            <p>An <b class="scaling">awesome</b> js library to create 
                presentations, like this one.</p>
            <p class="centered">
                <a class="link-shadow" 
                    href="https://github.com/bartaz/impress.js">Go get it!
                </a>
            </p>
        </div>

        <?= $impress->moveThenPrintSlideDiv(['y' => 500], -20); ?>
            <h1>And how can I use this?</h1>
            <h3>It's all free (<em>as in freedom</em>) software.</h3>
            <h4 class="right">It also happens to be free of charge :)</h4>
            <p>Check 
                <a class="link" 
                   href="https://github.com/bartaz/impress.js">impress.js repo
                </a> for further instructions on using the library, and check 
                this example source code to see how is it used.</p>
        </div>
        
        <?= 
            $impress->reset(); 
            $impress->moveThenPrintSlideDiv([1900, 0, 600], ['theta' => -90]); 
        ?>
            <h1>Do I need to be a web developer to use this stuff?</h1>
            <p>Truth be told, yes: you need to know how to manage yourself 
                with html and css; impress.js only gives you pretty effects 
                like Prezy but better and free(dom).
            </p>
            <p>Regarding my PHP lib, it's really easy and you don't need to 
                know much about the language, this example file is probably 
                enough to start using it.
            </p>
        </div>
        
        <?= 
            /*
             * Another thing you can do is move the coords or rotations and 
             * then print the slide:
             */
            $impress->moveCoord([1000, 0, 1500]); 
            $impress->printSlideDiv();
            /*
             * Again, what for is up to you.
             */
        ?>
            <h1>Are there any other examples on how to use this?</h1>
            <p>Yes, I've done several presentations using this, BUT... it 
                wasn't this exact library: it was a precarious one I made back 
                then to solve the complications I mentioned in the first slide.
            </p>
            <p>Check them 
                <a class="link" 
                    href="https://github.com/HacKanCuBa/informe-votar/tree/master/Presentacion">
                        in this repo
                </a>.
            </p>
        </div>
        
        <?= 
            $impress->resetAngle(); 
            $impress->moveThenPrintSlideDiv([-5100, 0, -2000], 0); 
        ?>
            <p>Also, once you have finished your presentation, you don't 
                really need PHP any more: just load the page in a browser, 
                copy the source code and paste it in a html file, that's it :D
            </p>
            <p>I usually do that when I'm giving a talk, just in case 
                everything fails, you'll simply need a standard computer with 
                a browser, nothing else.
            </p>
        </div>
        
        <div class="step" <?= 
            $impress->move(-1200, -15); 
            $impress->printData(); 
        ?> data-scale="1" >
            <h1>That's all there's to say</h1>
            <p>If you have any questions, you can 
                <a class="link" href="https://hackan.net">contact me</a>, and 
                if you want to improve this library, please don't hesitate to 
                fork it and then pull request.
            </p>
            <p>Have fun!</p>
        </div>

        <!-- overview -->
        <?php
            $impress->autosetOverview();
            $impress->setOverview(["s" => 8]);
            $impress->printSlideOverview(); 
        ?>
        <!-- -->
    </div>

    <!-- impress code -->
    <!-- -hint -->
    <div class="hint">
        <p>Use keyboard keys to move backward/forward</p>
    </div>
    <script>
        if ("ontouchstart" in document.documentElement) {
        document.querySelector(".hint").innerHTML = 
            "<p>Touch the right side of the screen to begin</p>";
        }
    </script>
    <!-- - -->

    <!-- load js -->
    <script src="js/impress.js"></script>
    <script>impress().init();</script>
    <!-- - -->
    <!-- -->
</body>
</html>
