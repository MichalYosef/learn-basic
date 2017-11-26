<?php // $item is from actionItemDetail ?>

<!-- Pay attention! Since renderPartial() is a method of the Controller
class and $this refers to the View class in the view file, to access from
$this to renderPartial() we will use the context member, which
represents the Controller object in the View object. -->
<?php echo $this->context->renderPartial('_copyright'); ?>

<h2>News Item Detail<h2>
<br />
Title: <b><?php echo $item['title'] ?></b>
<br />
Date: <b><?php echo $item['date'] ?></b>