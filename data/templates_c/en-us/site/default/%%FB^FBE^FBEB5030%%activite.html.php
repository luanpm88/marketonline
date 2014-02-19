<?php /* Smarty version 2.6.27, created on 2013-05-31 07:54:58
         compiled from emails/activite.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['_G']['site_title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
" />
<base target="_blank" />
<?php echo '
<style>
div, h1, p{ margin: 0; padding: 0;}
#sendbox { width:600px; padding:10px; background:#fff; font-size:12px; font-family:Arial, Helvetica, sans-serif}
#sendbox .content { border:1px solid #ccc; padding:10px;}
#sendbox .content h1 { font-size:24px; font-weight:bold; line-height:160%;}
#sendbox .content em { color:#ccc; font-size:12px; display:block; margin-bottom:20px;font-style:normal;}
#sendbox .content p { text-indent:22px;line-height:18px;}
#sendbox .info p { color:#ccc; padding:5px 10px 0 10px; line-height:18px;}
</style>
'; ?>

</head>

<body>
<div id="sendbox">
    <div class="content">
        <h1><?php echo $this->_tpl_vars['_pls_active_your_account']; ?>
</h1>
        <em><?php echo $this->_tpl_vars['_pls_click_the_link_to_active']; ?>
</em>
        <div>
		<p><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
pending.php?do=member&action=activate&hash=<?php echo $this->_tpl_vars['hash']; ?>
"><?php echo $this->_tpl_vars['_click_here']; ?>
</a><?php echo $this->_tpl_vars['_active_and_expired']; ?>
<?php echo $this->_tpl_vars['expire_date']; ?>
.</p>
		<p><?php echo $this->_tpl_vars['SiteUrl']; ?>
pending.php?do=member&action=activate&hash=<?php echo $this->_tpl_vars['hash']; ?>
</p>
		</div>
    </div>
    <div class="info">
        <p><?php echo $this->_tpl_vars['_the_website_email_sended']; ?>
</p>
    </div>
</div>
</body>
</html>