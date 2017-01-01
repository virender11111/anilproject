<?php echo $this->Html->Tag('h1', __('Change language:')); ?>
<ul>
<?php foreach($availableLanguages as $key=>$value) {
    $link = $this->Html->Link($value, array('controller' => 'pages', 'action' => 'changeLanguage', $key));
    echo $this->Html->Tag('li', $link, array('class' => $key == $language ? 'selected' : ''));
} ?>
</ul>
 
<p>&nbsp;</p>
<?php echo $this->Html->Tag('h2', __('Hello!')); ?>
<style>
    ul li a {text-decoration: none;}
    ul li.selected a {text-decoration: underline;}
</style>