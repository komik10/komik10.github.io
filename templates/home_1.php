<!DOCTYPE html>
<html dir="ltr">
<head>
	<meta charset="utf-8" />
    <?php
        $base = $document->getBase();
        if (!empty($base)) {
            echo '<base href="' . $base . '" />';
            $document->setBase('');
        }
    ?>
     <?php 
	$app = JFactory::getApplication();
    $tplparams	= $app->getTemplate(true)->params;
	$fc = htmlspecialchars($tplparams->get('fc'));
$tc = htmlspecialchars($tplparams->get('tc'));
$yc = htmlspecialchars($tplparams->get('yc'));
$gc = htmlspecialchars($tplparams->get('gc'));
$ic = htmlspecialchars($tplparams->get('ic'));
$pc = htmlspecialchars($tplparams->get('pc'));
$hc = htmlspecialchars($tplparams->get('hc'));
$allic = htmlspecialchars($tplparams->get('allic'));
$infoc = htmlspecialchars($tplparams->get('infoc'));
$dplayer = htmlspecialchars($tplparams->get('dplayer'));
$ac = htmlspecialchars($tplparams->get('ac'));
$c2c = htmlspecialchars($tplparams->get('c2c'));
$c3c = htmlspecialchars($tplparams->get('c3c'));
$c4c = htmlspecialchars($tplparams->get('c4c'));
$galleryc = htmlspecialchars($tplparams->get('galleryc'));
$stc = htmlspecialchars($tplparams->get('stc'));
	?>
    <link href="<?php echo $document->params->get('fav'); ?>" rel="icon" type="image/x-icon" />
    <script>
    var themeHasJQuery = !!window.jQuery;
</script>
<script src="<?php echo addThemeVersion($document->templateUrl . '/jquery.js'); ?>"></script>
<script>
    window._$ = jQuery.noConflict(themeHasJQuery);
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="<?php echo addThemeVersion($document->templateUrl . '/bootstrap.min.js'); ?>"></script>
<script src="<?php echo addThemeVersion($document->templateUrl . '/CloudZoom.js'); ?>" type="text/javascript"></script>
    
    <?php echo $document->head; ?>
    <?php if ($GLOBALS['theme_settings']['is_preview'] || !file_exists($themeDir . '/css/bootstrap.min.css')) : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/bootstrap.css'); ?>" media="screen" />
    <?php else : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/bootstrap.min.css'); ?>" media="screen" />
    <?php endif; ?>
    <?php if ($GLOBALS['theme_settings']['is_preview'] || !file_exists($themeDir . '/css/template.min.css')) : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.css'); ?>" media="screen" />
    <?php else : ?>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.min.css'); ?>" media="screen" />
    <?php endif; ?>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo addThemeVersion($document->templateUrl . '/css/template.ie.css'); ?>" media="screen"/>
    <![endif]-->
    <script src="<?php echo addThemeVersion($document->templateUrl . '/script.js'); ?>"></script>
    <!--[if lte IE 9]>
    <script src="<?php echo addThemeVersion($document->templateUrl . '/script.ie.js'); ?>"></script>
    <![endif]-->
    
</head>
<body class=" bootstrap bd-body-1 bd-pagebackground">

    <div class="container  bd-containereffect-2"><div class=" bd-layoutbox-13 clearfix">
    <div class="bd-container-inner">
        
    </div>
</div>
</div>
	
		<header class=" bd-headerarea-1">
        <section class=" bd-section-1 bd-tagstyles" id="section1" data-section-title="">
    <div class="bd-vertical-align-section-wrapper">
        <div class=" bd-boxcontrol-1">
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <form id="search-3" role="form" class=" bd-search-3 hidden-xs form-inline" name="search" <?php echo funcBuildRoute(JFactory::getDocument()->baseurl . '/index.php', 'action'); ?> method="post">
    <div class="bd-container-inner">
        <input type="hidden" name="task" value="search">
        <input type="hidden" name="option" value="com_search">
        <div class="bd-search-wrapper">
            
                <input type="text" name="searchword" class=" bd-bootstrapinput-9 form-control" placeholder="Search">
                <a href="#" class=" bd-icon-30" link-disable="true"></a>
        </div>
        <script>
            (function (jQuery, $) {
                jQuery('.bd-search-3 .bd-icon-30').on('click', function (e) {
                    e.preventDefault();
                    jQuery('#search-3').submit();
                });
            })(window._$, window._$);
        </script>
    </div>
