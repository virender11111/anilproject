<?php
//pr($this->params); die;
$this->Html->addCrumb(ucfirst($title_for_layout), array('action' => 'index'));
$this->extend('/Common/admin_index');
$this->assign('title', $title_for_layout);
//$tableHeaders[] = $this->Form->checkbox($modelClass . '.id.', array('class' => 'group-checkable', 'data-set' => "#psdata_table .checkboxes", 'hiddenField' => false));
$tableHeaders[] = $this->Paginator->sort(__('id'), '#');
$tableHeaders[] = $this->Paginator->sort(__('name'));
$tableHeaders[] = $this->Paginator->sort(__('email'));
$tableHeaders[] = $this->Paginator->sort(__('job_category_id'),'Category');
$tableHeaders[] = $this->Paginator->sort(__('phone'));
//$tableHeaders[] = $this->Paginator->sort(__('comments'));
//$tableHeaders[] = $this->Paginator->sort(__('request'));
//$tableHeaders[] = $this->Paginator->sort(__('newsletter'));
$tableHeaders[] = $this->Paginator->sort(__('cv_upload'),'CV');


$tableHeaders[] = array($this->Paginator->sort(__('created'), 'Added Date') => array('class'=>'date-class text-center'));
$tableHeaders[] = array('Actions'=>array('class'=>'action-btn-2 text-center'));

$this->append('table_head', $this->Html->tableHeaders($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));

/* __________ Filter ___________ */
$tableHeaders = array();
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Form->input($modelClass . '.job_category_id', array('label' => false, 'class' => 'form-control form-filter input-sm', 'div' => false, 'options' => array('1' => 'General Enquiry', '2' => 'Clinical Enquiry', '3' => 'Buzzz Enquiry', '4' => 'Care & Support', '5' => 'Supported Employment', '6' => 'Other Positions'), 'empty' => 'Select...'));
$tableHeaders[] = '';
//$tableHeaders[] = '';
//$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = '';
$tableHeaders[] = $this->Html->tag('div', $this->Form->button('<i class="fa fa-search"></i>', array('escape' => false, 'class' => 'btn btn-xs yellow filter-submit margin-bottom tooltips', 'title' => 'Search')) . '' . $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'index', '?' => array('flag' => 'true')), array('class' => 'btn btn-xs red filter-cancel tooltips', 'title' => 'Reset', 'escape' => false)), array('class' => 'margin-bottom-5 text-center'));
$this->append('table_head', $this->Html->tableCells($tableHeaders, array('class' => 'heading'), array('class' => 'sorting')));
/* __________ Filter ___________ */


// $this->append('form-start', $this->Form->create($modelClass, array(
//             'url'=>array('action'=>'process'),
//             'class' => 'form-horizontal',
//             'novalidate' => true,
            
// )));
$this->append('form-start', $this->Form->create($modelClass, array(
        'type' => 'post',
        'url' => array('action' => 'index'),
        'action-url' => $this->Html->url(array('action' => 'process')),
        'class' => 'form-horizontal list_data_form',
        'novalidate' => true,
)));

/*$addBtn = $this->Html->link('<i class="fa fa-plus"></i> <span class="hidden-480">New Page</span>', array('action' => 'add'), array('class' => 'btn default green-haze-stripe', 'escape' => false));
$this->assign('btn', $addBtn);*/

$rows = array();
$full_path = Router::url( "/", true ). DS . 'app/webroot/files' . DS.'job/cv_upload';
//pr($listAll);die;
foreach ($listAll as $listOne) {
    $row = array();
    //$row[] = array($this->Form->checkbox($modelClass . '.id.', array('class' => 'checkboxes', 'value' => $listOne[$modelClass]['id'], 'hiddenField' => false)),array('class'=>'width3'));
    $row[] = array($listOne[$modelClass]['id'],array('class'=>'width5'));
    $row[] = $listOne[$modelClass]['name'];
    $row[] = $listOne[$modelClass]['email'];
    $row[] = $listOne['JobCategory']['name'];
    $row[] = $listOne[$modelClass]['phone'];
    //$row[] = $listOne[$modelClass]['comments'];
    //$row[] = array($this->Admin->status($listOne[$modelClass]['request']), array('class'=>'text-center'));
    //$row[] = array($this->Admin->status($listOne[$modelClass]['newsletter']), array('class'=>'text-center'));
    if(!empty($listOne[$modelClass]['cv_upload'])) {
        $row[] = $this->Html->link(__('<i class="fa fa-file"></i>'), $full_path.'/'.$listOne[$modelClass]['id'].'/'.$listOne[$modelClass]['cv_upload'],array('class' => 'text-center btn btn-xs tooltips','data-placement'=>"top", 'data-original-title'=>"Download", 'title' => 'View', 'target' => '_blank',  'escape' => false));
    } else {
        $row[] = "";
    }

    //$row[] = $this->Html->link('Download', array('action' => '_downloadCV', $listOne[$modelClass]['id']));
    
    $row[] = array($this->Layout->date($listOne[$modelClass]['created']), array('class'=>'text-center'));

    $links = $this->Html->link(__('<i class="fa fa-edit"></i>'), array('action' => 'edit', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs green tooltips','data-placement'=>"top", 'data-original-title'=>"Edit", 'title' => 'Edit',  'escape' => false));
    $links .= $this->Html->link(__('<i class="fa fa-times"></i>'), array('action' => 'delete', $listOne[$modelClass]['id']), array('class' => 'btn btn-xs red delete_btn tooltips','data-placement'=>"top", 'data-original-title'=>"Delete", 'title' => 'Delete', 'escape' => false,'data-msg'=>__('Are you sure you want to this ? ')));
    $row[] = array($links, array('class'=>'text-center'));
    $rows[] = $row;
}
$this->append('table_row', $this->Html->tableCells($rows));


echo $this->start("footer_js"); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php if(empty($this->params["named"]["limit"])) { ?>
            $("#JobLimit").val(100); <?php
        } ?>
    })
</script>
<?php echo $this->end(); ?>







