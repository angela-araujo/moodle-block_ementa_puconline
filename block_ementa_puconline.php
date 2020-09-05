<?php

/**
 * Ementa PUC Online
 *
 * @package    block_ementa_puconline
 * @copyright  2015 CCEAD PUC-Rio
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_ementa_puconline extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_ementa_puconline');
    }

    public function get_content() {
        
        global $COURSE, $PAGE;
        
        if ($this->content !== null) {
            return $this->content;
        }
        
        $this->content = new stdClass;        
        
        if ($COURSE->id != 1) {
        
            $category = $PAGE->category->name;
            
            $catpuconline = stripos($category, 'PUC ONLINE');
            
            if ( $catpuconline !== false) {
                
                $shortnamecourse = substr($COURSE->shortname, 0, 7);   
                $urlementa = 'http://www.puc-rio.br/ferramentas/ementas/ementa.aspx?cd=' . $shortnamecourse;

                $woparam = "width=420,height=460,toolbar=no,location=no,menubar=no,copyhistory=no,status=no,directories=no,scrollbars=yes,resizable=yes";
                $onclick = "window.open('$urlementa', '', '$woparam'); return false;";


                $this->content->text = '<a title="Ementa da disciplina" href="#" onclick="'.$onclick.'">Ementa da disciplina</a><br>';
            }
            
        }
        
        return $this->content;
    }

}
