<!doctype html>

<html lang="en">
<head>

<!-- Required meta tags -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ketex</title>
<?php include 'assets/inc/header.php';?>
<?php include 'about_us_d.php';?>

<!-- ********|| BANNER STARTS ||******** -->

<section class="banner"> 
  
  <!--          <div class="container">--> 
  
  <!--              <div class="row">--> 
  
  <!--

                  <div class="col-lg-6 p-0">

                      <div class="banner-inner">

                          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/YTJg8q9Q940" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>

                  </div> 

--> 
  
  <!--                   <div class="col-lg-12 p-0">-->
  
  <div class="banner-box">
    <div id=owldemo1 class="owl-carousel owl-theme">
      <div class="item">
        <div class="about-img"> <img class="img-fluid" src="assets/img/homebanner_new2.jpg" alt=""> </div>
      </div>
      <div class="item">
        <div class="about-img"> <img class="img-fluid" src="assets/img/homebanner_new1.jpg" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!--                  </div> --> 
  
  <!--              </div>--> 
  
  <!--          </div>--> 
  
</section>

<!-- ********|| BANNER ENDS ||******** --> 

<!-- ********|| ABOUT US STARTS ||******** -->

<section class="about-part-2">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-12">
        <!--<div class="about-img"> <img class="img-fluid" src="assets/img/about-img.jpg" alt="" /> </div> -->
        <div class="about-img"> <img class="img-fluid" src="assets/img/about.jpg" alt="" /> </div>
      </div>
      <div class="col-xl-6 col-lg-12">
        <div class="title-inner">
          <div class="title">About us</div>
        </div>
        <div class="about-content"> <?php echo $aboutus[0]['content']?> 
          
          <!-- Shining with pride, Amer-Sil Ketex Pvt. Ltd. is one the leading organizations in India, specializing in making Industrial Lead acid battery components, Microporous PVC / Silica separator. --> 
          
        </div>
        
        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="vision-inner">
          <div class="about-vision bg-orange">
           <?php /*?> <div class="vision-img"> <img class="img-fluid" src="assets/img/vision-01.svg" alt="" /> </div><?php */?>
            <div class="vision-title"> vision &amp; mission </div>
            <div class="vision-content"> <?php echo $vision[0]['content']?> </div>
            
             <?php /*?><div class="vision-title"> mission </div>
             <div class="vision-content"> <?php echo $mission[0]['content']?> <?php */?>
          </div>
          <?php /*?><div class="about-vision bg-deep-orange">
            <div class="vision-img"> <img class="img-fluid" src="assets/img/mission-01.svg" alt="" /> </div>
            <div class="vision-title"> mission </div>
            <div class="vision-content"> <?php echo $mission[0]['content']?> 
            </div>
          </div><?php */?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ********|| ABOUT US ENDS ||******** --> 

<!-- ********|| DIRECTOR STARTS ||******** -->

<section class="director-sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="director-img"> <img class="img-fluid" src="assets/img/director.jpg"> </div>
      </div>
      <div class="col-lg-8">
        <div class="director-inner">
          <div class="title-inner">
            <div class="title">FROM THE DESK OF THE MANAGING DIRECTOR </div>
          </div>
          <div class="director-content"> <?php echo $director[0]['content']?> 
            <!-- Our experiences, over the years, as a worldwide leading manufacturing industry, have been very significant for our growth and development. It is seen that we have intensively delivered the best quality of products for automobile industrial applications all over India and Bangladesh. I would like to thank our valuable dealers, customers and world-class suppliers. I would like to make a special mention to our whole team of engineers and technicians for their enthusiastic and valuable contribution to establish our organization.  --> 
            
          </div>
          
          <!--<div class="director-content">

                              Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                          </div>--> 
          
          <!--<div class="director-content">

                              Duis autem vel eum iriure dolor in hendrerit iumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

                          </div>-->
          
          <div class="director-name"> <i>-Mr. Sukumar Roy</i> </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ********|| DIRECTOR ENDS ||******** -->

