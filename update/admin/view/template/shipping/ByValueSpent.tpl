<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>

    <div class="box">
        <div class="heading">
            <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
            <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
        </div>
        <div style="height:50px;border-left:1px solid #cccccc;border-right: 1px solid #cccccc; border-bottom:1px dotted #cccccc;padding: 5px;">
            <span> Any Problem, please get in touch!.  My Name is Rodrigo Manara and my emails is me@rodrigomanara.co.uk</span>
        </div>
        <div class="content">
            <div style="display: block;text-align: left;font-size: 10pt;width: 80%; padding: 10px;color: #ff6666;font-weight: bold;"> <?php echo $text_help;?></div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <div style="float: left">
                    <table>
                        <tr>
                            <td> Rules 1</td>
                            <td>  
                                <table>
                                    <tr>
                                        <td><b><?php echo $text_header_rule_1 ;?> </b></td>
                                    </tr>
                                    <tr>
                                        <td><input name="ByValueSpent_rule_1" value="<?php echo $ByValueSpent_rule_1; ?>" style="width:300px;"/></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td> Rules 2</td>
                            <td> 

                                <table>
                                    <tr>
                                         <td><b><?php echo $text_header_rule_2 ;?> </b></td>
                                    </tr>
                                    <tr>
                                        <td><input name="ByValueSpent_rule_2" value="<?php echo $ByValueSpent_rule_2; ?>" style="width:300px;"/></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td> Rules 3</td>
                            <td> 
                                <table>
                                    <tr> <td><b><?php echo $text_header_rule_3 ;?> </b></td></tr>
                                    <tr>
                                        <td><input name="ByValueSpent_rule_3" value="<?php echo $ByValueSpent_rule_3; ?>" style="width:300px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td> Rules 4</td>
                            <td> 

                                <table>
                                    <tr> <td><b><?php echo $text_header_rule_4 ;?> </b></td></tr>
                                    <tr>
                                        <td><input name="ByValueSpent_rule_4" value="<?php echo $ByValueSpent_rule_4; ?>" style="width:300px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td> Rules 5</td>
                            <td> 

                                <table>
                                    <tr> <td><b><?php echo $text_header_rule_5 ;?> </b></td></tr>
                                    <tr>
                                        <td><input name="ByValueSpent_rule_5" value="<?php echo $ByValueSpent_rule_5; ?>" style="width:300px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </div>
                <div style="float: left; margin-left:15px;padding-left: 5px;border-left: 1px dotted #cccccc;">
                    <table>
                        <tr>
                            <td><?php echo $entry_tax_class; ?></td>
                            <td><select name="ByValueSpent_tax_class_id">
                                    <option value="0"><?php echo $text_none; ?></option>
                                    <?php   foreach ($tax_classes as $tax_class) { ?>
                                    <?php if ($tax_class['tax_class_id'] == $ByValueSpent_tax_class_id) { ?>
                                    <option value="<?php echo $tax_class['tax_class_id']; ?>" selected="selected"><?php echo $tax_class['title']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $tax_class['tax_class_id']; ?>"><?php echo $tax_class['title']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_geo_zone; ?></td>
                            <td><select name="ByValueSpent_geo_zone_id">
                                    <option value="0"><?php echo $text_all_zones; ?></option>
                                    <?php foreach ($geo_zones as $geo_zone) { ?>
                                    <?php if ($geo_zone['geo_zone_id'] == $ByValueSpent_geo_zone_id) { ?>
                                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_status; ?></td>
                            <td><select name="ByValueSpent_status">
                                    <?php if ($ByValueSpent_status) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_sort_order; ?></td>
                            <td><input type="text" name="ByValueSpent_sort_order" value="<?php echo $ByValueSpent_sort_order; ?>" size="1" /></td>
                        </tr>
                    </table>
                </div>
            </form>    

        </div>  
    </div>
    <script type="text/javascript"><!--
   $('.vtabs a').tabs();
        //--></script> 
    <?php echo $footer; ?> 