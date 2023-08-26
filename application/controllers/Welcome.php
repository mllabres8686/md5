<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /*
    // posibles caracteres = 62

    abcdefghijklmnñopqrstuvwxyz
    ABCDEFGHIJKLMNOPQRSTUVWXYZ
    0123456789

    //numero de combinaciones
    //mysam normal -> 4,294,967,295
    //----------------------------------------
    PALABRA DE 2 =                       3.844
    PALABRA DE 3 =                     238.328
    PALABRA DE 4 =                  14.776.336
    PALABRA DE 5 =                 916.132.832

    //mysam con big-tables -> 18,446,744,073,709,551,615
    //----------------------------------------
    PALABRA DE 6 =              56.800.235.584
    PALABRA DE 7 =           3.521.614.606.208
    PALABRA DE 8 =         218.340.105.584.896
    PALABRA DE 9 =      13.537.086.546.263.552
    PALABRA DE 10=     839.299.365.868.340.224
    //fuera de rango
    PALABRA DE 11=  52.036.560.683.837.093.888


    // posibles caracteres = 99

    abcdefghijklmnñopqrstuvwxyz
    ABCDEFGHIJKLMNOPQRSTUVWXYZ
    ,;.:-_´¨`^+*!"·$%&/()=?¿ªº\|@#~€¬{}][
    0123456789

    //numero de combinaciones
    //mysam normal -> 4,294,967,295
    //----------------------------------------
    PALABRA DE 2 =                       9.801
    PALABRA DE 3 =                     970.299
    PALABRA DE 4 =                  96.059.601

    //mysam con big-tables -> 18,446,744,073,709,551,615
    //----------------------------------------
    PALABRA DE 5 =               9.509.900.499
    PALABRA DE 6 =             941.480.149.401
    PALABRA DE 7 =          93.206.534.790.699
    PALABRA DE 8 =       9.227.446.944.279.201
    PALABRA DE 9 =     913.517.247.483.640.899
    //fuera de rango
    PALABRA DE 10=  90.438.207.500.880.449.001

    */


    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index(){
        $this->load->model('md5DDBB');
        $data['data'] = $this->md5DDBB->last_entry();
        //$data['data'] = "hola mundo!";
        $this->load->view('test',$data);
        //$this->create_word();
    }

	
	public function decrypt($string){
		$this->load->model('md5DDBB');
	}
	
	public function encrypt($new_word){
		$this->load->model('md5DDBB');
		$this->md5DDBB->save_string($new_word);
	}
	
	
    public function create_word(){

        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $simple_alphabet = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );
        $full_alphabet = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            ',', ';', '.', ':', '-', '_', '´', '¨', '`', '^', '+', '*', '!', '"', '·', '$', '%', '&', '/', '(', ')', '=', '?', '¿',
            'ª', 'º', '|', '@', '#', '~', '€', '¬', '{', '}', ']', '[',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

        $this->load->model('md5DDBB');
        $last_entry = $this->md5DDBB->last_entry();
        if(!empty($last_entry)){
            $word = (array)$last_entry[0];
            $word_arr = str_split(trim($word['word'],'\''));
        }else{
            $word_arr = str_split('aaaaa');
        }



        $array = $simple_alphabet;
        for($int1 = array_search($word_arr[0],$array); $int1 < count($array); $int1++){
            for($int2 = array_search($word_arr[1],$array); $int2 < count($array); $int2++){
                for($int3 = array_search($word_arr[2],$array); $int3 < count($array); $int3++){
                    for($int4 = array_search($word_arr[3],$array); $int4 < count($array); $int4++){
                        for($int5 = array_search($word_arr[4],$array)+1; $int5 < count($array); $int5++){
                            $word = $array[$int1] .$array[$int2] . $array[$int3] . $array[$int4] . $array[$int5];
                            $string = md5($word);
                            $this->md5DDBB->save_string($word, $string);
                        }
                    }
                }
            }
        }

    }
}
