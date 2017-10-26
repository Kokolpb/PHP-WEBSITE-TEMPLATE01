<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/pagenav.class.php";

//抽出单个产品
$strSQL = "SELECT * from productinfo where id_prodinfo=$_GET[pid] and dele='1'";   
$objDB->Execute($strSQL);
$oneproduct=$objDB->fields();

//去单个产品的所有图片
$strSQL = "SELECT * from productpic where id_prodinfo=$_GET[pid] and type='JPG' and dele='1'";   
$objDB->Execute($strSQL);
$oneproductpic=$objDB->GetRows();

//取PDF

  $strSQL = "select opicname as pdf from productpic  where id_prodinfo ='".$_GET[pid]."' and type='PDF' order by id_prodpic asc limit 1" ;
  $objDB->Execute($strSQL);
  $arronepdf=$objDB->fields();

//取最后一条新闻，放入左侧NEWS中
$strSQL = "select title,newsdate,id_newsdir,id_newsinfo from newsinfo where id_newsdir='3' or id_newsdir='4' order by newsdate desc limit 1" ;
$objDB->Execute($strSQL);
$adv_A7=$objDB->fields();

//页面右上角广告
$strSQL = "select a.intro,b.opicname as pic from layout as a left join layoutpic as b
 on a.id_layout=b.id_layout  where a.id_layout='10' order by b.id_layoutpic desc limit 1" ;
$objDB->Execute($strSQL);
$adv_B1=$objDB->fields();

//页面左侧广告A1
$strSQL = "select a.intro,b.opicname as pic from layout as a left join layoutpic as b
 on a.id_layout=b.id_layout  where a.id_layout='11' order by b.id_layoutpic desc limit 1" ;
$objDB->Execute($strSQL);
$adv_B2=$objDB->fields();

//页面左侧广告A2
$strSQL = "select a.intro,b.opicname as pic from layout as a left join layoutpic as b
 on a.id_layout=b.id_layout  where a.id_layout='12' order by b.id_layoutpic desc limit 1" ;
$objDB->Execute($strSQL);
$adv_B3=$objDB->fields();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />

<title><?php echo $setinfo[title];?></title>
<link href="/inc/css/css1.css" rel="stylesheet" type="text/css">
<script src="/inc/js/stmenu.js" type="text/javascript"></script>
<script src="/inc/js/jquery.js" type="text/javascript"></script>
<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<style type="text/css">
<!--
#header_other{float: left;margin-top:3px;width:100%;height:5px; font-size:4px; background-image:url(/inc/pics/<?=$stylebg2;?>)} 
#inner_contenttop{margin-left:-1px;margin-top:-3px;float: left;width:965px;height:38px;position:relative; z-index:98;;background-image:url(/inc/pics/<?=$stylebg;?>) }
.txt_02 {font-size: 8pt;color:<?=$stylecolor;?>;text-decoration: underline;text-align:left;}
.link_04_1 {font-size: 10pt;font-weight: normal;;color:<?=$stylecolor;?>;text-decoration: underline;;text-align:left;}
a.link_04_1:hover {font-size: 10pt;font-weight: normal;color: <?=$stylecolor;?>;text-decoration: underline;}
.txt_03 {font-size: 8pt;color:<?=$stylecolor;?>;text-align:left;text-decoration: none; font-weight:bold}
-->
</style>
</head>
<body>

<? require "../header.php"; ?>

<div id="contain">
<div id="mainbg">

<!--box!-->
<div class="RoundedCorner" style="width:965px; margin-top:-3px"> 
<b class="rtop"><b class="r3"></b></b> 
<!--box content!-->
<div id="inner_content">

<div id="inner_contenttop"></div>

<div id="inner_contentinner">
<div id="inner_contentinner_left">
<div id="inner_contentinner_left1"><img src="/inc/pics/products01.gif" width="203" height="87" /></div>
<div id="inner_contentinner_left2"><? require "leftmenu.php"; ?></div>
<div id="inner_contentinner_left3news01"><img src="/inc/pics/news01.gif" /></div>
<div id="inner_contentinner_left3news02">
<div id="inner_contentinner_left3news02u" class="txt_01">
<p>

