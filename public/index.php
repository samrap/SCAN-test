<?php

require __DIR__.'/getbenefits/index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/scan.main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <meta name="format-detection" content="telephone=no">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="js/lib/picturefill.min.js"></script>

    <title>Scan Health Plan</title>
</head>
<body>

    <header id="header" class="main-header">
        <div class="banner banner-clear">
            <div class="container">
                <div class="row">
                    <div id="bannerLogo" class="col-xs-6">
                        <img srcset="img/logo.png 1x, img/logo@2x.png 2x" alt="SCAN">
                    </div>
                    <div class="banner-phone col-xs-6">
                        <span class="float-right">
                            <em>Call Us Toll-Free</em>
                            <span style="margin-right: 15px"></span>
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <a class="tel" href="tel:1-866-421-1964">866-421-1964</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-body">
            <div class="testimonial">
                <h1><em>&quot;Once I knew the facts,<br class="br-hide" /> it made my decision easy.&quot;</em></h1>
                <p class="small">- Kara Thrace</p>

                <p>What do actual members think about the personal service and benefits you can expect from
                SCAN? Listen to what they have to say about their own experiences, and how SCAN helped make choosing the
                right health plan simpler.</p>
            </div>

            <div class="actions clearfix">
                <a class="btn solid light-blue left">
                    <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                    <strong>PLAY VIDEO</strong>
                </a>

                <a href="tel:1-877-285-7226" class="btn outline white right">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                    <strong>CALL (877) 285-7226</strong>
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="basicbox-container row">
            <div class="basicbox left col-md-6">
                <div class="content with-border-md">
                    <h1>Welcome to the<br class="br-hide" /> Heart of SCAN</h1>
                    <div class="heading-underline orange"></div>

                    <p>For almost 40 years, SCAN and our doctor partners have been focused exclusively on senior health
                    care. It's a commitment to making the benefits that matter most as affordable as possible. It's a
                    dedication to personal service that comes from listening to our members and helping in every way we
                    can. That's the heart of SCAN.</p>
                </div>
            </div>

            <div class="basicbox right col-md-6">
                <div class="content with-border-md">
                    <h1>2016 Benefits for<br class="br-hide" /> <span id="benefitsCounty"><?= $county ?></span> County Include:</h1>
                    <div class="heading-underline blue"></div>

                    <ul id="benefitsList">
                        <?php

                            foreach ($benefits as $benefit):
                                $arr = explode(' ', $benefit['benefit'], 2);
                                $bold = $arr[0];
                                $remaining = $arr[1];

                        ?>
                        <li><span class="value"><?= $bold ?></span> <?= $remaining ?></li>
                        <?php

                            endforeach;

                        ?>
                    </ul>

                    <form id="benefitsCalcForm" class="form-inline styled-form" method="POST" action="">
                        <div class="form-group">
                            <input type="text" id="userZipCode" class="form-control" name="zip" placeholder="Not in LA County? Enter zip here" />
                        </div>
                        <button class="btn btn-square solid dark-blue" type="submit">GO</button>
                    </form>
                </div>
            </div>
        </div>

        <a href="tel:1-877-285-7226" class="btn outline light-blue center">
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
            <strong>CALL (877) 285-7226</strong>
        </a>

        <div id="testimonials" class="testimonial-container">
            <div class="media first">
                <div class="media-left">
                    <img class="media-object img-circle center-block" srcset="img/testimonial.jpg 1x, img/testimonial@2x.jpg 2x" alt="testimonial"/>
                </div>
                <div class="media-body">
                    <p class="small"><em>&quot;With SCAN I feel like they are a company that is a part of a family almost because they
                    have that heart - they have that interest in me.&quot; - Susan, SCAN member</em></p>
                </div>
            </div>

            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle center-block" srcset="img/testimonial.jpg 1x, img/testimonial@2x.jpg 2x" alt="testimonial"/>
                </div>
                <div class="media-body">
                    <p class="small"><em>&quot;With SCAN I feel like they are a company that is a part of a family almost because they
                    have that heart - they have that interest in me.&quot; - Susan, SCAN member</em></p>
                </div>
            </div>

            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle center-block" srcset="img/testimonial.jpg 1x, img/testimonial@2x.jpg 2x" alt="testimonial"/>
                </div>
                <div class="media-body">
                    <p class="small"><em>&quot;With SCAN I feel like they are a company that is a part of a family almost because they
                    have that heart - they have that interest in me.&quot; - Susan, SCAN member</em></p>
                </div>
            </div>


            <div id="testimonialButtons" class="testimonial-buttons">
                <div class="inner"></div>
            </div>
        </div>

        <div class="help-container">
            <h1>How Can We Help You Today?</h1>
            <div class="heading-underline orange"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="help-image">
                        <img class="img-responsive" srcset="img/call-us.jpg 1x, img/call-us@2x.jpg 2x" alt="Call Us" />
                    </div>

                    <div class="help-description">
                        <h2>CALL US</h2>
                        <p>Call and talk to a knowledgeable SCAN representative</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="help-image">
                        <img class="img-responsive" srcset="img/meet-us.jpg 1x, img/meet-us@2x.jpg 2x" alt="Meet Us" />
                    </div>

                    <div class="help-description">
                        <h2>MEET WITH US</h2>
                        <p>Find an informational meeting in your neighborhood</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="help-image">
                        <img class="img-responsive" srcset="img/one-on-one.jpg 1x, img/one-on-one@2x.jpg 2x" alt="One on One" />
                    </div>

                    <div class="help-description">
                        <h2>ONE ON ONE</h2>
                        <p>Schedule an in-home appointment with your local SCAN representative</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="tel:1-877-285-7226" class="btn outline orange center">
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
            <strong>CALL (877) 285-7226</strong>
        </a>

    </div>

    <br />
    <br />
    <hr />

    <div class="container">
        <div class="testimonial-grid">
            <div class="row">
                <div class="col-md-6">
                    <div class="media">
                        <div class="media-left media-middle">
                            <img class="media-object img-circle center-block" srcset="img/michael.jpg 1x, img/michael@2x.jpg 2x" alt="Michael" />
                        </div>
                        <div class="media-body">
                            <p class="small">
                                <span class="quote">&ldquo;</span>
                                With SCAN I feel like they are a company that is part of a family
                                almost because they have that heart, they have that interest in me.
                                <span class="quote">&rdquo;</span>
                            </p>
                            <strong>Michael Jones</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="media">
                        <div class="media-left media-middle">
                            <img class="media-object img-circle center-block" srcset="img/michelle.jpg 1x, img/michelle@2x.jpg 2x" alt="Michelle" />
                        </div>
                        <div class="media-body">
                            <p class="small">
                                <span class="quote">&ldquo;</span>
                                My mother lived to 104, I firmly believe I am going to be that same way and SCAN is
                                going to be there helping me do that.
                                <span class="quote">&rdquo;</span>
                            </p>
                            <strong>Michelle Rodriguez</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid doctor-container">
        <div class="row">
            <div class="col-md-6 doctor-image"></div>
            <div class="col-md-6 doctor-content">
                <h1>Call Now to Find Your Provider &amp; Prescriptions</h1>
                <div class="heading-underline orange"></div>

                <p>Chances are your doctor and prescriptions are already covered within the SCAN Healthcare Network.
                Find out today-there's no call waiting time to speak with a SCAN representative!</p>

                <div class="btn-padding">
                    <a href="tel:1-877-285-7226" class="btn outline white right">
                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                        <strong>CALL (877) 285-7226</strong>
                    </a>
                </div>

                <div class="media">
                    <div class="media-left">
                        <img class="media-object img-circle center-block" srcset="img/judy.jpg 1x, img/judy@2x.jpg 2x" alt="Judy" />
                    </div>
                    <div class="media-body">
                        <p class="small"><em>&quot;I thought I'd get the hard sell from SCAN. Instead, I got clear
                        answers and help that made my decisions so much easier. SCAN was the right choice for
                        me.&quot;<br /> - Judy Dench, SCAN member</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-us-container">
        <div class="callout">
            <h1>Let's Get in Touch</h1>
            <p>Have questions about your Medicare plan options, and what SCAN has to offer? Provide your details below, and
            we'll call you to discuss the answers.</p>
        </div>

        <form id="contactForm" class="form-inline styled-form with-border-xs">
            <div class="form-header">
                <h2>CALL US <a class="tel" href="tel:1-877-285-7226">(877) 285-7226</a></h2>
                <p><strong>Or we can call you for a "No Wait Time" Experience. Fill out the form below.</strong></p>
            </div>

            <div class="form-group">
                <input type="text" id="" class="form-control" name="" placeholder="First Name" />
            </div>
            <div class="form-group">
                <input type="text" id="" class="form-control" name="" placeholder="Last Name" />
            </div>
            <div class="form-group">
                <input type="text" id="" class="form-control" name="" placeholder="Phone Number" />
            </div>

            <div class="clearfix"></div>

            <button type="submit" class="btn outline light-blue">SUBMIT</button>
        </form>
    </div>

    <footer class="main-footer">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <strong>We Are Social</strong>
                        <i class="fa fa-facebook-square"></i>
                        <i class="fa fa-twitter-square"></i>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3">Visit <a href="">Scanhealthplan.com</a></div>
                </div>
            </div>
        </div>

        <div class="body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p class="border-top">* By entering my phone number and/or email address, I agree that a licensed sales
                        representative from SCAN may call or email me, provide me with information about the plan, and
                        answer any questions I may have.</p>

                        <p>The benefit information provided is a brief summary not a complete description of benefits.
                        Limitations, copayments, and restrictions may apply. Benefits, formulary, pharmacy network,
                        premium, copayments, and/or co-insurance may change on January 1 of each year.</p>
                    </div>
                    <div class="col-md-4">
                        <p class="border-top">SCAN Health Plan is an HMO plan with a Medicare contract offered in California by SCAN Health
                        Plan and in Arizona by SCAN Health Plan Arizona. Enrollment in SCAN Health Plan depends on
                        contract renewal. SCAN also contracts with the California Department of Health Care Services for
                        Medicare/Medi-Cal eligible beneficiaries. Click here to read full disclaimer.</p>
                    </div>
                    <div class="col-md-4">
                        <p class="border-top">
                            <strong>Last Updated on 3/23/2015</strong>
                            <br />
                            <strong>Y0057_SCAN_XXXX_2015</strong>
                            <br />
                            <strong>Pending CMS Approval XXXX</strong>
                            <br />
                            <strong>GXXXX</strong>
                        </p>

                        <p>&copy; 2015 SCAN Group. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/lib/jquery-1.11.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/testimonialWidget.min.js"></script>
    <script src="js/benefitsCalculator.min.js"></script>
</body>
</html>
