<?php

$this->Html->addCrumb(ucfirst($title_for_layout), array('action' => 'index'));
$this->extend('/Common/admin_index');
$this->assign('title', $title_for_layout);
$tableHeaders[] = $this->Form->checkbox($modelClass . '.id.', array('class' => 'group-checkable', 'data-set' => "#psdata_table .checkboxes", 'hiddenField' => false));
$tableHeaders[] = $this->Paginator->sort(__('id'), 'ID');
$tableHeaders[] = $this->Paginator->sort(__('category_id'),'Category Name');
$tableHeaders[] = $this->Paginator->sort(__('name'),'Name');
$tableHeaders[] = $this->Paginator->sort(__('url'),'url');
$tableHeaders[] = $this->Paginator->sort(__('image'),'Image');

$tableHeaders[] = array($this->Paginator->sort(__('status')) => array('class' => 'status_class text-center'));
$tableHeaders[] = array($this->Paginator->sort(__('created'), 'Created') => array('class' => 'date-class text-center'));
$tableHeaders[] = array($this->Paginator->sort(__('modified'), 'Updated') => array('class' => 'date-class text-center'));
$tableHeaders[] = array('Actions' => array('class' => 'action-btn-2 text-center'));

$this->append('table_head', $this->Html->tableHeaders($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));
$tableHeaders = array();

$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Form->input($modelClass.'.category', array('label' => false, 'class' => 'form-control form-filter input-sm', 'div' => false));
$tableHeaders[] = $this->Form->input($modelClass.'.name', array('label' => false, 'class' => 'form-control form-filter input-sm', 'div' => false));
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Form->input($modelClass.'.status', array('label' => false, 'class' => 'form-control form-filter input-sm', 'div' => false, 'options' => array('active' => 'Active', 'deactive' => 'Deactive'), 'empty' => 'Select...'));
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Html->tag('div',$this->Form->button('<i class="fa fa-search"></i>', array('escape' => false, 'class' => 'btn btn-xs yellow filter-submit margin-bottom tooltips', 'title' => 'Search')).''.$this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'index','?'=>array('flag'=>'true')), array('class' => 'btn btn-xs red filter-cancel tooltips','title' => 'Reset', 'escape' => false)),array('class'=>'margin-bottom-5 text-center'));
$this->append('table_head', $this->Html->tableCells($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));
$this->append('form-start', $this->Form->create($modelClass, array(
            'type' => 'post',
            'url' => array('action' => 'index'),
            'action-url' => $this->Html->url(array('action' => 'process')),
            'class' => 'form-horizontal list_data_form',
            'novalidate' => true,
)));


$addBtn = $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">Add New </span>', array('action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));
$this->assign('btn', $addBtn);

$rows = array();
if (!empty($data)) {
    foreach ($data as $key => $listOne) {
        $row = array();
        $row[] = $this->Form->checkbox($modelClass . '.id.'.$key, array('class' => 'checkboxes', 'value' => $listOne[$modelClass]['id'], 'hiddenField' => false));
        $row[] = $listOne[$modelClass]['id'];
        $row[] = $listOne['Category']['name'];
        $row[] = $listOne[$modelClass]['name'];
        $row[] = $listOne[$modelClass]['url'];
        $row[] = $this->Html->image('/files/sitelink/image/'.$listOne[$modelClass]['id'].'/'.$listOne[$modelClass]['image'],array('width'=>'100px'));
        $row[] = array($this->Admin->status($listOne[$modelClass]['status']), array('class' => 'text-center'));
        $row[] = array($this->Layout->date($listOne[$modelClass]['created']), array('class' => 'text-center'));
        $row[] = array($this->Layout->date($listOne[$modelClass]['modified']), array('class' => 'text-center'));
        $links = $this->Html->link(__('<i class="fa fa-edit"></i>'), array('action' => 'edit', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips', 'data-placement' => "top", 'data-original-title' => "Delete", 'title' => 'Edit', 'escape' => false));
        //$links .= $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'delete', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs red delete_btn tooltips', 'data-placement' => "top", 'data-original-title' => "Delete", 'title' => 'Delete', 'escape' => false, 'data-msg' => __('Are you sure you want to delete this ? ')));


        $row[] = array($links, array('class' => 'text-center'));
        $rows[] = $row;
    }
} else {
    $row = '<td colspan = 7 align="center">No Record Available</td>';
    $rows[] = $row;
}
$this->append('table_row', $this->Html->tableCells($rows));

$this->append('table_actions', $this->Form->input('action', array(
            'options' => array('active' => 'Activate', 'inactive' => 'Deactivate'),
            'class' => 'table-group-action-input form-control input-inline input-small input-sm',
            'label' => false,
            'empty' => 'Select an action',
            'div' => false
                )
));



