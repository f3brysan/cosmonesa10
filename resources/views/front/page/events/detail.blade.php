@extends('front.layouts.main')
@section('title', 'Workshop Presents')

@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Event Detail</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Event Detail</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="{{ asset('frontend') }}/images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->

    <!-- Begin:: Single Blog Section -->
    <section class="singleBlog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="postThumb">
                        <img src="{{ asset('frontend') }}/images/blog/10.jpg" alt="" />
                    </div>
                    <div class="sic_details clearfix">
                        <span class="bpdate">February 18, 2017</span>
                        <h3>Spring is in the Air and and So Our These Amazing Spa Offers</h3>
                        <div class="sic_the_content clearfix">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis
                                unde omnis iste natus error sit
                                voluptatem accusantium doloremque laudantium, totam rem aperiam.
                            </p>
                            <blockquote class="wp-block-quote">
                                <p>Facilis petentium expetenda an duo, ut pro prima homero albu-cius, illum electram an cum.
                                    Pri autem graeco mucius.</p>
                            </blockquote>
                            <p>
                                Persecuti instructior theophrastus ad per, eirmod commodo feugait ex ius, mea ut illud
                                cotidieque. Usu odio doctus ea, has in
                                omittam recusabo imperdiet. Impetus adipisci vituperata te pro, in sed quidam hendrerit
                                reprimique. Aliquando pertinacia ad vis,
                                sed ad mazim tollit argumentum, mea quod paulo theophrastus ex. Nec ferri copiosae torquatos
                                cu, case viderer repudiare eu nec. Ea
                                animal diceret per.
                            </p>
                            <div class="row imgMr">
                                <div class="col-md-6">
                                    <img src="{{ asset('frontend') }}/images/blog/11.jpg" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('frontend') }}/images/blog/12.jpg" alt="" />
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, suavitate constituto id eum, utinam consequuntur per ut. Eam
                                sale disputationi id. Id homero prodesset cum,
                                veritus albucius mnesarchum ut duo. Fugit mundi pro in, eum illum ceteros comprehensam ut,
                                civibus erroribus cu habeo repudiandae comprehensam duo.
                                Veri utinam perfecto no cum, pri no dico elitr antiopam. Mea affert fabulas at. Tation
                                eirmod rationibus ea.
                            </p>
                            <p>
                                Id vim facilis ceteros percipit, altera phaedrum sea at, te alia novum praesent sit. Ne
                                justo mazim delenit eam, pri ex brute interpretaris,
                                invenire tractatos te pri. Quo eu bonorum gloriatur, dolore disputationi mei ei, sumo
                                forensibus eu duo. Causae vivendum pri eu, vis in
                                lobortis antiopam similique. At nobis petentium liberavisse sed. Democritum vituperatoribus
                                te quo, salutatus elaboraret praesent persequeris ut mei.
                            </p>
                            <div class="commentForm">
                                <form>
                                    <div class="col-md-12">
                                        <a href="{{ '/join' }}" class="mo_btn" type="submit"><i
                                                class="icofont-long-arrow-right"></i>Join
                                            Now</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="spMeta clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tags">
                                        <a href="blog1.html">Spa</a>,
                                        <a href="blog1.html">Amazing</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="socialShare">
                                        <a target="_blank" href="https://www.facebook.com/"><i
                                                class="icofont-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                                        <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                                        <a target="_blank" href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_author clearfix">
                            <img src="{{ asset('frontend') }}/images/blog/author.jpg" alt="Amy Burton">
                            <h5><a href="javascript:void(0);">Amy Burton</a></h5>
                            <p>
                                Id vim facilis ceteros percipit, altera phaedrum sea at, te alia novum praesent sit. Ne
                                justo mazim delenit eam, pri ex brute interpretaris, invenire.
                            </p>
                        </div>
                    </div>
                    <div class="comment_area">
                        <div class="sic_comments">
                            <h3 class="sicc_title">3 Comments</h3>
                            <ol class="sicc_list">
                                <li>
                                    <article class="single_comment">
                                        <img src="{{ asset('frontend') }}/images/blog/a1.jpg" alt="">
                                        <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a></h4>
                                        <span class="cm_date">7 months ago</span>
                                        <div class="sc_content">
                                            <p>Technology strategy and the roadmap to implement that? The leaders are owning
                                                their own data, refreshing.</p>
                                        </div>
                                        <a href="javascript:void(0);" class="comment-reply-link"><i
                                                class="icofont-reply"></i>Reply</a>
                                    </article>
                                    <ol class="children">
                                        <li>
                                            <article class="single_comment">
                                                <img src="{{ asset('frontend') }}/images/blog/a2.jpg" alt="">
                                                <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a></h4>
                                                <span class="cm_date">7 months ago</span>
                                                <div class="sc_content">
                                                    <p>Technology strategy and the roadmap to implement that? The leaders
                                                        are owning their own data, refreshing.</p>
                                                </div>
                                                <a href="javascript:void(0);" class="comment-reply-link"><i
                                                        class="icofont-reply"></i>Reply</a>
                                            </article>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <article class="single_comment">
                                        <img src="{{ asset('frontend') }}/images/blog/a3.jpg" alt="">
                                        <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a></h4>
                                        <span class="cm_date">7 months ago</span>
                                        <div class="sc_content">
                                            <p>Technology strategy and the roadmap to implement that? The leaders are owning
                                                their own data, refreshing.</p>
                                        </div>
                                        <a href="javascript:void(0);" class="comment-reply-link"><i
                                                class="icofont-reply"></i>Reply</a>
                                    </article>
                                </li>
                            </ol>
                        </div>
                        <div class="commentForm">
                            <h3 class="sicc_title">Leave a Reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#" method="post" class="row">
                                <div class="col-md-12">
                                    <textarea name="comment" placeholder="Your Comment *"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <input placeholder="Your Name *" name="author" type="text">
                                </div>
                                <div class="col-md-6">
                                    <input placeholder="Email Address *" name="email" type="email">
                                </div>
                                <div class="col-md-12">
                                    <input placeholder="Website" name="website" type="url">
                                </div>
                                <div class="col-md-12">
                                    <p class="comment-form-cookies-consent">
                                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent"
                                            type="checkbox" value="yes">
                                        <label for="wp-comment-cookies-consent">Save my name, email, and website in this
                                            browser for the next time I comment.</label>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <button class="mo_btn" type="submit"><i class="icofont-long-arrow-right"></i>Post
                                        Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="relatedPostArea">
                        <h2>Related Posts</h2>
                        <div class="relatedPostSlider owl-carousel">
                            <div class="blog_item_03">
                                <img src="{{ asset('frontend') }}/images/blog/1.jpg" alt="" />
                                <div class="bp_content">
                                    <span>February 18, 2017</span>
                                    <h3><a href="single-blog.html">Spring is in the Air and and So Our These Amazing Spa
                                            Offers</a></h3>
                                    <a class="lr_more" href="single-blog.html">
                                        Learn More
                                        <svg width="300%" height="100%" viewBox="0 0 1200 60"
                                            preserveAspectRatio="none">
                                            <path
                                                d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="blog_item_03">
                                <img src="{{ asset('frontend') }}/images/blog/2.jpg" alt="" />
                                <div class="bp_content">
                                    <span>February 18, 2017</span>
                                    <h3><a href="single-blog.html">We giving Amazing special spa and message service for
                                            vip.</a></h3>
                                    <a class="lr_more" href="single-blog.html">
                                        Learn More
                                        <svg width="300%" height="100%" viewBox="0 0 1200 60"
                                            preserveAspectRatio="none">
                                            <path
                                                d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="blog_item_03">
                                <img src="{{ asset('frontend') }}/images/blog/3.jpg" alt="" />
                                <div class="bp_content">
                                    <span>February 18, 2017</span>
                                    <h3><a href="single-blog.html">We also offer outside special spa and message catering;
                                            take-away</a></h3>
                                    <a class="lr_more" href="single-blog.html">
                                        Learn More
                                        <svg width="300%" height="100%" viewBox="0 0 1200 60"
                                            preserveAspectRatio="none">
                                            <path
                                                d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget">
                            <h3 class="widget_title">Search</h3>
                            <form method="get" action="#" class="search_form">
                                <input type="search" name="s" id="s" placeholder="Type here">
                                <button type="submit"><i class="icofont-search"></i></button>
                            </form>
                        </aside>
                        <aside class="widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            <div class="pp_post_item">
                                <img src="{{ asset('frontend') }}/images/blog/t1.jpg" alt="" />
                                <h5><a href="single-blog.html">We also offer outside special spa and message...</a></h5>
                                <span>February 18, 2017</span>
                            </div>
                            <div class="pp_post_item">
                                <img src="{{ asset('frontend') }}/images/blog/t2.jpg" alt="" />
                                <h5><a href="single-blog.html">Spring is in the Air and and So Our These Amazing...</a>
                                </h5>
                                <span>February 18, 2017</span>
                            </div>
                            <div class="pp_post_item">
                                <img src="{{ asset('frontend') }}/images/blog/t3.jpg" alt="" />
                                <h5><a href="single-blog.html">If you are going to use a you need to be sure can...</a>
                                </h5>
                                <span>February 18, 2017</span>
                            </div>
                        </aside>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Category</h3>
                            <ul>
                                <li><a href="blog1.html">Beauty and health</a>(3)</li>
                                <li><a href="blog1.html">Cosmetics</a>(8)</li>
                                <li><a href="blog1.html">Massage treatments</a>(5)</li>
                                <li><a href="blog1.html">Medical spa</a>(3)</li>
                                <li><a href="blog1.html">Spa center</a>(2)</li>
                                <li><a href="blog1.html">Spa therapy</a>(1)</li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Tags</h3>
                            <div class="tagcloud">
                                <a href="blog1.html">Body</a>
                                <a href="blog1.html">Face</a>
                                <a href="blog1.html">Hair</a>
                                <a href="blog1.html">Massage</a>
                                <a href="blog1.html">Oil Pool</a>
                                <a href="blog1.html">Rellax</a>
                                <a href="blog1.html">Spa</a>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Gallery</h3>
                            <div class="gallery_shots">
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/6.jpg"
                                        alt="" /></a>
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/7.jpg"
                                        alt="" /></a>
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/8.jpg"
                                        alt="" /></a>
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/9.jpg"
                                        alt="" /></a>
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/10.jpg"
                                        alt="" /></a>
                                <a href="javascript:void(0);"><img src="{{ asset('frontend') }}/images/gallery/11.jpg"
                                        alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Single Blog Section -->
@endsection
