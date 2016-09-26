<?php

class ModelShippingByValueSpent extends Model {

    function getQuote($address) {
        $this->language->load('shipping/ByValueSpent');

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int) $this->config->get('ByValueSpent_geo_zone_id') . "' AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')");
        if (!$this->config->get('ByValueSpent_geo_zone_id')) {
            $status = true;
        } elseif ($query->num_rows) {
            $status = true;
        } else {
            $status = false;
        }


        $quote_data = array();
        $method_data = array();

        if ($status) {

            $subtotal = $this->cart->getSubTotal();

            /*             * *** rules ***** */
            $rule = array();
            $rule[] = $this->config->get('ByValueSpent_rule_1');
            $rule[] = $this->config->get('ByValueSpent_rule_2');
            $rule[] = $this->config->get('ByValueSpent_rule_3');
            $rule[] = $this->config->get('ByValueSpent_rule_4');
            $rule[] = $this->config->get('ByValueSpent_rule_5');


            for ($i = 0; $i < count($rule); $i++) {
                if (!empty($rule[$i]) or strlen($rule[$i]) > 1) {
                    //0.01-9.99:5_Secound Class
                    $string = explode(":", $rule[$i]);
                    $value = explode("-", $string[0]);
                    $string_2 = explode("_", $string[1]);
                    $fee = isset($string_2[0]) ? $string_2[0] : false;
                    $title = isset($string_2[1]) ? $string_2[1] : false;


                    if ($fee !== false or $title !== false) {
                        if ($subtotal >= $value[0] && (int) $value[1] === 0) {
                            $quote_data['rule_' . $i] = array(
                                'code' => 'ByValueSpent.rule_' . $i,
                                'title' => $this->language->get('text_description') . " " . $title,
                                'cost' => $fee,
                                'tax_class_id' => $this->config->get('ByValueSpent_tax_class_id'),
                                'text' => $this->currency->format($this->tax->calculate($fee, $this->config->get('ByValueSpent_tax_class_id'), $this->config->get('config_tax')))
                            );
                        } elseif ($subtotal >= $value[0] && $subtotal <= $value[1]) {
                            $quote_data['rule_' . $i] = array(
                                'code' => 'ByValueSpent.rule_' . $i,
                                'title' => $this->language->get('text_description') . " " . $title,
                                'cost' => $fee,
                                'tax_class_id' => $this->config->get('ByValueSpent_tax_class_id'),
                                'text' => $this->currency->format($this->tax->calculate($fee, $this->config->get('ByValueSpent_tax_class_id'), $this->config->get('config_tax')))
                            );
                        }
                    }
                }
            }

            $method_data = array(
                'code' => 'ByValueSpent',
                'title' => $this->language->get('text_title'),
                'quote' => $quote_data,
                'sort_order' => $this->config->get('ByValueSpent_sort_order'),
                'error' => FALSE
            );
            return $method_data;
        }
    }

}

?>