<section class="jurney-sec">
  <div class="container">
    <div class="row">
      <!--<div class="col">
        <div class="circle-wrapper">
          <div class="blue-circle"></div>
          <div class="start"><span><strong>To view our journey</strong> <br>
            Click here</span></div>
          <ul class="nav nav-tabs" id="myTab-circle" role="tablist" style="opacity: 0;">
            <li class="nav-item" role="presentation"> <a class="nav-link active" id="year-one-tab" data-toggle="tab" href="#year-one" role="tab"

                                aria-controls="year-one" aria-selected="true">2021</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-two-tab" data-toggle="tab" href="#year-two" role="tab"

                                aria-controls="year-two" aria-selected="false">1984</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-three-tab" data-toggle="tab" href="#year-three" role="tab"

                                aria-controls="year-three" aria-selected="false">1986</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-four-tab" data-toggle="tab" href="#year-four" role="tab"

                                aria-controls="year-four" aria-selected="false">1990</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-five-tab" data-toggle="tab" href="#year-five" role="tab"

                                aria-controls="year-five" aria-selected="false">1993</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-six-tab" data-toggle="tab" href="#year-six" role="tab"

                                aria-controls="year-six" aria-selected="false">2001</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-seven-tab" data-toggle="tab" href="#year-seven" role="tab"

                                aria-controls="year-seven" aria-selected="false">2009</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-eight-tab" data-toggle="tab" href="#year-eight" role="tab"

                                aria-controls="year-eight" aria-selected="false">2011</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-nine-tab" data-toggle="tab" href="#year-nine" role="tab"

                                aria-controls="year-nine" aria-selected="false">2014</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-ten-tab" data-toggle="tab" href="#year-ten" role="tab"

                                aria-controls="year-ten" aria-selected="false">2015</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-eleven-tab" data-toggle="tab" href="#year-eleven" role="tab"

                                aria-controls="year-eleven" aria-selected="false">2016</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-twelve-tab" data-toggle="tab" href="#year-twelve" role="tab"

                                aria-controls="year-twelve" aria-selected="false">2019</a> </li>
            <li class="nav-item" role="presentation"> <a class="nav-link" id="year-thirteen-tab" data-toggle="tab" href="#year-thirteen" role="tab"

                                aria-controls="year-thirteen" aria-selected="false">2020</a> </li>
          </ul>
          <div class="tab-content" id="myTabContent" style="opacity: 0;">
            <div class="tab-pane  show active" id="year-one" role="tabpanel" aria-labelledby="year-one-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2021</h2>
                  <p> <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> started new unit in Kharagpur Operations <strong>(VIP-Unit)</strong> at Vidyasagar Industrial Park – Kharagpur of West Bengal Industrial Development Corporation (WBIDC) with a State-of-the-Art facility production facility. </p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-two" role="tabpanel" aria-labelledby="year-two-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>1984</h2>
                  
                  
                  <p>First Project Initiated for Development of Gauntlet by Mr. Sukumar Roy, Managing Director and Mr. D’Souza – Head R&D of Exide Industries Limited.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-three" role="tabpanel" aria-labelledby="three-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>1986</h2>
                  <p>First Commercial Production of Gauntlets started in Kharagpur in name of <strong>TECHFAB INDUSTRIES</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-four" role="tabpanel" aria-labelledby="four-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>1990</h2>
                  
                  
                  <p>Formation of new company in the name of <strong>SAFEMATICS FIBER INDIA PRIVATE LIMITED</strong> with an Indo-Danish Joint Venture Company <strong>KELD ELLENTOFT (I) PRIVATE LIMITED</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-five" role="tabpanel" aria-labelledby="five-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>1993</h2>
                  
                  
                  <p>The name of the company was changed to <strong>KE BURGMANN FIBER INDIA PRIVATE LIMITED</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-six" role="tabpanel" aria-labelledby="six-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2001</h2>
                  
                  
                  <p>After internal shareholding re-structuring, the name of the company was changed to <strong>KE TECHNICAL TEXTILES PRIVATE LIMITED</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-seven" role="tabpanel" aria-labelledby="seven-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2009</h2>
                  
                  
                  <p>Establishment of a New Plant (Unit I) at Gagret, Himachal Pradesh under the name of <strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-eight" role="tabpanel" aria-labelledby="eight-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2011</h2>
                  
                  
                  <p>First Overseas Plant for manufacturing Gauntlets established in Dhaka, Bangladesh in the name of <strong>KE TECHNICAL TEXTILES (BANGLADESH) LIMITED</strong>.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-nine" role="tabpanel" aria-labelledby="nine-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2014</h2>
                  <p><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> started a new weaving Unit II.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-ten" role="tabpanel" aria-labelledby="ten-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2015</h2>
                  <p class="tab_doubleachibment">Joint Venture between <strong>AMER-SIL S.A</strong> of Luxembourg and <strong>KE TECHNICAL TEXTILES PRIVATE LIMITED</strong>, emerged with new name <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>.</p>
                  <p><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> started a new plastic division at Unit I.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-eleven" role="tabpanel" aria-labelledby="eleven-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2016</h2>
                  <p  class="tab_doubleachibment"><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> merged with <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>.</p>
                  <p>First Plant in South India set up by <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> in Bengaluru.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-twelve" role="tabpanel" aria-labelledby="twelve-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2019</h2>
                  <p><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> Kharagpur unit started a new production facility at Bhetia. PO Demouli, WB.  for specialized High Silica Fiberglass Fabric.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="year-thirteen" role="tabpanel" aria-labelledby="thirteen-tab">
              <div class="tabpane-content-wrapper">
                <div class="center">
                  <h2>2020</h2>
                  <p class="tab_doubleachibment"><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> of Kharagpur and Gagret unit installed a 350 KVA Roof Top Solar Panel.</p>
                  <p><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> initiated a new Integrated Unit in Gagret with a State-of-the-Art production facility.</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>
          
        </div>
      </div>-->
      
      <div id="printableArea">
      <section class="our-product">
      	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="title-inner">
                    	<div class="title-appli">MILESTONE</div>
                    </div>
                </div>
            </div>
        </div>
      </section>
  <section id="cd-timeline" class="cd-container">