</form>
	
		<?php if ($allic == 1) { ?> <div class=" bd-socialicons-1 hidden-xs">
    
       <?php if ($fc == 1) { ?> <a target="_blank" class=" bd-socialicon-1 bd-socialicon" href="<?php echo $document->params->get('facebook'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($tc == 1) { ?><a target="_blank" class=" bd-socialicon-2 bd-socialicon" href="<?php echo $document->params->get('twitter'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($gc == 1) { ?><a target="_blank" class=" bd-socialicon-3 bd-socialicon" href="<?php echo $document->params->get('google'); ?>">
    <span></span><span></span>
</a><?php } ?>
    
        <?php if ($pc == 1) { ?><a target="_blank" class=" bd-socialicon-4 bd-socialicon" href="<?php echo $document->params->get('pinterest'); ?>">
    <span></span><span></span>
</a><?php } ?>
</div><?php } ?>
	
		<div class=" bd-animation-1 animated" data-animation-name="bounce"
                                    data-animation-event="onload"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><?php
$app = JFactory::getApplication();
$themeParams = $app->getTemplate(true)->params;
$sitename = $app->getCfg('sitename');
$logoSrc = '';
ob_start();
?>
<?php echo JURI::base() . 'templates/' . JFactory::getApplication()->getTemplate(); ?>/images/logo.png
<?php
$logoSrc = ob_get_clean();
$logoLink = '';
if ($themeParams->get('logoFile'))
{
$logoSrc = JURI::root() . $themeParams->get('logoFile');
}
if ($themeParams->get('logoLink'))
{
$logoLink = $themeParams->get('logoLink');
}
?>
<a class=" bd-logo-1" href="<?php echo $logoLink; ?>">
<img class=" bd-imagestyles" src="<?php echo $logoSrc; ?>" alt="<?php echo $sitename; ?>">
</a></div>
        </div>
    </div>
</div>
    </div>
</section>
	
		<?php
    renderTemplateFromIncludes('hmenu_1', array());
?>
</header>
  <style>
	.bd-slide-2 {background-image: url(<?php echo $document->params->get('foto1'); ?>);}
	.bd-slide-6 { background-image: url(<?php echo $document->params->get('foto2'); ?>);}
	.bd-slide-7 { background-image: url(<?php echo $document->params->get('foto3'); ?>);}
	.bd-slide-1 {background-image: url(<?php echo $document->params->get('foto4'); ?>);}
	.bd-slide-3 { background-image: url(<?php echo $document->params->get('foto5'); ?>);}
	
	
	
	</style>
	
		<div class=" bd-layoutbox-1 hidden-xs clearfix">
    <div class="bd-container-inner">
        <div class=" bd-bottomcornersshadow-1"><div id="carousel-1" class=" bd-slider-1 carousel slide">
    

  
    <div class="bd-container-inner">

    
        <div class=" bd-sliderindicators-1"><ol class=" bd-indicators-2">
    
        <li class=" bd-menuitem-6 
 active"><a href="#" data-target="#carousel-1" data-slide-to="0"></a></li>
        <li class=" bd-menuitem-6 "><a href="#" data-target="#carousel-1" data-slide-to="1"></a></li>
        <li class=" bd-menuitem-6 "><a href="#" data-target="#carousel-1" data-slide-to="2"></a></li>
        <li class=" bd-menuitem-6 "><a href="#" data-target="#carousel-1" data-slide-to="3"></a></li>
        <li class=" bd-menuitem-6 "><a href="#" data-target="#carousel-1" data-slide-to="4"></a></li>
</ol></div>

    <div class="bd-slides carousel-inner">
        <div class=" bd-slide-2 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-14 animated" data-animation-name="bounceInDown"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-15 animated" data-animation-name="bounceOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<?php if ($stc == 1) { ?><p class=" bd-textblock-28 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('ts1'); ?>
</p><?php } ?>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-6 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-16 animated" data-animation-name="bounceInDown"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-17 animated" data-animation-name="bounceOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<?php if ($stc == 1) { ?><p class=" bd-textblock-31 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('ts2'); ?>
</p><?php } ?>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-7 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-11 animated" data-animation-name="bounceInDown"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-12 animated" data-animation-name="bounceOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<?php if ($stc == 1) { ?><p class=" bd-textblock-32 bd-tagstyles">
    <?php echo $document->params->get('ts3'); ?>
</p><?php } ?>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-1 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-18 animated" data-animation-name="bounceInDown"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-19 animated" data-animation-name="bounceOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<?php if ($stc == 1) { ?><p class=" bd-textblock-16 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('ts4'); ?>
</p><?php } ?>
</div>
</div>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-3 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-20 animated" data-animation-name="bounceInDown"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    
 data-animation-display="none">
