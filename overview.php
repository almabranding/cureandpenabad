<?PHP
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("functions/functions.php");
$chars=750;
?>
<div style="width:80000px" id="overview">
    <ul class="slider">
        <li>            
            <div class="yellow_text">
                <h1>Overview</h1>
                <div class="columns">
                    <?php
                    
                    $text = '<p>Founding principals Adib Cure and Carie Penabad have insisted on the importance of architecture and the design of the city as a singular investigation where inquiry and realization, poetry and practicality, history and invention are inextricably linked.  The work of the firm brings together – in a single vision- the experience and cultures of three different countries: Colombia, where Cure was born; Cuba where Penabad’s ancestors are from; and the United States, where the couple studied at the University of Miami and Harvard, settling in Miami to establish their architectural practice.</p>
                    <p>A typological, historical, contextual, and climatological understanding informs the work.  Projects engage contemporary building practices while maintaining
                     an interest in what is culturally resonant about a specific place and how each project can reflect this. As such, the work of the practice is eclectic, exploring a range of languages and building types informed by the particulars of each setting. Finally, there is a pre-occupation with a range of incidental themes such as the importance of perspective and the “visual” in the choreography of space; thus the transfiguration of the commonplace through architecturally staged phenomena has been a consistent goal of the work.</p>';
                    $columns=intval(strlen($text)/$chars); 
                        print convert2columns($text, $chars, 0);
                        if($columns>2) echo '<div class="rMore" onclick="readMore(this);">Read more</div>';
                    ?>
                </div>
            </div>
            
        </li>
        <li>  
            <div class="Overviewimage_box">
                <img src="uploads/profile_adib1.jpg">
            </div>
        </li>
        <li>            
            <div class="yellow_text">
                <h1>Adib Cure</h1>
                <div class="columns">
                    <?php
                    $text = '<p>Adib Cure received a Bachelor of Architecture from the University of Miami and a Masters of Architecture in Urban Design degree from Harvard University.  Upon graduation he went to work for the office of Machado & Silvetti in Boston, and in 2001 established his own practice in Miami with partner Carie Penabad.  The work of CURE & PENABAD Architecture and Urban Design has received numerous awards including American Institute of Architects awards, state and local preservation awards, a National Congress for New Urbanism Award, and a Silver Medal prize at the 2010 Miami Biennale. Most recently, the firm was nominated as a finalist for the prestigious Marcus Cooperation Architectural Prize for emerging architectural talent.</p>
                    <p>His research on Latin American urbanism and architecture, most notably the mapping of informal cities throughout the Global South, has been presented at a variety of national and international conferences including the American Institute of Architects National Convention.  He is an Assistant Professor in Practice at the University of Miami School of Architecture and has taught at Yale University as the Louis I. Kahn Visiting Assistant Professor of Architectural Design, Northeastern University and the Boston Architectural Center.  </p>
                    <p><a href="http://www.dinamiko.com/cp/wp-content/files_mf/1360258642Adib_Resume.doc">View CV</a></p>';
                    $columns=intval(strlen($text)/$chars); 
                    print convert2columns($text, $chars, 0);
                    if($columns>2) echo '<div class="rMore" onclick="readMore(this);">Read more</div>';
                    ?>

                </div>
            </div>
        </li>
        <li>            
            <div class="yellow_text">
                <h1>Carie Penabad</h1>
                <div class="columns">
                    <?php
                    $text = '<p>Carie Penabad received a Bachelor of Architecture from the University of Miami and a Masters of Architecture in Urban Design degree from Harvard University. Upon graduation she went to work for the office of Machado & Silvetti in Boston, and in 2001 established her own practice in Miami with partner Adib Cure. The work of CURE & PENABAD Architecture and Urban Design has received numerous awards including American Institute of Architects awards, state and local preservation awards, a National Congress for New Urbanism Award, and a Silver Medal prize at the 2010 Miami Biennale. Most recently, the firm was nominated as a finalist for the prestigious Marcus Cooperation Architectural Prize for emerging architectural talent.</p>

                    <p>Her research on Women in Architecture has received various awards including a Graham Foundation Grant for advanced studies in the Fine Arts. She recently completed a book entitled Marion Manley: Miami’s First Woman Architect with respected historian and author Catherine Lynn, published by the University of Georgia Press in March 2010. She is an Associate Professor at the University of Miami School of Architecture and has taught at Yale University as the Louis I. Kahn Visiting Assistant Professor of Architectural Design, Northeastern University and the Boston Architectural Center.</p>
                    <p><a href="http://www.dinamiko.com/cp/wp-content/files_mf/1360258719Carie_Resume.doc">View CV</a></p>';
                    $columns=intval(strlen($text)/$chars); 
                    print convert2columns($text, 750, 0);
                    if($columns>2) echo '<div class="rMore" onclick="readMore(this);">Read more</div>';
                    ?>

                </div>
            </div> 

        </li>
        <li>
            <div class="yellow_text" style='width: auto !important;'>
            <h1>Carlos Berrios</h1>
                <div class="columns" style='position: relative !important;'>
                    <?php
                    $text = '<p>Carlos Berrios is a partner in the firm. He received a Bachelor of Architecture from the City College of New York. Following graduation, he worked at the office of Paul Rudolph. Later, he became a project engineer with the firm of Morrison Knudsen and has had over thirty years experience in Construction Management and supervision in domestic as well as overseas projects. He is a certified General Contractor and a registered Architect in the State of Florida.</p>';
                    $text.='<p><a href="uploads/Carlos Berrios_Resume_Revised.doc">View CV</a></p>';
                    $columns=intval(strlen($text)/$chars); 
                    print convert2columns($text, 750, 0);
                    if($columns>2) echo '<div class="rMore" onclick="readMore(this);">Read more</div>';
                        ?>
                </div>
            </div> 
        </li>
        <li>  
            <div class="Overviewimage_box">
                <img style='height: 100%;' src="uploads/Collaborators.jpg">
            </div>
        </li>
       
    </ul>
</div>