<?php 
$i=1;
foreach ($journeyList as $k => $v):
if($i%2 == 0){
?>       
    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture" data-aos="fade-down"> <img src="assets/img/abouticon_history.svg" alt="Icon"> </div>
      
      <div class="cd-timeline-content" data-aos="fade-up"> 
      <p> <strong><?php echo $v['title'] ?></strong> <br>
      <span class="cd-date"><span class="evertyears"><?php echo $v['year'] ?></span></span><br>
      <span class="cd-descrip"><?php echo $v['description'] ?></span> </p>
      <!--<span class="cd-date"><?php //echo $v['year'] ?></span> --></div>
    </div>
    
<?php } else { ?>

    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture" data-aos="fade-down"> <img src="assets/img/abouticon_history.svg" alt="Icon"> </div>
      <div class="cd-timeline-content" data-aos="fade-up"> 
      	<p><strong><?php echo $v['title'] ?></strong><br> 
        <span class="cd-date"><span class="evertyears"><?php echo $v['year'] ?></span></span> <br> 
		<span class="cd-descrip"><?php echo $v['description'] ?></span></p>
      	
      </div>
    </div>
<?php } 
$i++;
?>    

<?php endforeach; ?> 
    
    <!--<div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture" data-aos="fade-down"> <img src="assets/img/abouticon_history.svg" alt="Icon"> </div>
      <div class="cd-timeline-content" data-aos="fade-up"> 
      	<p><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> initiated a new Integrated Unit in Gagret with a State-of-the-Art production facility.</p>
      	<span class="cd-date">2020</span> 
      </div>
    </div>
    
    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture" data-aos="fade-down"> <img src="assets/img/abouticon_history.svg" alt="Icon"> </div>
      <div class="cd-timeline-content" data-aos="fade-up">
      <p> <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> Kharagpur unit started a new production facility at Bhetia. PO Demouli, WB.  for specialized High Silica Fiberglass Fabric. </p>
      <span class="cd-date">2019</span> 
      </div>
    </div>
    
    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture" data-aos="fade-down"> <img src="assets/img/abouticon_history.svg" alt="Icon"> </div>
      <div class="cd-timeline-content" data-aos="fade-up"> 
      	<p><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> merged with <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>.</p>
      <span class="cd-date">2016</span> </div>
    </div>--->
    
    
    
    
    
    
    
  </section>
  <!-- cd-timeline -->
  
  <div class="fb-quote"></div>