<div class=" bd-animation-21 animated" data-animation-name="bounceOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<?php if ($stc == 1) { ?><p class=" bd-textblock-17 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('ts5'); ?></p><?php } ?>
</div>
</div>
        </div>
    </div>
</div>
    </div>

    
        <div class="left-button">
    <a class=" bd-carousel-4" href="#">
        <span class=" bd-icon-38"></span>
    </a>
</div>

<div class="right-button">
    <a class=" bd-carousel-4" href="#">
        <span class=" bd-icon-38"></span>
    </a>
</div>

    
    </div>

    

    <script>
        if ('undefined' !== typeof initSlider){
            initSlider('.bd-slider-1', 'left-button', 'right-button', '.bd-carousel-4', '.bd-indicators-2', 5000, "hover", true, true);
        }
    </script>
</div></div>
    </div>
</div>
	
		<div class=" bd-layoutcontainer-11 hidden-xs">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-lg-24
 col-sm-10
 col-xs-1">
    <div class="bd-layoutcolumn-30"><div class="bd-vertical-align-wrapper"><div class=" bd-layoutbox-2 clearfix">
    <div class="bd-container-inner">
        <p class=" bd-textblock-10 bd-tagstyles">
    <?php if ($hc == 1) { ?><marquee direction="left" scrollamount="6" scrolldelay="5" onmouseover="this.stop()" onmouseout="this.start()"><?php echo $document->params->get('hot'); ?></marquee><?php } ?>
