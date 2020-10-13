<?php
    class Ref_Awards
    {

        public function __construct()
        {

        }

        public function get_all($is_array = false)
        {
            $items = rcl_get_option('ref_awards');
            if ($is_array)
            {
                $result_items = array();
                foreach ($items as $host_id => $operations)
                {
                    foreach ($operations as $index => $operation)
                    {
                        array_push($result_items, $operation);
                    }
                }
                return $result_items;
            }
            else
                return $items;
        }

        /*host_id - для какого человека получить операции (если 0, то для всех)*/
        public function get_operations_by($fields, $change_operation = false, $new_status = '', $remove_operation = false)
        {
            $items = $this->get_all();

            $log = new Rcl_Log();

            //$log->insert_log("items: ".print_r($items, true));
            //$log->insert_log("fields: ".print_r($fields, true));
            $result_items = array();

            //Если передан host_id, проходимся только по операциям для этого пользователя
            if (in_array("host_id", array_keys($fields))) {
                if (isset($items[$fields["host_id"]]) && !empty($items[$fields["host_id"]]))
                {
                    //$log->insert_log("items[host_id]1: ".print_r($items[$fields["host_id"]], true));
                    //$index = 0;
                    foreach ($items[$fields["host_id"]] as $index => $operation)
                    {
                        $is_match = false;
                        foreach ($fields as $key => $value) {
                            if ($key != 'host_id')
                            {
                                if ($key == 'award_currency')
                                    $tmp = stripslashes($value);
                                else
                                    $tmp = $value;
                                if ($key == 'award_sum') {
                                    $operation[$key] = round($operation[$key], 2);
                                    $tmp = round($tmp, 2);
                                }
                                if ($operation[$key] == $tmp)
                                    $is_match = true;
                                else {
                                    $is_match = false;
                                    break;
                                }
                            }
                            else
                                continue;
                        }
                        if ($is_match) {
                            if (!$change_operation)
                                $operation += array("host_id" => $fields["host_id"]);
                            array_push($result_items, $operation);
                            if ($change_operation == true && !empty($new_status))
                            {
                                //$log->insert_log("operation: ". print_r($operation, true));
                                $operation["status"] = $new_status;
                                $items[$fields["host_id"]][$index] = $operation;
                                $this->update_all($items);
                                return true;
                            }
                            elseif ($remove_operation == true)
                            {
                                unset($items[$fields["host_id"]][$index]);
                                $this->update_all($items);
                                return true;
                            }

                        }
                        //$index++;
                    }
                }
                else
                    return false;
            }
            else
            {
                if (isset($items) && !empty($items))
                {
                    //$log->insert_log("items: ".print_r($items, true));
                    foreach ($items as $host_id => $operations)
                    {
                        //$index = 0;
                        foreach ($operations as $index => $operation)
                        {
                            $is_match = false;
                            foreach ($fields as $key => $value) {
                                if ($key == 'award_currency')
                                    $tmp = stripslashes($value);
                                else
                                    $tmp = $value;
                                
                                if ($key == 'award_sum') {
                                    $operation[$key] = round($operation[$key], 2);
                                    $tmp = round($tmp, 2);
                                }
                                //$log->insert_log($operation[$key].'=='.$tmp);
                                if ($operation[$key] == $tmp)
                                    $is_match = true;
                                else {
                                    $is_match = false;
                                    break;
                                }
                            }
                            if ($is_match) {
                                if (!$change_operation)
                                    $operation += array("host_id" => $host_id);
                                array_push($result_items, $operation);
                                if ($change_operation == true && !empty($new_status))
                                {
                                    //$log->insert_log("operation: ". print_r($operation, true));
                                    $operation["status"] = $new_status;
                                    $items[$host_id][$index] = $operation;
                                    //$log->insert_log("items[host_id][index]: ". print_r($items[$host_id][$index], true));
                                    //$log->insert_log("index: ".$index);
                                    $this->update_all($items);
                                    return true;
                                }
                                elseif ($remove_operation == true)
                                {
                                    //$log->insert_log("old: ".print_r($items[$host_id], true));
                                    unset($items[$host_id][$index]);
                                    //$log->insert_log("new: ".print_r($items[$host_id][$index], true));
                                    $this->update_all($items);
                                    return true;
                                }
                            }
                            //$index++;
                        }
                    }
                }
                else
                    return false;
            }
//            $log = new Rcl_Log();
            //$log->insert_log("result_items: ".print_r($result_items, true));
            return $result_items;
        }

        public function update_all($new_items)
        {
            rcl_update_option('ref_awards', $new_items);
        }

        public function get_sum($type, $host_id, $ref_id = false) //Если задан ref_id, то сумма высчитывается выплаченная от реферала хосту, а не общая по хосту
        {
            if (in_array($type, array('paid', 'unpaid', 'full') ) )
            {
                $status = '';
                if ($type == 'unpaid')
                    $status = 'processing';
                elseif ($type == 'paid')
                    $status = $type;

                $search_data = array("host_id" => $host_id, "status" => $status);
                if ($ref_id != false)
                    $search_data += array("ref_id" => $ref_id);
                $operations = $this->get_operations_by($search_data);
                $log = new Rcl_Log();

                $sum = array(); //array("prizm" => 1050, "slav" => 500, "rub" => 100)
                if (!empty($operations) && $operations != false) {
                    //$log->insert_log("operations: ".print_r($operations, true));
                    foreach ($operations as $operation) {
                        $ref_sum = $operation["award_sum"];
                        $ref_currency = $operation["award_currency"];

                        if (!isset($sum[$ref_currency]))
                            $sum += array($ref_currency => $ref_sum);
                        else
                            $sum[$ref_currency] += $ref_sum;
                    }
                    return $sum;
                }
                else
                    return false;
                //$log->insert_log("sum: ".print_r($sum, true));

            }
            else
                return false;
        }

        public function get_all_ref_users()
        {
            $items = $this->get_all();
            $user_ids = array();
            foreach ($items as $host_id => $operations)
            {
                array_push($user_ids, $host_id);
            }
            return $user_ids;
        }

        public function get_user_refs($user_id)
        {
            return get_user_meta($user_id, 'refs', true);
        }

        public function sort_all($sort_field, $order, $is_manager, $is_paid) {
            global $user_ID;
            if ($is_paid == 'true')
                $status = 'paid';
            elseif ($is_paid == 'false')
                $status = 'processing';
            if ($is_manager)
                $items = $this->get_operations_by(array(
                    "status" => $status,
                ));
            else
                $items = $this->get_operations_by(array(
                    "status" => $status,
                    "host_id" => $user_ID
                ));

            if ($sort_field == 'host_client_num' && !isset($items[0]['host_client_num'])) {
                foreach ($items as $index => $item)
                {
                    $client_num = get_user_meta($item['host_id'], 'client_num', true);
                    $items[$index] += array('host_client_num' => $client_num);
                }
            }

            sort_assoc($items, $sort_field, $order);

            $log = new Rcl_Log();
            $log->insert_log("items: ".print_r($items, true));

            return $items;
        }

        /*Функция уведомления выбранных пользователей по email о реферальной операции
        (на вход подается host_id, host_name - id и имя пригласившего (хоста),
        ref_id, ref_name - id и имя приглашенного (пользователь, совершивший операцию),
        $notify_managers - уведомление всех менеджеров, $notify_cur_user - уведомить текущего пользователя)*/
        public function operation_notify($notification_data, $notify_managers = true, $notify_cur_user = true)
        {
//            $log = new Rcl_Log();
//            $log->insert_log("notification_data: ".print_r($notification_data, true));
            if ($notify_managers)
            {
                $managers = get_users(array('role' => 'manager'));
                if (!empty($managers))
                {
                    $subject = 'SLAVIA: Отправить пользователю ' . $notification_data['host_name'] . ' с ID ' .
                        $notification_data['host_id'] . ' вознаграждение.';

                    //Отправляем email всем менеджерам о необходимости отправить вознаграждение пригласившему

                    $textmail = '<p>Пользователь ' . $notification_data['ref_name'] . ' с ID ' . $notification_data['ref_id'] .
                        ' только что совершил новую операцию.</p>' .
                        '<p>Необходимо выплатить пригласившему его пользователю ' . $notification_data['host_name'] .
                        ' с ID ' . $notification_data['host_id'] . ' вознаграждение в размере ' .
                        $notification_data['award_sum'] . ' ' . $notification_data['award_currency'] .
                        ' в соответствии с условиями реферальной программы.</p>';

                    foreach ($managers as $manager) {

                        $user_email = $manager->user_email;

                        rcl_mail($user_email, $subject, $textmail);
                    }
                }
            }
            if ($notify_cur_user)
            {
                $subject = 'SLAVIA: Вознаграждение по реферальной программе: приглашенный вами пользователь ' . $notification_data['ref_name'] . ' совершил новую операцию.';

                //Отправляем email всем менеджерам о необходимости отправить вознаграждение пригласившему

                $textmail = '<p>Приглашенный вами пользователь ' . $notification_data['ref_name'] .
                    ' только что совершил новую операцию.</p>' .
                    '<p>Вам причитается вознаграждение в размере ' .
                    $notification_data['award_sum'] . ' ' . $notification_data['award_currency'] .
                    ' в соответствии с условиями реферальной программы.</p>';

                $user_data = get_userdata($notification_data['host_id']);
                $user_email = $user_data->user_email;

                rcl_mail($user_email, $subject, $textmail);
            }
        }

        public function add($host_id, $award_item)
        {
            $items = $this->get_all();

            $log = new Rcl_Log();
            $log->insert_log("refs: ".print_r($items, true));

            if (isset($items) && !empty($items))
            {
                if (isset($items[$host_id]) )
                {
                    array_push($items[$host_id], $award_item);
                }
                elseif (!isset($items[$host_id]))
                {
                    //Добавляем массив данных для данного пользователя
                    $items[$host_id] = array();

                    array_push($items[$host_id], $award_item);
                }
            }
            //Если еще нету запросов на обмен
            else
            {
                $items = array($host_id => array());
                array_push($items[$host_id], $award_item);
            }
            $log->insert_log("new ref: ".print_r($items[$host_id], true));

            //log = new Rcl_Log();
            //$log->insert_log("award_item: ".print_r($award_item, true));

            rcl_update_option('ref_awards', $items);


        }

        public function clear_all()
        {
            rcl_update_option('ref_awards', array());
        }

    }
?>