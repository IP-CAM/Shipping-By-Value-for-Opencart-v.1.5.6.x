<?php

class ControllerShippingByValueSpent extends Controller {

    private $error = array();

    public function index() {

        $this->language->load('shipping/ByValueSpent');
        $this->document->setTitle($this->language->get('heading_title'));


        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('ByValueSpent', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
        }

        if (isset($this->request->post['ByValueSpent_sort_order'])) {
            $this->data['ByValueSpent_sort_order'] = $this->request->post['ByValueSpent_sort_order'];
        } else {
            $this->data['ByValueSpent_sort_order'] = $this->config->get('ByValueSpent_sort_order');
        }



        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');


        /*****default form get values*/
        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');
        $this->data['text_none'] = $this->language->get('text_none');
        
        /*****Default to any function*/
        $this->data['entry_cost'] = $this->language->get('entry_cost');
        $this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
        $this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

        /*****helo*/
        $this->data['text_help'] = $this->language->get('text_help');
        
         /*****Title form*/
        $this->data['text_header_rule_1'] = $this->language->get('text_header_rule_1');
        $this->data['text_header_rule_2'] = $this->language->get('text_header_rule_2');
        $this->data['text_header_rule_3'] = $this->language->get('text_header_rule_3');
        $this->data['text_header_rule_4'] = $this->language->get('text_header_rule_4');
        $this->data['text_header_rule_5'] = $this->language->get('text_header_rule_5');

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_shipping'),
            'href' => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('shipping/ByValueSpent', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['action'] = $this->url->link('shipping/ByValueSpent', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');


        if (isset($this->request->post['ByValueSpent_tax_class_id'])) {
            $this->data['ByValueSpent_tax_class_id'] = $this->request->post['ByValueSpent_tax_class_id'];
        } else {
            $this->data['ByValueSpent_tax_class_id'] = $this->config->get('ByValueSpent_tax_class_id');
        }

        //rule 1
        if (isset($this->request->post['ByValueSpent_rule_1'])) {
            $this->data['ByValueSpent_rule_1'] = $this->request->post['ByValueSpent_rule_1'];
        } else {
            $this->data['ByValueSpent_rule_1'] = $this->config->get('ByValueSpent_rule_1');
        }

        //rule 2
        if (isset($this->request->post['ByValueSpent_rule_2'])) {
            $this->data['ByValueSpent_rule_2'] = $this->request->post['ByValueSpent_rule_2'];
        } else {
            $this->data['ByValueSpent_rule_2'] = $this->config->get('ByValueSpent_rule_2');
        }
        //rule 3
        if (isset($this->request->post['ByValueSpent_rule_3'])) {
            $this->data['ByValueSpent_rule_3'] = $this->request->post['ByValueSpent_rule_3'];
        } else {
            $this->data['ByValueSpent_rule_3'] = $this->config->get('ByValueSpent_rule_3');
        }
        //rule 4
        if (isset($this->request->post['ByValueSpent_rule_4'])) {
            $this->data['ByValueSpent_rule_4'] = $this->request->post['ByValueSpent_rule_4'];
        } else {
            $this->data['ByValueSpent_rule_4'] = $this->config->get('ByValueSpent_rule_4');
        }
        // rule 5
        if (isset($this->request->post['ByValueSpent_rule_5'])) {
            $this->data['ByValueSpent_rule_5'] = $this->request->post['ByValueSpent_rule_5'];
        } else {
            $this->data['ByValueSpent_rule_5'] = $this->config->get('ByValueSpent_rule_5');
        }



        if (isset($this->request->post['ByValueSpent_status'])) {
            $this->data['ByValueSpent_status'] = $this->request->post['ByValueSpent_status'];
        } else {
            $this->data['ByValueSpent_status'] = $this->config->get('ByValueSpent_status');
        }

        $this->load->model('localisation/tax_class');
        $this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

        $this->load->model('localisation/geo_zone');
        $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        $this->template = 'shipping/ByValueSpent.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'shipping/ByValueSpent')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

}

?>