</p>
    </div>
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php if ($dplayer == 1) { ?><div class=" bd-animation-3 animated" data-animation-name="bounceInUp"
                                    data-animation-event="onload"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><section class=" bd-section-4 bd-tagstyles" id="VIDEO" data-section-title="VIDEO">
    <div class="bd-vertical-align-section-wrapper">
        <div class="container  bd-containereffect-1"><div class=" bd-layoutcontainer-10">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-8
 col-sm-12">
    <div class="bd-layoutcolumn-23"><div class="bd-vertical-align-wrapper"><div class="bd-imagestyles bd-video-1 ">
    <div class="embed-responsive embed-responsive-16by9">
        

        
            <iframe data-autoplay=false class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $document->params->get('video'); ?>?rel=0&amp;autoplay=<?php echo $document->params->get('autoplay'); ?>&amp;start=<?php echo $document->params->get('start'); ?>&amp;controls=<?php echo $document->params->get('show'); ?>&amp;showinfo=<?php echo $document->params->get('showinfo'); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
	
		<h3 class=" bd-textblock-9 bd-tagstyles">
    <?php echo $document->params->get('vti'); ?>
</h3>
	
		<p class=" bd-textblock-11 bd-tagstyles">
    <?php echo $document->params->get('vte'); ?>
</p></div></div>
</div>
	
		<div class=" 
 col-md-8
 col-sm-12">
    <div class="bd-layoutcolumn-24"><div class="bd-vertical-align-wrapper"><div class="bd-imagestyles bd-video-2 ">
    <div class="embed-responsive embed-responsive-16by9">
        

        
            <iframe data-autoplay=false class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $document->params->get('video2'); ?>?rel=0&amp;autoplay=<?php echo $document->params->get('autoplay2'); ?>&amp;start=<?php echo $document->params->get('start2'); ?>&amp;controls=<?php echo $document->params->get('show2'); ?>&amp;showinfo=<?php echo $document->params->get('showinfo2'); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
	
		<h3 class=" bd-textblock-12 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('vti1'); ?>
</h3>
	
		<p class=" bd-textblock-13 bd-tagstyles">
    <?php echo $document->params->get('vte1'); ?>
</p></div></div>
</div>
	
		<div class=" 
 col-md-8
 col-sm-12">
    <div class="bd-layoutcolumn-25"><div class="bd-vertical-align-wrapper"><div class="bd-imagestyles bd-video-3 ">
    <div class="embed-responsive embed-responsive-16by9">
        

        
            <iframe data-autoplay=false class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $document->params->get('video3'); ?>?rel=0&amp;autoplay=<?php echo $document->params->get('autoplay3'); ?>&amp;start=<?php echo $document->params->get('start3'); ?>&amp;controls=<?php echo $document->params->get('show3'); ?>&amp;showinfo=<?php echo $document->params->get('showinfo3'); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
	
		<h3 class=" bd-textblock-14 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-inputs bd-custom-bulletlist bd-custom-orderedlist bd-custom-table">
    <?php echo $document->params->get('vti2'); ?>
</h3>
	
		<p class=" bd-textblock-15 bd-tagstyles">
    <?php echo $document->params->get('vte2'); ?>
</p></div></div>
</div>
            </div>
        </div>
    </div>
</div></div>
    </div>
</section></div><?php } ?>
	
		<div class=" bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-9"><div class="bd-sheetstyles bd-contentlayout-9 ">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical bd-stretch-inner">
            
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php renderTemplateFromIncludes('sidebar_area_3'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
 <?php renderTemplateFromIncludes('sidebar_area_5'); ?>
                    <div class=" bd-layoutitemsbox-27 bd-flex-wide">
    <div class=" bd-content-9">
    <div class="bd-container-inner">
        <?php
            $document = JFactory::getDocument();
            echo $document->view->renderSystemMessages();
            $document->view->componentWrapper('common');
            echo '<jdoc:include type="component" />';
        ?>
    </div>
</div>
</div>
                    
 <?php renderTemplateFromIncludes('sidebar_area_6'); ?>
                </div>
                
 <?php renderTemplateFromIncludes('sidebar_area_2'); ?>
            </div>
            
 <?php renderTemplateFromIncludes('sidebar_area_4'); ?>
        </div>
    </div>
</div></div>
	
		<?php if ($galleryc == 1) { ?><div class=" bd-animation-4 animated" data-animation-name="bounceInUp"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    ><section class=" bd-section-3 bd-tagstyles" id="poster" data-section-title="Poster">
    <div class="bd-vertical-align-section-wrapper">
        <div class=" bd-layoutcontainer-3">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-9"><div class="bd-vertical-align-wrapper"><div class=" bd-shadowinnerout-10">
    <div class="bd-outer-shadow">
        <div class="bd-shadow-inner">
<img class="bd-imagestyles-22 bd-imagelink-3   " src="<?php echo $document->params->get('foto6'); ?>" width="244" height="362"></div>
    </div>
</div>
	
		<h4 class=" bd-textblock-1 bd-tagstyles">
    <?php echo $document->params->get('title6'); ?>
</h4>
	
		<p class=" bd-textblock-2 bd-tagstyles">
    <?php echo $document->params->get('text6'); ?>
</p>
	
		<a href="<?php echo $document->params->get('link6'); ?>" class=" bd-linkbutton-1 btn   btn-primary bd-icon-24"   >
<?php echo $document->params->get('button6'); ?>
</a></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-18"><div class="bd-vertical-align-wrapper"><div class=" bd-shadowinnerout-8">
    <div class="bd-outer-shadow">
        <div class="bd-shadow-inner">
<img src="<?php echo $document->params->get('foto7'); ?>" width="244" height="362" class="bd-imagestyles-24 bd-imagelink-7   "></div>
    </div>
</div>
	
		<h4 class=" bd-textblock-3 bd-tagstyles">
    <?php echo $document->params->get('title7'); ?>
</h4>
	
		<p class=" bd-textblock-4 bd-tagstyles">
    <?php echo $document->params->get('text7'); ?>
</p>
	
		<a href="<?php echo $document->params->get('link7'); ?>" class=" bd-linkbutton-2 btn   btn-primary bd-icon-27"   >
<?php echo $document->params->get('button7'); ?>
</a></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-20"><div class="bd-vertical-align-wrapper"><div class=" bd-shadowinnerout-6">
    <div class="bd-outer-shadow">
        <div class="bd-shadow-inner">
<img class="bd-imagestyles-25 bd-imagelink-8   " src="<?php echo $document->params->get('foto8'); ?>" width="244" height="362"></div>
    </div>
</div>
	
		<h4 class=" bd-textblock-5 bd-tagstyles">
    <?php echo $document->params->get('title8'); ?>
</h4>
	
		<p class=" bd-textblock-6 bd-tagstyles">
    <?php echo $document->params->get('text8'); ?>
</p>
	
		<a href="<?php echo $document->params->get('link8'); ?>" class=" bd-linkbutton-3 btn   btn-primary bd-icon-31"   >
<?php echo $document->params->get('button8'); ?>
</a></div></div>
</div>
	
		<div class=" 
 col-lg-6
 col-sm-12">
    <div class="bd-layoutcolumn-22"><div class="bd-vertical-align-wrapper"><div class=" bd-shadowinnerout-7">
    <div class="bd-outer-shadow">
        <div class="bd-shadow-inner">
<img class="bd-imagestyles-26 bd-imagelink-9   " src="<?php echo $document->params->get('foto9'); ?>" width="244" height="362"></div>
    </div>
</div>
	
		<h4 class=" bd-textblock-7 bd-tagstyles">
    <?php echo $document->params->get('title9'); ?>
</h4>
	
		<p class=" bd-textblock-8 bd-tagstyles">
    <?php echo $document->params->get('text9'); ?>
</p>
	
		<a href="<?php echo $document->params->get('link9'); ?>" class=" bd-linkbutton-4 btn   btn-primary bd-icon-35"   >
<?php echo $document->params->get('button9'); ?>
</a></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section></div><?php } ?>
	
		<footer class=" bd-footerarea-1">
        <div class=" bd-shadowinnerout-11">
    <div class="bd-outer-shadow">
        <div class="bd-shadow-inner"><section class=" bd-section-2 bd-tagstyles" id="section2" data-section-title="">
    <div class="bd-vertical-align-section-wrapper">
        <div class="container  bd-containereffect-6"><div class=" bd-layoutcontainer-28">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
 bd-row-flex
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-60"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_2');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-61"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_3');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-62"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_4');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-12
 col-xs-24">
    <div class="bd-layoutcolumn-63"><div class="bd-vertical-align-wrapper"><?php
    renderTemplateFromIncludes('joomlaposition_5');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div></div>
    </div>
</section></div>
    </div>
</div>
	
		<div class=" bd-layoutbox-3 clearfix">
    <div class="bd-container-inner">
        <p class=" bd-textblock-30 bd-tagstyles">
    Copyright © <?php echo date("Y");?> <?php echo $document->params->get('footer1'); ?> Rights Reserved.
</p>
    </div>
</div>
	
		<div class=" bd-layoutbox-5 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-animation-22 animated" data-animation-name="bounceInUp"
                                    data-animation-event="scroll"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"
                                    >
<p class=" bd-textblock-18 bd-tagstyles">
    <font color="#d9534f">
    Design by:</font> <a href="http://www.diablodesign.eu" style=""><font color="#0e313f" style="">www.diablodesign.eu
</font></a>
</p>
</div>
    </div>
</div>
</footer>
	
		<div data-animation-time="250" class=" bd-smoothscroll-3"><a href="#" class=" bd-backtotop-1">
    <span class=" bd-icon-66"></span>
</a></div>
<?php if ($ac == 1) { ?><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $document->params->get('analytics'); ?>', 'auto');
  ga('send', 'pageview');

</script><?php } ?>
</body>
</html>