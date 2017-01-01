<?php

$this->Html->addCrumb(ucfirst($title_for_layout), array('action' => 'index'));
$this->extend('/Common/admin_index');
$this->assign('title', $title_for_layout);
$tableHeaders[] = $this->Paginator->sort(__('id'), 'ID');
$tableHeaders[] = $this->Paginator->sort(__('title'), 'Name');
$tableHeaders[] = $this->Paginator->sort(__('subject'), 'Subject');
$tableHeaders[] = $this->Paginator->sort(__('from'), 'From');
$tableHeaders[] = array($this->Paginator->sort(__('created'), 'Added Date') => array('class' => 'date-class text-center'));
$tableHeaders[] = array('Actions' => array('class' => 'action-btn-2 text-center'));

$this->append('table_head', $this->Html->tableHeaders($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));
$this->append('form-start', $this->Form->create($modelClass, array(
            'url' => array('action' => 'process'),
            'class' => 'form-horizontal',
            'novalidate' => true,
)));


$addBtn = $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">Add New </span>', array('action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));
$this->assign('btn', $addBtn);

$rows = array();
foreach ($data as $listOne) {
    $row = array();
    $row[] = $listOne[$modelClass]['id'];
    $row[] = $listOne[$modelClass]['title'];
    $row[] = $listOne[$modelClass]['subject'];
    $row[] = $listOne[$modelClass]['from'];
    $row[] = array($this->Layout->date($listOne[$modelClass]['created']), array('class' => 'text-center'));

    $links = $this->Html->link(__('<i class="fa fa-edit"></i>'), array('action' => 'edit', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips', 'data-placement' => "top", 'data-original-title' => "Delete", 'title' => 'Edit', 'escape' => false));
    $links .= $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'delete', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs red delete_btn tooltips', 'data-placement' => "top", 'data-original-title' => "Delete", 'title' => 'Delete', 'escape' => false, 'data-msg' => __('Are you sure you want to do this ? ')));
    $row[] = array($links, array('class' => 'text-center'));
    $rows[] = $row;
}
$this->append('table_row', $this->Html->tableCells($rows));





