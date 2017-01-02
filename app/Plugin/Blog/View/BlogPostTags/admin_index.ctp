<?php
$this->Html->addCrumb(ucfirst($controller), array('action' => 'index'));
$this->extend('/Common/admin_index');
$this->assign('title', $title_for_layout);
//$tableHeaders[] = $this->Form->checkbox($modelClass . '.id.', array('class' => 'group-checkable', 'data-set' => "#psdata_table .checkboxes", 'hiddenField' => false));
$tableHeaders[] = $this->Paginator->sort(__('id'), '#');
$tableHeaders[] = $this->Paginator->sort(__('name'));
$tableHeaders[] = $this->Paginator->sort(__('slug'));
$tableHeaders[] = $this->Paginator->sort(__('blog_post_count'));

$tableHeaders[] = array($this->Paginator->sort(__('created'), 'Add Date') => array('class'=>'date-class text-center'));
$tableHeaders[] = array('Actions'=>array('class'=>'action-btn-2 text-center'));

$this->append('table_head', $this->Html->tableHeaders($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));

$this->append('form-start', $this->Form->create($modelClass, array(
            'url'=>array('action'=>'process'),
            'class' => 'form-horizontal',
            'novalidate' => true,
            
)));

$addBtn = $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">New Post Tag</span>', array('action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));
$this->assign('btn', $addBtn);

$rows = array();

foreach ($listAll as $listOne) {
    $row = array();
    
    $row[] = array($listOne[$modelClass]['id'],array('class'=>'width5'));
    $row[] = $listOne[$modelClass]['name'];
    $row[] = $listOne[$modelClass]['slug'];
    $row[] = $listOne[$modelClass]['blog_post_count'];
   
    $row[] = array($this->Layout->date($listOne[$modelClass]['created']), array('class'=>'text-center'));
   // $links = $this->Html->link(__('<i class="fa fa-pencil"></i>'), array('action' => 'view', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips','data-placement'=>"top", 'data-original-title'=>"View", 'title' => 'View',  'escape' => false));
    $links = $this->Html->link(__('<i class="fa fa-edit"></i>'), array('action' => 'edit', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips','data-placement'=>"top", 'data-original-title'=>"Edit", 'title' => 'Edit',  'escape' => false));
    $links .= $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'delete', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs red delete_btn tooltips','data-placement'=>"top", 'data-original-title'=>"Delete", 'title' => 'Delete', 'escape' => false,'data-msg'=>__('Are you sure you want to this ? ')));
    $row[] = array($links, array('class'=>'text-center'));
    $rows[] = $row;
}
$this->append('table_row', $this->Html->tableCells($rows));