<a href="/en/news/<?php 
if($adv_A7[id_newsdir]=='3')
{echo 'companynews';}
if($adv_A7[id_newsdir]=='4')
{echo 'productnews';}
?>.php?id=<?php echo $adv_A7[id_newsinfo];?>" class="link_03"><?php echo cutstr($adv_A7[title],20,1);?></a><br>
<?php echo $adv_A7[newsdate];?></p>
</div>
<div id="inner_contentinner_left3news02d"><img src="/upload/layout/<?php echo $adv_B2[pic];?>" width="148" height="62" /></div>
</div>
<div id="inner_contentinner_left3news03"><img src="/inc/pics/news02.gif" /></div>

<div id="inner_contentinner_left3news04"><img src="/upload/layout/<?php echo $adv_B3[pic];?>" width="159" height="121" /></div>
</div>

<div id="inner_contentinner_right">
<div id="#inner_contentinner_right1">
<div id="inner_contentinner_right1L">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
  <tr>
    <td height="30" align="left" class="txt_01"> Home &gt;Products &gt; <span class="txt_02">Products</span></td>
  </tr>
  <tr>
    <td height="120"><img src="/inc/pics/products.gif" width="355" height="76" /></td>
  </tr>
</table>
</div>
<div id="inner_contentinner_right1R"><img src="/upload/layout/<?php echo $adv_B1[pic];?>" /></div>
</div>

<div id="inner_contentinner_right2">
<div id="inner_contentinner_right2L"><span  style="cursor:pointer"  onclick="needsendmail();"><img src="/inc/pics/icon010.gif" /></span></div>
<div id="inner_contentinner_right2R"><span style="cursor:pointer" onclick="window.print();"><img src="/inc/pics/icon011.gif" /></span></div>
</div>

<div id="inner_contentinner_right4" class='txt'>
</div>

<div id="inner_contentinner_right3" class='txt'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="79%" height="140" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
        <tr>
          <td class="txt_title"><?php echo $oneproduct[title];?></td>
        </tr>
        <tr>
          <td ><?php echo $oneproduct[content];?></td>
        </tr>
        <tr>
        <td><table width="140"  border="0" cellspacing="2" cellpadding="2" class="txt">
            <tr>
              <? for($i=0;$i<sizeof($oneproductpic);$i++){
	              if($i%4==0){echo "</tr><tr>";}
	           ?>
              <td align="left" valign="bottom">
                <table width="140" border="0" cellpadding="0" cellspacing="0" class="txt">
                  <tr>
                    <td align="center">
                    <a href="javascript:void(0)"  onclick="$.wholepop.dialogClass ='style_1';poppic('/upload/product/<?php echo $oneproductpic[$i][opicname];?>','Product Overview');"> <img src="/upload/product/<?php echo $oneproductpic[$i][opicname];?>" width="120" border="0" ></a>
                    </td>
                  </tr>
                  <tr>
                    <td height="10" align="left"></td>
                  </tr>
              </table></td>
              <? }?>
            </tr>
        </table></td>
        </tr>
      </table></td>
    </tr>
    <?php if($arronepdf[pdf]!=''){?>
        <tr>
      <td height="30" align="right" valign="middle"><a href="/upload/product/<?php echo $arronepdf[pdf]?>" target="_blank"><img src="/inc/pics/adobe.gif" width="21" height="15" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
     <?php }?> 
    <tr>
      <td style="padding:0; height:1px;" bgcolor="#F5F5F5"></td>
      </tr>
  </table>
</div>

</div>
</div>

</div>



<!--box end content!-->
<b class="rbottom"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b> 
</div> 
<!--boxend!-->



</div>
</div>


<? require "../footer.php"; ?>



</body>
</html>
