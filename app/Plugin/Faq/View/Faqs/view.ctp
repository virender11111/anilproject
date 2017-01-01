<?php 
$chkCand = $this->Session->check('Auth.front.Candidate.id');
$chkEmp = $this->Session->check('Auth.front.Employer.id');
?>
<div class="container">
    <div class="page-container">
      <div class="col-md-12 offset-padding-none">
        <div class="reg-page">
          <div class="row">
            
           <?php  
			 if($chkCand==1)
			 { echo $this->element('front/candidate/sidebar'); }
			 else if($chkEmp==1)
			  { echo $this->element('front/employer/sidebar'); }
			  ?>
            
            <div class="<?php if($chkCand==1 || $chkEmp==1 ) { echo 'col-md-9'; } else {echo 'col-md-12'; } ?>" >
              <div class="innergray"><span class="title-col title-col2 margin-bot-15">faq<span style="text-transform:lowercase !important;">s</span> </span>
                <div class="row">
                  <div class="pageContent">
                    <ul class="accordion_ul">
                    <?php  foreach($data as $data) {  ?>
                      <li> <a class="accordion_a"><?php echo $data['Faq']['question']; ?></a>
                        <div><?php echo $data['Faq']['description']; ?>
                        <?php /*?>  <div class="d">cdcccccc <a href="#"><?php echo $data['Faq']['question']; ?></a> </div><?php */?>
                        </div>
                      </li>
                      <?php } ?>
                      
                     
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>