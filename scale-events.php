<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>PDQ Flyers - Scale Events</title>
<meta NAME="Keywords" Content="PDQ Flyers, RC Aircraft, Helipcopters, Floot Planes, 3D Planes, Aerobatics, Fun flying, Park flyers, Electric RC">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="xsp_styles.css">
<style>

TABLE.XSP_OUTLINE {HEIGHT: 100%; WIDTH: 780px; border: 8px solid #B6B3B7; }

</style>

<script type="text/javascript">
// Browser Slide-Show script. With image cross fade effect for those browsers
// that support it.
// Script copyright (C) 2004-2008 www.cryer.co.uk.
// Script is free to use provided this copyright header is included.
var FadeDurationMS=1000;
function SetOpacity(object,opacityPct)
{
// IE.
object.style.filter = 'alpha(opacity=' + opacityPct + ')';
// Old mozilla and firefox
object.style.MozOpacity = opacityPct/100;
// Everything else.
object.style.opacity = opacityPct/100;
}
function ChangeOpacity(id,msDuration,msStart,fromO,toO)
{
var element=document.getElementById(id);
var msNow = (new Date()).getTime();
var opacity = fromO + (toO - fromO) * (msNow - msStart) / msDuration;
if (opacity>=100)
{
SetOpacity(element,100);
element.timer = undefined;
}
else if (opacity<=0)
{
SetOpacity(element,0);
element.timer = undefined;
}
else
{
SetOpacity(element,opacity);
element.timer = window.setTimeout("ChangeOpacity('" + id + "'," + msDuration + "," + msStart + "," + fromO + "," + toO + ")",10);
}
}
function FadeInImage(foregroundID,newImage,backgroundID)
{
var foreground=document.getElementById(foregroundID);
if (foreground.timer) window.clearTimeout(foreground.timer);
if (backgroundID)
{
var background=document.getElementById(backgroundID);
if (background)
{
if (background.src)
{
foreground.src = background.src;
SetOpacity(foreground,100);
}
background.src = newImage;
background.style.backgroundImage = 'url(' + newImage + ')';
background.style.backgroundRepeat = 'no-repeat';
var startMS = (new Date()).getTime();
foreground.timer = window.setTimeout("ChangeOpacity('" + foregroundID + "'," + FadeDurationMS + "," + startMS + ",100,0)",10);
}
} else {
foreground.src = newImage;
}
}
var slideCache = new Array();
function RunSlideShow(pictureID,backgroundID,imageFiles,displaySecs)
{
var imageSeparator = imageFiles.indexOf(";");
var nextImage = imageFiles.substring(0,imageSeparator);
FadeInImage(pictureID,nextImage,backgroundID);
var futureImages = imageFiles.substring(imageSeparator+1,imageFiles.length)+ ';' + nextImage;
setTimeout("RunSlideShow('"+pictureID+"','"+backgroundID+"','"+futureImages+"',"+displaySecs+")",displaySecs*1000);
// Cache the next image to improve performance.
imageSeparator = futureImages.indexOf(";");
nextImage = futureImages.substring(0,imageSeparator);
if (slideCache[nextImage] == null)
{
slideCache[nextImage] = new Image;
slideCache[nextImage].src = nextImage;
}
}
</script><link type="text/css" rel="stylesheet" href="INFO_BAR_MENU.css">
<link type="text/css" rel="stylesheet" href="LEFT_MENU.css">
<link type="text/css" rel="stylesheet" href="FOOTER_MENU.css">
<script type="text/javascript" src="milonic_src.js"></script>
<script type="text/javascript" src="mmenudom.js"></script>


</head>
<body>
<table class="XSP_OUTLINE" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<td colspan="3" class="XSP_INFO_BAR"><div align="center">
    <table style="WIDTH: 895px; HEIGHT: 266px"
           border="0"
           cellspacing="0"
           cellpadding="0"
           align="center">
        <tbody>
            <tr>
                <td style="WIDTH: 200px"
                    valign="top"
                    align="left">&nbsp;</td>

                <td valign="top"
                    align="left">&nbsp;</td>
            </tr>

            <tr>
                <td style="WIDTH: 200px; HEIGHT: 5px"
                    valign="top"
                    align="left"></td>

                <td valign="top"
                    align="left"><font face="Arial">&nbsp;</font></td>
            </tr>

            <tr>
                <td valign="top"
                    align="left"><span style="FONT-SIZE: 16pt"><font color="#333333"><img style=
                    "WIDTH: 382px; HEIGHT: 45px"
                     title="PDQ Banner"
                     border="0"
                     alt="PDQ Banner"
                     src="images/PDQ%20banner%206.jpg"></font></span></td>

                <td style="HEIGHT: 5px"
                    valign="top"
                    align="left">
                    <p align="right">&nbsp;<table border="0" cellspacing="0" cellpadding="0" ><tbody><tr><td><script type="text/javascript" src="script/INFO_BAR_MENU.js"></script><script type="text/javascript" src="preloadmenuimages.js"></script></td></tr></tbody></table>
<noscript>
<table width="100%"><tbody><tr><td> <table class="mainINFO_BAR_MENU"> 
 <tbody> 
<tr><td>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.pdqflyers.com/" target="">HOME</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="club-news.php" target="">Club&nbsp;News</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="about-our-club.php" target="">About&nbsp;our&nbsp;Club</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="pdq-officers.php" target="">PDQ&nbsp;Officers</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="field-locations.php" target="">Field&nbsp;Locations</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="pdq-flyers-events.php" target="">PDQ&nbsp;Flyers&nbsp;Events</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="scale-competition-2012.php" target="">Scale&nbsp;Competition&nbsp;-&nbsp;2012</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="fun-fly-2012.php" target="">Fun&nbsp;Fly&nbsp;-&nbsp;2012</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="awards-and-trophies.php" target="">Awards&nbsp;and&nbsp;Trophies</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="field-rules.php" target="">Field&nbsp;Rules</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="noise-regulations.php" target="">Noise&nbsp;Regulations</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="training-program.php" target="">Training&nbsp;Program</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="juniors.php" target="">Juniors</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="photo-central.php" target="">Photo&nbsp;Central</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="our-airfield.php" target="">Our&nbsp;Airfield</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="member-pictures.php" target="">Member&nbsp;pictures</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="scale-events.php" target="">Scale&nbsp;Events</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="special-events.php" target="">Special&nbsp;Events</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="online-swap-meet.php" target="">Online&nbsp;Swap&nbsp;Meet</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="help.php" target="">Help</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="add-a-comment.php" target="">Add&nbsp;a&nbsp;Comment</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="add-rss-feed.php" target="">Add&nbsp;RSS&nbsp;feed</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="set-up-photobucket.php" target="">Set&nbsp;up&nbsp;Photobucket</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="contact-us.php" target="">Contact&nbsp;Us</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="member's-only.php" target="">Member's&nbsp;Only</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="areas-of-interest.php" target="">Areas&nbsp;of&nbsp;Interest</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="neat-stuff.php" target="">Neat&nbsp;Stuff</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="general-tips.php" target="">General&nbsp;Tips</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="pre-season-check-out.php" target="">Pre-season&nbsp;Check&nbsp;Out</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="simulators.php" target="">Simulators</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://adamone.rchomepage.com/guide4.htm" target="_blank">Beginners&nbsp;Guide&nbsp;to&nbsp;Glow&nbsp;Engines</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.scootworks.com/rdrc/gloplugs.html" target="_blank">Glow&nbsp;Plug&nbsp;Advice</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="eflight.php" target="">eFlight</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="indoor-flying.php" target="">Indoor&nbsp;Flying</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="electric-flight-primer.php" target="">Electric&nbsp;Flight&nbsp;Primer</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="key-learnings.php" target="">Key&nbsp;Learnings</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.ezonemag.com/" target="_blank">eZone&nbsp;Magazine</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="aerobatics.php" target="">Aerobatics</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://pages.suddenlink.net/donramsey/HelloPage.htm" target="_blank">Pattern&nbsp;Competition</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="float-planes.php" target="">Float&nbsp;Planes</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="3d-flight.php" target="">3D&nbsp;Flight</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="model-building.php" target="">Model&nbsp;Building</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.airfieldmodels.com/" target="_blank">Airfield&nbsp;Models</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.youtube.com/watch?v=4oYTQLqa82E" target="_blank">Installing&nbsp;Hinges</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.rc-airplane-world.com/propeller-size.html" target="_blank">Prop&nbsp;Size&nbsp;Chart</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.flyrc.com/500005-0" target="_blank">Retracts&nbsp;described</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="helicopters.php" target="">Helicopters</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="heli-hints.php" target="">Heli&nbsp;hints</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="links.php" target="">Links</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.maac.ca/home.php" target="_blank">MAAC</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.pdqflyers.com/hobbyshops/Hobbyhome.php" target="_blank">Hobby&nbsp;Suppliers</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="other-flying-club-websites.php" target="">Other&nbsp;Flying&nbsp;Club&nbsp;websites</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.vrcms.org/main.html" target="_blank">Victoria&nbsp;club</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.rcfcbc.com/" target="_blank">Vancouver&nbsp;club</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.rc-airplane-world.com/british-columbia-rc-airplane-clubs.html" target="_blank">BC&nbsp;Clubs&nbsp;Directory</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.rc-airplane-world.com/washington-rc-airplane-clubs.html" target="_blank">WA&nbsp;Clubs&nbsp;Directory</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.towerhobbies.com/rcwairclub.html" target="_blank">World&nbsp;wide&nbsp;clubs</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="area-links.php" target="">Area&nbsp;Links</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.bcferries.com/" target="_blank">BC&nbsp;Ferries</a></span>
 <span class="xsp1INFO_BAR_MENU"><a class="mainlinksINFO_BAR_MENU" href="http://www.nanaimoairport.com/" target="_blank">Nanaimo&nbsp;Airport</a></span>
</td></tr>
</tbody></table>
</td></tr></tbody></table>
</noscript>
</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</td>
</tr>
<tr>
<td class="XSP_LEFT_PANEL_SPC" id="XSP_LEFT_PANEL_SPC">&nbsp;</td>
<td class="XSP_CENTER_PANEL" rowspan="2"><table class="XSP_CENTER_PANEL" cellpadding="0" cellspacing="0" border="0"><tr><td class="XSP_MAIN_PANEL"><p><span style="FONT-SIZE: 20pt"><strong><font color="#0000ff">Scale Event -2010</font></strong></span></p>

<table style="WIDTH: 725px"
       border="0"
       cellspacing="1"
       cellpadding="0">
    <tbody>
        <tr>
            <td valign="middle"
                align="left">
                <h4>Scale Event 2010 - Part 1</h4>

                <ul>
                    <li>by Don Varnadore</li>

                    <li>June, 2010</li>

                    <li>438 Photos</li>
                </ul>

                <p>Link to the album: <a href="http://s772.photobucket.com/albums/yy5/pdqflyers/"
                   target="_new">Click here</a></p>
            </td>

            <td style="WIDTH: 320px; HEIGHT: 270px"
                valign="top"
                align="left">
                <div style="TEXT-ALIGN: right; WIDTH: 480px">
                    <embed height="360"
                         type="application/x-shockwave-flash"
                         width="480"
                         src="http://static.pbsrc.com/flash/rss_slideshow.swf"
                         flashvars=
                         "rssFeed=http%3A%2F%2Ffeed772.photobucket.com%2Falbums%2Fyy5%2Fpdqflyers%2Ffeed.rss"
                         wmode="transparent">
                </div>
            </td>
        </tr>

        <tr>
            <td valign="middle"
                align="left">
                &nbsp; 

                <h4>Scale Event 2010 - Part 2</h4>

                <ul>
                    <li>by Don Varnadore</li>

                    <li>June, 2010</li>

                    <li>296&nbsp;Photos</li>
                </ul>

                <p>Link to the album: <a href="http://s772.photobucket.com/albums/yy5/pdqflyers/scale%202010/"
                   target="_new">Click here</a></p>
            </td>

            <td style="WIDTH: 320px; HEIGHT: 270px"
                valign="top"
                align="left">
                &nbsp; 

                <div style="TEXT-ALIGN: right; WIDTH: 480px">
                    <embed height="360"
                         type="application/x-shockwave-flash"
                         width="480"
                         src="http://static.pbsrc.com/flash/rss_slideshow.swf"
                         flashvars=
                         "rssFeed=http%3A%2F%2Ffeed772.photobucket.com%2Falbums%2Fyy5%2Fpdqflyers%2Fscale%25202010%2Ffeed.rss"
                         wmode="transparent">
                </div>
            </td>
        </tr>

        <tr>
            <td valign="middle"
                align="left">
                &nbsp; 

                <h4>Scale Event 2009</h4>

                <ul>
                    <li>by Unknown</li>

                    <li>May, 2009</li>

                    <li>80&nbsp;Photos</li>
                </ul>

                <p>Link to the album: <a href="http://s772.photobucket.com/albums/yy5/pdqflyers/scale%202010/"
                   target="_new">Click here</a></p>
            </td>

            <td style="WIDTH: 320px; HEIGHT: 270px"
                valign="top"
                align="left">
                &nbsp; 

                <div style="TEXT-ALIGN: right; WIDTH: 480px">
                    <embed height="360"
                         type="application/x-shockwave-flash"
                         width="480"
                         src="http://static.pbsrc.com/flash/rss_slideshow.swf"
                         wmode="transparent"
                         flashvars=
                         "rssFeed=http%3A%2F%2Ffeed772.photobucket.com%2Falbums%2Fyy5%2Fpdqflyers%2FScale%25202009%2Ffeed.rss">
                    </div>
            </td>
        </tr>
    </tbody>
</table>
</td></tr></table></td>
<td class="XSP_RIGHT_PANEL_SPC" id="XSP_RIGHT_PANEL" rowspan="2"><div class="XSP_RIGHT_PANEL"><p>&nbsp;</p>

</div></td></tr>
<tr><td class="XSP_LEFT_PANEL_2" id="XSP_LEFT_PANEL" style="FONT-SIZE:1px;" height=1><div class="XSP_LEFT_PANEL"><div>
    <table border="0" cellspacing="0" cellpadding="0" ><tbody><tr><td><script type="text/javascript" src="script/LEFT_MENU0.js"></script>  <script type="text/javascript" src="preloadmenuimages.js"></script>  </td></tr></tbody></table>
<noscript>
<table><tbody><tr><td> <TABLE class="mainLEFT_MENU" cellpadding="0px" cellspacing="0px"> 
 <TBODY> 
</TBODY></TABLE>
</td></tr></tbody></table>
</noscript>


</div>

<div id="wx_module_2633">
    <script type="text/javascript">

   /* Locations can be edited manually by updating 'wx_locID' below.  Please also update */
   /* the location name and link in the above div (wx_module) to reflect any changes made. */
   var wx_locID = 'CAXX0347';

   /* If you are editing locations manually and are adding multiple modules to one page, each */
   /* module must have a unique div id.  Please append a unique # to the div above, as well */
   /* as the one referenced just below.  If you use the builder to create individual modules  */
   /* you will not need to edit these parameters. */
   var wx_targetDiv = 'wx_module_2633';

   /* Please do not change the configuration value [wx_config] manually - your module */
   /* will no longer function if you do.  If at any time you wish to modify this */
   /* configuration please use the graphical configuration tool found at */
   /* https://registration.weather.com/ursa/wow/step2 */
   var wx_config='SZ=300x250*WX=FHW*LNK=SSNL*UNT=C*BGI=winter*MAP=null|null*DN=somesmiths.com*TIER=0*PID=1187699876*MD5=75da0af115f6179ca4433d8c8829c93d';

   document.write('<scr'+'ipt src="'+document.location.protocol+'//wow.weather.com/weather/wow/module/'+wx_locID+'?config='+wx_config+'&proto='+document.location.protocol+'&target='+wx_targetDiv+'"></scr'+'ipt>');  
</script>
</div>

<div>
    &nbsp;
</div>

<div id="SlideShowBackground">
    <img style="WIDTH: 300px; HEIGHT: 200px"
         id="SlideShow"
         title="slide show"
         border="0"
         alt="slide show"
         src="http://www.somesmiths.com/PDQ/images/SLplane1.jpg">&nbsp;
</div>

<p><script type="text/javascript">RunSlideShow("SlideShow","SlideShowBackground","http://www.somesmiths.com/PDQ/images/SLplane1.jpg;http://www.somesmiths.com/PDQ/images/SLplane2.jpg;http://www.somesmiths.com/PDQ/images/SLplane3.jpg;http://www.somesmiths.com/PDQ/images/SLplane4.jpg;http://www.somesmiths.com/PDQ/images/SLplane5.jpg;http://www.somesmiths.com/PDQ/images/SLplane6.jpg ",5);
</script></p>

<p><span style="FONT-SIZE: 12pt"><strong><font color="#0000ff">To find anything on our main
site:</font></strong></span></p>

<div>
    <form action="search-results.php" method="post"><input type="hidden" name="page" value="1">
<table class="border6a208eb0-7404-49f4-900f-4bf6c641f90e">
<tr><td colspan=2 class="label6a208eb0-7404-49f4-900f-4bf6c641f90e">Enter keywords:</td></tr>
<tr>
<td class="cell16a208eb0-7404-49f4-900f-4bf6c641f90e"><input type="text" name="term" class="input6a208eb0-7404-49f4-900f-4bf6c641f90e" value=""/></td>
<td class="cell26a208eb0-7404-49f4-900f-4bf6c641f90e"><input type="submit" value="Search" class="button6a208eb0-7404-49f4-900f-4bf6c641f90e"/></td>
</tr></table></form>

</div>

</div></td></tr>

<tr><td colspan="3" class="XSP_FOOTER_PANEL"><p align="center"><table border="0" cellspacing="0" cellpadding="0" ><tbody><tr><td><script type="text/javascript" src="script/FOOTER_MENU.js"></script><script type="text/javascript" src="preloadmenuimages.js"></script></td></tr></tbody></table>
<noscript>
<table width="100%"><tbody><tr><td> <table class="mainFOOTER_MENU"> 
 <tbody> 
<tr><td>
 <span class="xsp1FOOTER_MENU"><a class="mainlinksFOOTER_MENU" href="http://www.pdqflyers.com/" target="">HOME</a></span>
 <span class="xsp1FOOTER_MENU"><a class="mainlinksFOOTER_MENU" href="sitemap-page-order.php" target="">Website&nbsp;Map</a></span>
</td></tr>
</tbody></table>
</td></tr></tbody></table>
</noscript>
</p>

<p align="center">&nbsp;</p>

<p style=
"BORDER-BOTTOM: #c0c0c0 1px solid; BORDER-LEFT: #c0c0c0 1px solid; BACKGROUND-COLOR: #c0c0c0; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; MARGIN-LEFT: 350px; BORDER-TOP: #c0c0c0 1px solid; MARGIN-RIGHT: 350px; BORDER-RIGHT: #c0c0c0 1px solid"
   align="center">Parksville District and Qualicum Flyers</p></td></tr></table>

<script language="javascript" type="text/javascript">
<!--
document.getElementById("XSP_LEFT_PANEL_SPC").innerHTML = document.getElementById("XSP_LEFT_PANEL").innerHTML;
document.getElementById("XSP_LEFT_PANEL").innerHTML = "&nbsp;";
//-->
</script>

</body>
</html>

