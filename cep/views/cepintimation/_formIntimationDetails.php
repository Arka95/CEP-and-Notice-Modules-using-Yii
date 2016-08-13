<font color="black" size="2"><center>Government of India<br>
    Department of Atomic Energy<br>
    Variable Energy Cyclotron Centre<br>
    <u>1/AF, Bidhan Nagar , Kolkata 700064</u><br>
    <u>REQUEST FOR CASUAL ENTRY PERMIT</u><br></center>
    <p align="left">Reference Number : <?php echo "VECC/CEP/$modelIntimation->CI_ID";?></p></font>

<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="3"><font size="4" color="white">[A] <u>Visitor Details :</u></font></td></tr>
    <tr style="background-color: #c3e7fd; height: 13px;">
<td style="width: 277px; height: 13px;">Name</td>
<td style="width: 203.3px; height: 13px;">Gender</td>
<td style="width: 267.7px; height: 13px;">Occupation</td>
</tr>
    <?php foreach($modelVisitors as $visitor) : ?>
<tr style="height: 13px;">
<td style="width: 277px; height: 13px;"><?php echo $visitor->CV_NAME; ?></td>
<td style="width: 203.3px; height: 13px;"><?php echo $visitor->CV_GENDER; ?></td>
<td style="width: 267.7px; height: 13px;"><?php echo $visitor->CV_OCCUPATION; ?></td>
</tr>
  
<?php endforeach;?>
    
</tbody>
</table>

<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="3"><font size="4" color="white">[B] <u>Name and Address of the Firm/Institution/Organization :</u></font></td></tr>
<tr>
<td style="width: 432.617px;">Firm Name: <?php echo $modelFirm->CF_NAME;?></td>
</tr>
</tbody>
</table>
<table style="width: 100%;" class="visitor" border="1">
<tbody>
<tr>
<td style="width: 235.333px;">Country:<?php echo $modelFirm->CF_COUNTRY;?></td>
<td style="width: 235.333px;">State:<?php echo $modelFirm->CF_STATE;?></td>
<td style="width: 235.333px;">City:<?php echo $modelFirm->CF_CITY;?></td>
</tr>
</tbody>
</table>
<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="3"><font size="4" color="white">[C]<u> Type of Firm/Institution/Organization :</u></font></td></tr>
<tr>
<td style="width: 279.383px;"><?php echo $modelFirm->CF_TYPE;?></td>
</tr>
</tbody>
</table>

<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="3"><font size="4" color="white">[D] <u>Purpose of Visit :</u></font> </td></tr>
    <tr>
<td style="width: 235.333px;"><?php echo $modelIntimation->CI_PURPOSE;?> </td>
</tr>
</tbody>
</table>
<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="3"><font size="4" color="white">[E] <u>Period of Visit :</u></font></td></tr>
    <tr>
<td style="width: 235.333px;">From: <?php echo $modelIntimation->CI_VST_EXPECTED_ENTRY_DATE;?></td>
<td style="width: 235.333px;">To: <?php echo $modelIntimation->CI_VST_EXPECTED_EXIT_DATE;?></td>
</tr>
</tbody>
</table>
<table style="width: 100%;" class="visitor" border="1">
<tbody>
    <tr class="any"><td colspan="5"><font size="4" color="white">[E] <u>Particulars of Officer(s) to be Visited :</u></font></td></tr>
<tr>
<td style="width: 234.667px;">Name</td>
<td style="width: 234.667px;">Designation</td>
<td style="width: 234.667px;">CCNO</td>
<td style="width: 235px;">Extn. No.</td>
<td style="width: 235px;">Place of Visit</td>
</tr>
<?php foreach ($modelOfficers as $officer) :?>
<tr>
<td style="width: 234.667px;"><?php echo  $officer->CO_NAME;?></td>
<td style="width: 234.667px;"><?php echo  $officer->CO_DESIGNATION;?></td>
<td style="width: 234.667px;"><?php echo  $officer->CO_PERID;?></td>
<td style="width: 234.667px;"><?php echo $officer->CO_EXTN;?></td>
<td style="width: 234.667px;"></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<table style="width: 100%;" class="visitor" border="1">
<tbody>
<tr>

<td style="width: 235px;">To be approved by: <?php echo  $modelIntimation->CI_AUTH_BY_NAME."($modelIntimation->CI_AUTH_BY), $modelIntimation->CI_AUTH_BY_DESIGNATION";?></td>
<td style="width: 235px;">Intimation Date: <?php echo  $modelIntimation->CI_INTIMATION_DATE;?></td>
</tr>
</tbody>
</table>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cepintimation-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' =>'Submit',
        'htmlOptions'   => array('name'=> 'submitCEP'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
<style>
    .visitor{background-color:#cacfd2 ; border:1px;border-color:#07792c  ;color:#000000}
     .visitor_details{background-color:#c2e8ec;width:100%}
     .auth_details{background-color:#eddfb3;width:100%}
     .other_details{background-color:#ddee4a;width:100%}
     .any{background-color:#3498db;width:100%}
    </style>
