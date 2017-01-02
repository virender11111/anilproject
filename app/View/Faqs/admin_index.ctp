<?php //pr($faqs); die;
$this->Html->addCrumb(ucfirst($title_for_layout), array('action' => 'index'));
$this->extend('/Common/admin_index');
$this->assign('title', $title_for_layout);
$tableHeaders[] = $this->Paginator->sort(__('id'), 'ID');
$tableHeaders[] = $this->Paginator->sort(__('question'));
$tableHeaders[] = $this->Paginator->sort(__('description'));
$tableHeaders[] = $this->Paginator->sort(__('page'));
$tableHeaders[] = array($this->Paginator->sort(__('status')) => array('class' => 'action_class status_class text-center'));
$tableHeaders[] = array('Actions' => array('class' => 'action-btn-2 text-center'));

$this->append('table_head', $this->Html->tableHeaders($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));

/* __________ Filter ___________ */
$tableHeaders = array();
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Form->input($modelClass . '.page_id', array('label' => false, 'class' => 'form-control form-filter input-sm', 'div' => false, 'options' => $all_pages, 'empty' => 'Select...'));
$tableHeaders[] = '';
$tableHeaders[] = $this->Html->tag('div', $this->Form->button('<i class="fa fa-search"></i>', array('escape' => false, 'class' => 'btn btn-xs yellow filter-submit margin-bottom tooltips', 'title' => 'Search')) . '' . $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'index', '?' => array('flag' => 'true')), array('class' => 'btn btn-xs red filter-cancel tooltips', 'title' => 'Reset', 'escape' => false)), array('class' => 'margin-bottom-5 text-center'));
$this->append('table_head', $this->Html->tableCells($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));
/* __________ Filter ___________ */

$this->append('form-start', $this->Form->create($modelClass, array(
        'type' => 'post',
        'url' => array('action' => 'index'),
        'action-url' => $this->Html->url(array('action' => 'process')),
        'class' => 'form-horizontal list_data_form',
        'novalidate' => true,
)));

/*$this->append('form-start', $this->Form->create($modelClass, array(
            'url' => array('action' => 'process'),
            'class' => 'form-horizontal',
            'novalidate' => true,
)));*/


$addBtn = $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">Add New </span>', array('action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));
$this->assign('btn', $addBtn);

$rows = array();
foreach ($faqs as $listOne) {
    $row = array();
    $row[] = $listOne[$modelClass]['id'];
    $row[] = $listOne[$modelClass]['question'];
    $qDesc = strip_tags($listOne[$modelClass]['description'], '<p>');
    //$queDesc = $this->Text->truncate($listOne[$modelClass]['description'],22,array());
    $row[] = $this->Text->truncate($qDesc,90,array());
    $row[] = $listOne['Page']['title'];
    $row[] = array($this->Admin->status($listOne[$modelClass]['status']), array('class'=>'text-center'));
    $links = $this->Html->link(__('<i class="fa fa-edit"></i>'), array('action' => 'edit', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips', 'data-placement' => "top", 'data-original-title' => "Edit", 'title' => 'Edit', 'escape' => false));
    $links .= $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'delete', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs red delete_btn tooltips', 'data-placement' => "top", 'data-original-title' => "Delete", 'title' => 'Delete', 'escape' => false, 'data-msg' => __('Are you sure you want to this ? ')));
    $row[] = array($links, array('class' => 'text-center'));
    $rows[] = $row;
}
$this->append('table_row', $this->Html->tableCells($rows));
?>
