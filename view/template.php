<!DOCTYPE html>
<html>
<head>
    <title><?=$this->e($title)?></title>
    <!-- my own stylesheet -->
    <meta name="referrer" content="no-referrer">
    <link rel="stylesheet" href="stylesheet.css">
    <!-- MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-orange.min.css"/>
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Roboto Font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
<body>
<a href="https://github.com/Linux-statt-Windows/teampage"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 10;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
<div class="mdl-color--grey-100 mdl-color-text--grey-700">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--seamed mdl-color--primary mdl-shadow--3dp">
            <div class="mdl-layout__header-row"><h3>Das "Linux statt Windows" (LsW) -Team</h3></div>
        </header>
        <main class="mdl-layout__content content-grid mdl-grid">
            <?=$this->section('content')?>
        </main>
    </div>
</div>
</body>
</html>