</div>
    </div>
  </div>
</section>

<!--***********************************************************************************--> 

<!--                     start mobile version-->

<!--<div class="details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="details-aco">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> 1984 </button>
                </h2>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 1984 </div>
                    <div class="journey-title"> First Project Initiated for Development of Gauntlet by Mr. Sukumar Roy, Managing Director and Mr. D’Souza – Head R&D of Exide Industries Limited. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 1986 </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 1986 </div>
                    <div class="journey-title"> First Commercial Production of Gauntlets started in Kharagpur in name of <strong>TECHFAB INDUSTRIES</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 1990 </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 1990 </div>
                    <div class="journey-title"> Formation of new company in the name of <strong>SAFEMATICS FIBER INDIA PRIVATE LIMITED</strong> with an Indo-Danish Joint Venture Company <strong>KELD ELLENTOFT (I) PRIVATE LIMITED</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> 1993 </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 1993 </div>
                    <div class="journey-title"> The name of the company was changed to <strong>KE BURGMANN FIBER INDIA PRIVATE LIMITED</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> 2001 </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2001 </div>
                    <div class="journey-title"> After internal shareholding re-structuring, the name of the company was changed to <strong>KE TECHNICAL TEXTILES PRIVATE LIMITED</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"> 2009 </button>
                </h2>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2009 </div>
                    <div class="journey-title"> Establishment of a New Plant (Unit I) at Gagret, Himachal Pradesh under the name of <strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"> 2011 </button>
                </h2>
              </div>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2011 </div>
                    <div class="journey-title"> First Overseas Plant for manufacturing Gauntlets established in Dhaka, Bangladesh in the name of <strong>KE TECHNICAL TEXTILES (BANGLADESH) LIMITED</strong>. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"> 2014 </button>
                </h2>
              </div>
              <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2014 </div>
                    <div class="journey-title"> <strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> started a new weaving Unit II. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingNine">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"> 2015 </button>
                </h2>
              </div>
              <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2015 </div>
                    <div class="journey-title">
                      <p class="tab_doubleachibment">Joint Venture between <strong>AMER-SIL S.A</strong> of Luxembourg and <strong>KE TECHNICAL TEXTILES PRIVATE LIMITED</strong>, emerged with new name <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>.</p>
                      <p><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> started a new plastic division at Unit I.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTen">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"> 2016 </button>
                </h2>
              </div>
              <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2016 </div>
                    <div class="journey-title">
                      <p  class="tab_doubleachibment"><strong>GAGRET TECHNICAL FABRICS PRIVATE LIMITED</strong> merged with <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>.</p>
                      <p>First Plant in South India set up by <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> in Bengaluru.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingEleven">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven"> 2019 </button>
                </h2>
              </div>
              <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2019 </div>
                    <div class="journey-title"> <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> Kharagpur unit started a new production facility at Bhetia. PO Demouli, WB.  for specialized High Silica Fiberglass Fabric. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwelve">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve"> 2020 </button>
                </h2>
              </div>
              <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2020 </div>
                    <div class="journey-title">
                      <p class="tab_doubleachibment"><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> of Kharagpur and Gagret unit installed a 350 KVA Roof Top Solar Panel.</p>
                      <p><strong>AMER-SIL KETEX PRIVATE LIMITED</strong> initiated a new Integrated Unit in Gagret with a State-of-the-Art production facility.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThirteen">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen"> 2021 </button>
                </h2>
              </div>
              <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-journey">
                    <div class="journey-year"> 2021 </div>
                    <div class="journey-title"> <strong>AMER-SIL KETEX PRIVATE LIMITED</strong> started new unit in Kharagpur Operations <strong>(VIP-Unit)</strong> at Vidyasagar Industrial Park – Kharagpur of West Bengal Industrial Development Corporation (WBIDC) with a State-of-the-Art facility production facility. </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->

<!--                     end mobile version-->

<?php include 'assets/inc/footer.php';?>
</body></html>