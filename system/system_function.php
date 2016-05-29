<?php defined('SECURITY') or die('No direct script access.');

class system_function {
    
    /**
     * 
     * @param type $master_page
     * @param type $page
     * @param type $data
     * 
     * Загрузка темы
     */
    public function theme_view($master_page, $page, $data) {
        
        require_once 'view/viewMaster/'.$master_page.'.php';
    }
    
    /**
     * 
     * @param type $value_temp
     * @return type
     * 
     * Очистка данных от спец символов и html/php инъекций
     */
    public function clean_injection($value_temp) {
        
        foreach ($value_temp as $key => $value) {
            
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $value = addslashes($value);

            $value_res[$key] = $value;
        }
        
        return $value_res;
    }
    
    /**
     * 
     * @param string/int $sign regular expression or constant expression
     * @param string $value
     * 
     * Проверка данных на корректность заданному условию
     */

    public function solve_sign($sign='', $value, $min='', $max='') {
        
        switch ($sign) {
            case 1:
                
                $sign = '/^[а-яёіА-ЯЁІ]*$/u';  // span sign абвгдз... (ru/uk) 
                break;
            
            case 2:
                
                $sign = '/^[а-яёіА-ЯЁІ0-9]*$/';  // span sign абвгдз... (ru/uk) and 0-9
                break;
            
            case 3:
                
                $sign = '/^[aA-zZ]*$/';  // span sign абвгдз... (en)
                break;
            
            case 4:
                
                $sign = '/^[aA-zZ0-9]*$/';  // span sign абвгдз... (en) end 0-9
                break;
            
            case 5:
                
                $sign = '/^[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,6}$/';  // span sign email
                break;
            
            case 6:
                
                $sign = '/^\+[0-9]*$/';  // span sign telephone
                break;

            default:
                
                if(empty($sign)){
                    $sign = '[]';   // span sign all
                }
                break;
        }
        
        if (preg_match($sign, $value)) {
            
            if(empty($min) && empty($max)){
                return '';
            }  elseif(strlen(trim(iconv("UTF-8", "windows-1251",$value))) >= $min && strlen(trim(iconv("UTF-8", "windows-1251",$value))) <= $max) {
                return '';
            }  else {
                return "Количество символов должно быть не менее $min и не более $max!";
            }
        } else {
            
            return "Введены некорректные данные!";
        }
    }
    
    /**
     * 
     * @param type $to
     * @param type $title
     * @param type $mess
     * @param type $email
     * 
     * отправка почты от произвольного отправителя и от заданых по шаблону
     */
    public function get_mail($to, $title, $mess, $email) {
        
        $default_mail = array('incommoda@mail.ru');
        
        if(array_key_exists($to, $default_mail)){
            
            mail($email, $title, $mess, 'From:'.$default_mail[$to]);
        }  else {
            mail($email, $title, $mess, 'From:'.$to);
        }
    }
}