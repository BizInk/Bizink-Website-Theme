<?php

/**
 * Template Name: Playbook New layout
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 * @package Understrap
 *
 */
?>

<?php
get_header();
?>
<section class="playbook-section">
    <div class="container">
        <div class="row">            
            <aside class="col-md-4 col-lg-3">
            	<div class="aside-inner-wrap">
	                <!-- <nav class="mb-3 mb-md-5">
	                    <strong>Start here </strong>
	                    <ul>
	                        <li>
	                            <a href="#" class="selected"><i>📺</i> <span>Playbook Intro</span></a>
	                        </li>
	                    </ul>
	                </nav>
	                <nav class="mb-3 mb-md-5">
	                    <strong>Bonus Content</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>🎁</i> <span>Free Templates & Tools</span></a>
	                        </li>
	                    </ul>
	                </nav>    
	                <nav class="mb-3 mb-md-5">
	                    <strong>Customer Research</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>👂</i> <span>Research Intro</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🗣️</i> <span>Who to Interview</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>💬</i> <span>Customer Interview Script</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Persona Doc</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Messaging Doc</span></a>
	                        </li>
	                    </ul>
	                </nav>      
	                 <nav class="mb-3 mb-md-5">
	                    <strong>Your Campaign Offer</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>🤝</i> <span>Campaign Offer Intro</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>⚠️</i> <span>3 Ways to Target Pain Points</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>✨</i> <span>When & How to Talk About Product</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🤖</i> <span>'Techno-babble' & Other Common Mistakes</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: 'Analyse It' Report Structure</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: 'Prove It' Report Structure</span></a>
	                        </li>
	                    </ul>
	                </nav>        
	                <nav class="mb-3 mb-md-5">
	                    <strong>Campaign Distribution</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>📣</i> <span>Distribution Intro</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🚀</i> <span>Campaign Launch Checklist</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>✏️</i> <span>Two Must-Have Copywriting Formulas </span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>💬</i> <span>Social ad tips</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Landing Page</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Social Ads</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Emails</span></a>
	                        </li>
	                    </ul>
	                </nav> 
	                <nav class="mb-3 mb-md-5">
	                    <strong>Nurturing Leads</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>🤝</i> <span>Nurturing Leads</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>⚙️</i> <span>Our Follow-Up Process</span></a>
	                        </li>
	                       <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Nurture Emails</span></a>
	                        </li>
	                        <li>
	                            <a href="#"> <i>🔒</i> <span>Template: Lead Scoring</span></a>
	                        </li>	                        
	                    </ul>
	                </nav>  
	                <nav class="mb-3 mb-md-5">
	                    <strong>Reporting (WIP)</strong>
	                    <ul>
	                        <li>
	                            <a href="#"> <i>🔎</i> <span>Reporting Intro</span></a>
	                        </li>	                                               
	                    </ul>
	                </nav> --> 
	                 
	                <?php echo wp_nav_menu( array(
					    'theme_location' => 'our-playbook-menu',
					) ); ?>      
            	</div>
            	
            </aside>                         
            <div class="col-md-8 col-lg-9">
                <div class="default-content playbook-editor">
                	<!-- <h2>Playbook Walkthrough</h2>
                	<p>The best way to get to grips with our playbook is to watch our walkthrough video from start to finish. It's only four minutes long - and it's totally worth it.</p>
                	<p>Once you've watched it, I recommend you check out the Customer Research section first. But if you can't wait to get stuck into one of the other sections, feel free to skip ahead using the sidebar navigation.</p>                	
                    <ul>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                    </ul>
                    <h2>Playbook Walkthrough</h2>
                	<p>The best way to get to grips with our playbook is to watch our walkthrough video from start to finish. It's only four minutes long - and it's totally worth it.</p>
                	<p>Once you've watched it, I recommend you check out the Customer Research section first. But if you can't wait to get stuck into one of the other sections, feel free to skip ahead using the sidebar navigation.</p>                	
                		<iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" title="Placeholder Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <ul>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                    </ul>
                    <h2>Playbook Walkthrough</h2>
                	<blockquote>                		
                	 The best way to get to grips with our playbook is to watch our walkthrough video from start to finish. It's only four minutes long - and it's totally worth it.</blockquote>
                	<p>Once you've watched it, I recommend you check out the Customer Research section first. But if you can't wait to get stuck into one of the other sections, feel free to skip ahead using the sidebar navigation.</p>                	
                    <ul>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                    </ul>
                    <h2>Playbook Walkthrough</h2>
                	<p>The best way to get to grips with our playbook is to watch our walkthrough video from start to finish. It's only four minutes long - and it's totally worth it.</p>
                	<p>Once you've watched it, I recommend you check out the Customer Research section first. But if you can't wait to get stuck into one of the other sections, feel free to skip ahead using the sidebar navigation.</p>
                    <ul>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                        <li>The persona document I use to capture what I learn in customer interviews</li>
                    </ul>  -->  

                    <?php global $post;
                          $post_id = $post->ID;
                          // echo $post_id; 

                          $content_post = get_post($post_id);
						  $content = $content_post->post_content;
						  $content = apply_filters('the_content', $content);
						  // $content = str_replace(']]>', ']]&gt;', $content);
						  echo $content;  ?>            		 

                </div>

                <!-- <div class="next-prve-wrap">
                	<a href="" class="comman-direction">
                		<span class="navyblue">← Previous</span>
                		<small>Customer Research</small>
                	</a>

                	<a href="" class="comman-direction text-end">
                		<span class="navyblue">Next →</span>
                		<small>Campaign Distribution</small>
                	</a>            	
                </div> -->
                <div class="navigation">
</div>
                <?php echo do_shortcode('[gp130428_link_pages]'); 
                // show_subpages();
                	// siblings('before'); siblings('after'); ?>    

            </div>
        </div>
    </div>	
</section>

<?php
get_footer();
?>
