<?PHP
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("functions/functions.php");
?>
<div style="width:8000px" id="awards">
    <ul class="slider">
        <li>  
                  
            <div class="Overviewimage_box">
                <img src="images/awards_01.jpg">
            </div>
        </li>
        
        
        <li>  
            <div class="grey_text">
                <h1>AWARDS</h1>
                <div class="columns">
                    <?php
                    $text = '<p>American Institute of Architects, Excellence in Architecture Built Award, Miami Chapter, MDO, 2012</p>
                    <p>American Institute of Architects Excellence in Architecture Unbuilt Award, Miami Chapter, IMSA, 2012</p>
                    <p>ICAA Design Award for Historic Preservation, Florida Chapter, Historic Preservation, Cape Dutch House, 2012</p>
                    <p>Miami Biennale, Silver Medal, Oak Plaza, 2010</p>
                    <p>Marcus Corporation Architectural Award, Finalist, 2009</p>
                    <p>Florida Trust for Historic Preservation Award for outstanding restoration/rehabilitation, Cape Dutch House, 2008</p>
                    <p>Dade Heritage Trust Award for outstanding restoration, Cape Dutch House, 2008</p>
                    <p>Orchid Award, Urban Environment League of Miami, Oak Plaza, 2007</p>
                    <p>Congress for the New Urbanism Award, Oak Plaza, 2007</p>
                    <p>American Institute of Architects Florida Merit Award of Excellence, Oak Plaza, 2007</p>
                    <p>American Institute of Architects, Emerging Practice Award, Finalist, 2004</p>
                    <p>American Institute of Architects, Award of Merit, Miami Chapter, Oak Plaza, 2004</p>
                    <p>Fourth Place Finalist, National Coptic Church Competition, 1999 (with Rodolphe El-Khoury)</p>';
                    $column_spacing = 0;
                    $columns = intval(strlen($text) / 600);
                    if ($columns > 1)
                        print convert2columns($text, 700, $column_spacing);
                    else
                        echo '<div style="width:500px;">' . $text . '</div>';
                    ?>

                </div>
            </div>
        </li>
        <li>      
            <div class="grey_text">
                <h1>Publications</h1>
                <div class="columns">
                    <?php
                    $text = '<p>
                        Prodhon, Francoise-Claire.  “Cape Dutch House”
                        <i>Architectural Digest France</i>
                        , March 2010:  48-60.
                    </p>
                    <p>
                        John, Richard, ed. “Oak Plaza” (with Khoury & Vogt Architects) in
                        <i>The Classicist 8</i>
                        2009:  56-57.
                    </p>
                    <p>
                        “Oak Plaza” in
                        <i>Archivos de Arquitectura Antillana:  AAA no.32</i>
                        , Santo Domingo, Dominican Republic: Caribbean Architectural Records 2008: 274-277.
                    </p>
                    <p>
                        Dunlop, Beth.  “Made in Miami”
                        <i>Plum Magazine</i>
                        (March 2011): 158-171.
                    </p>
                    <p>
                        Dunlop, Beth.  “House of Good Hope:  A newly restored gem in Coral Gables”
                        <i>Home Miami </i>
                        (January 2009):  66-73.
                    </p>

                    <p>
                        Dunlop, Beth.  “House of Good Hope:  A newly restored gem in Coral Gables”
                        <i>Home Fort Lauderdale</i>
                        (January 2009):  66-73.
                    </p>
                    <p>
                        “Oak Plaza” in
                        <i>Miami:  Mediterranean Splendor and Art Deco Dreams</i>
                        by Beth Dunlop.  New York:  Rizzoli International 2007: 304-305.
                    </p>
                    <p>
                        “Trade Talks,”
                        <i>Home Miami</i>
                        (April 2007):  62-63.
                    </p>
                    <p>
                        “New Plaza for Miami’s Design District,”
                        <i>Miami Monthly</i>
                        (February 2007):  61.
                    </p>
                    <p>
                        Beck, Ernest.  “What Has Florida Built,”
                        <i>Insideout</i>
                        (November/December 2006):  70-74.
                    </p>
                    <p>
                        Berkowicz, Sylvie.  “Miami, la formidable expansion,”
                        <i>Interieurs Magazine </i>
                        (Volume 35 November-December 2005):  37.
                    </p>
                    <p>
                        Kristal, Marc.  “Dense and Denser,”
                        <i>Dwell</i>
                        (March 2004):  124.
                    </p>
                    <p>
                        “Creating more places at the table,”
                        <i>Home Miami </i>
                        (October 2004):  25-31.
                    </p>
                    <p>
                        Dunlop, Beth.  “Miami Modern,” 
                        <i>Architecture</i>
                        (July 2003): 23-26.
                    </p>
                    <p>
                        Machado, Rodolfo.  “The Entertainment Cube,” (with Adib Cure)
                        <i>New Urbanity:  The Entertainment District of Singapore </i>
                        (Massachusetts:  Harvard University Graduate School of Design, 1998): 46-53.
                    </p>';
                    
                    $columns = intval(strlen($text) / 1200);
                   
                    if ($columns > 1)
                        print convert2columns($text, 1200, 0);
                    else
                        echo '<div style="width:500px;">' . $text . '</div>';
                    ?>

                </div>
            </div>
        </li>
        
    </ul>
</div>

