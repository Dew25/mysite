<?php
function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}

function list_action()
{
	$rows=get_all_rows();
	$html=render_template("view/list.php",array('rows'=>$rows));
	return $html;
}

function admin_action()
{
	$rows=get_all_rows();
	$html=render_template("view/admin.php",array('rows'=>$rows));
	return $html;
}
function add_action()
{
	add_row();
	$rows=get_all_rows();
	$html=render_template("view/admin.php",array('rows'=>$rows));
	return $html;
}
function show_action($id)
{
	$row=get_row($id);
	$html=render_template("view/show.php",array('row'=>$row));
	return $html;
}
function delete_action($id)
{
	$row=delete_row($id);
	$rows=get_all_rows();
	$html=render_template("view/admin.php",array('rows'=>$rows));
	return $html;
}
function edit_action($id)
{
	$row=get_row($id);
	$rows=get_all_rows();
	$html=render_template("view/edit.php",array('row'=>$row,
												'rows'=>$rows));
	return $html;
}
function update_action()
{
	update_row();
	$rows=get_all_rows();
	$html=render_template("view/admin.php",array('rows'=>$rows));
	return $html;
}

