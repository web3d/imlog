<?php
/* @var $this CategoryController */

$this->breadcrumbs=array(
	'Category',
);
?>
<h1>分类管理</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
    'enableSorting' => false,
    'summaryText' => '共{count}项, {page} / {pages}',
	'columns'=>array(
		array(
			'name'=>'sid',
			'type'=>'raw',
			'value'=>'$data->sid',
            'htmlOptions'=> array('width'=>'30px')
		),
        array(
			'name'=>'sortname',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->sortname), $data->sortname)'
		),
		array(
			'name'=>'alias',
			'value'=>'$data->alias',
			
		),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<div class=line></div>
<form  method="post" action="sort.php?action=taxis">
  <table width="100%" id="adm_sort_list" class="item_list">
    <thead>
      <tr>
        <th width="55"><b>序号</b></th>
        <th width="300"><b>名称</b></th>
		<th width="300"><b>别名</b></th>
        <th width="50" class="tdcenter"><b>日志</b></th>
        <th width="100"></th>
      </tr>
    </thead>
    
</table>
<div class="list_footer"><input type="submit" value="改变排序" class="submit" /></div>
</form>
<form action="sort.php?action=add" method="post">
<div style="margin:30px 0px 10px 0px;"><a href="javascript:displayToggle('sort_new', 2);">添加新分类+</a></div>
<div id="sort_new">
	<li><input maxlength="4" style="width:30px;" name="taxis" /> 序号</li>
	<li><input maxlength="200" style="width:200px;" name="sortname" id="sortname" /> 名称</li>
	<li><input maxlength="200" style="width:200px;" name="alias" id="alias" /> 别名 (用于URL的友好显示)</li>
	<li><input type="submit" id="addsort" value="添加新分类" class="submit"/><span id="alias_msg_hook"></span></li>
</div>
</form>
<script>
$("#sort_new").css('display', $.cookie('em_sort_new') ? $.cookie('em_sort_new') : 'none');
$("#alias").keyup(function(){checksortalias();});
function issortalias(a){
	var reg1=/^[\w-]*$/;
	var reg2=/^[\d]+$/;
	if(!reg1.test(a)) {
		return 1;
	}else if(reg2.test(a)){
		return 2;
	}else if(a=='post' || a=='record' || a=='sort' || a=='tag' || a=='author' || a=='page'){
		return 3;
	} else {
		return 0;
	}
}
function checksortalias(){
	var a = $.trim($("#alias").val());
	if (1 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，应由字母、数字、下划线、短横线组成</span>');
	}else if (2 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，不能为纯数字</span>');
	}else if (3 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，与系统链接冲突</span>');
	}else {
		$("#alias_msg_hook").html('');
		$("#msg").html('');
		$("#addsort").attr("disabled", false);
	}
}
$(document).ready(function(){
	$("#adm_sort_list tbody tr:odd").addClass("tralt_b");
	$("#adm_sort_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")});
	$(".sortname").click(function a(){
		if($(this).find(".sort_input").attr("type") == "text"){return false;}
		var name = $.trim($(this).html());
		var m = $.trim($(this).text());
		$(this).html("<input type=text value=\""+name+"\" class=sort_input>");
		$(this).find(".sort_input").focus();
		$(this).find(".sort_input").bind("blur", function(){
			var n = $.trim($(this).val());
			if(n != m && n != ""){
				window.location = "sort.php?action=update&sid="+$(this).parent().parent().find(".sort_id").val()+"&name="+encodeURIComponent(n);
			}else{
				$(this).parent().html(name);
			}
		});
	});
	$(".alias").click(function b(){
		if($(this).find(".alias_input").attr("type") == "text"){return false;}
		var name = $.trim($(this).html());
		var m = $.trim($(this).text());
		$(this).html("<input type=text value=\""+name+"\" class=alias_input>");
		$(this).find(".alias_input").focus();
		$(this).find(".alias_input").bind("blur", function(){
			var n = $.trim($(this).val());
			if(n != m){
				window.location = "sort.php?action=update&sid="+$(this).parent().parent().find(".sort_id").val()+"&alias="+encodeURIComponent(n);
			}else{
				$(this).parent().html(name);
			}
		});
	});
	$("#menu_sort").addClass('sidebarsubmenu1');
});
</script>