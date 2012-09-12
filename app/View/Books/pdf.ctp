<?php 
App::import('Vendor','xtcpdf');  
//$tcpdf = new XTCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$tcpdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 

$tcpdf->SetAuthor("Asper"); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->setHeaderFont(array($textfont,'',40)); 
$tcpdf->xheadercolor = array(150,0,0); 
$tcpdf->xheadertext = 'KBS Homes & Properties'; 
$tcpdf->xfootertext = 'Copyright Â© %d KBS Homes & Properties. All rights reserved.'; 

//set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);

//var_dump($pages);die();
for($i = 0; $i < count($pages); $i++){
    $html = "";
    //$resolution= array(100, 100);
    $tcpdf->AddPage();
    
    if((int)$pages[$i]['@id'] == 0){
        $html .= "<div style='padding-bottom:15px;position:relative;'>". html_entity_decode(htmlentities($pages[$i]['title']['@'])) ."</div>";
        $html .= "<div style='padding-bottom:15px;position:relative;'>". html_entity_decode(htmlentities($pages[$i]['subtitle']['@'])) ."</div>";
        $html .= "<div style='margin-top:300px;position:relative;'>". html_entity_decode(htmlentities($pages[$i]['author']['@'])) ."</div>";
    }else if((int)$pages[$i]['@id'] == 1){
        $html .= '<div style="font-weight:bold; text-align: center;padding: 5px 0 15px 0;">Preface</div>
            <div>
                <p>The implementation of the Disability Discrimination Act, and its requirement that employers must make reasonable adjustments to enable disabled employees to attain to their full potential in the workplace, has made a major impact in recent years. Many employers now have a good understanding of the needs of a wide range of disabled people, and what they need to do to meet those needs.</p>
                <p>However, understanding of the needs of people on the autistic spectrum, including those with Asperger syndrome (AS), is far less widespread. The fact is that people on the spectrum are hard-wired to interact differently in social situations, and problems can arise if the people around them - purely through ignorance or unfamiliarity - react badly to their non-standard behaviours.</p>
                <p>Now, a short book has been written which helps to avoid this. The clear and simple illustrations show colleagues how the world can appear to the employee with AS, and demonstrate how small changes in approach can transform workplace relationships. The book gives colleagues a range of strategies to bridge the gap between the two perspectives; and in doing so, it will make the workplace a richer and more productive environment for everybody.</p>
                <table width="100%">
                    <tr>
                        <td align="left" valign="middle">
                        David Perkins <br/>
                        Director,<br/>Prospects (London)                      
                        </td>
                        <td align="right" valign="top">
                            <img src="'.$image_path.'img/preface.jpg" width="120"  />
                        </td>
                    </tr>
                </table>
            </div>';
    }else if((int)$pages[$i]['@id'] == 43){
        //
    }else{
        $html .= '<table width="100%" height="100%">';
        for($j = 0; $j<count($pages[$i]['section']); $j++){
            if($pages[$i]['section'][$j]['@type'] == 'text'){
                $html .= '<tr><td>'.html_entity_decode(htmlentities($pages[$i]['section'][$j]['@'])).'</td></tr>';
            }elseif($pages[$i]['section'][$j]['@type'] == 'image'){
                $html .= '<tr><td align="center" valign="middle">
                            <img src="'.$image_path.$pages[$i]['section'][$j]['path'].'" />
                          </td></tr>';
            }else{
                $html .= '';
            }
        }
        $html .= '</table>';
    }
    //var_dump($html);die();
    $tcpdf->writeHTML($html, true, false, true, false, '');
    $tcpdf->lastPage();    
    //die();
}
$tcpdf->Output('asper.pdf', 'D');

/*
// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

// Now you position and print your page content 
// example:  
$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,'B',20); 
$tcpdf->Cell(0,14, "Hello World", 0,1,'L'); 
// ... 
// etc. 
// see the TCPDF examples  

echo $tcpdf->Output('filename.pdf', 'D'); 
*/
?>